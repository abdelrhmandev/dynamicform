<?php
namespace App\Http\Controllers;
use DataTables;
use Carbon\Carbon;
use App\Traits\Functions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Field;
use App\Models\FieldFillable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FieldRequest;
class FieldController extends Controller
{
    use Functions;
    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX = 'fields';
        $this->TRANS = 'field';
        $this->Tbl = 'fields';
    }

    public function store(FieldRequest $request)
    {
        $validated              = $request->validated();
        $fieldInfo              = $this->handleSaveField($request);
        $query                  = Field::create($fieldInfo);

        if ($query) {
            #Handle Fillable fields
           
            if (
                !(empty($request->fillable_display)) &&
                count($request->fillable_display) > 0 &&
                !(empty($request->fillable_value)) && 
                count($request->fillable_value) > 0) {
                $result = array_combine($request->fillable_display, $request->fillable_value);
                $insert = [];
                foreach ($result as $k => $v) {
                    if (!empty($k) && !empty($v)) {
                        $insert[] = [
                            'field_id' => DB::getPdo()->lastInsertId(),
                            'display'  => $k,
                            'value'    => $v,
                        ];
                    }
                }
                if (!empty($insert)) {
                    FieldFillable::insert($insert);
                }
            }
           
            $arr = ['msg' => __($this->TRANS . '.storeMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.storeMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function index(Request $request){
        if ($request->ajax()) {
            $model = Field::withCount('forms')->with('fillables');
           
            return Datatables::of($model)

                ->addIndexColumn()
                ->editColumn('label', function ($row) {

                    $fillable = '';
                    
                    if (count($row->fillables)) {
                        $fillable .= '<br/><small class="text-danger w-500">البيانات الأوليه للحقل</small><br>';
                        foreach ($row->fillables as $value) {
                            $fillable .= "<div class=\"badge py-3 px-4 fs-7 badge-light-primary mt-1\">&nbsp;" . "<span class=\"text-primary\">".$value->display."</span></div> ";
                        }
                    }

                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->label . '</a>'
                    .$fillable;
                    ;
                })

                ->editColumn('forms', function ($row) {
                    $CountLabel = "<span class=\"fs-7 text-danger\"> غير مرتبط بأي أستمارة</span>";
                    if($row->forms_count){
                        $CountLabel = "<span class=\"badge badge-circle badge-primary\">".$row->forms_count."</span>";
                    }
                    return $CountLabel;
                })


                ->editColumn('is_required', function ($row) {
                    $is_required = "<span class=\"badge py-3 px-4 fs-7 badge-light-info\">لا</span>";
                    if ($row->is_required == 1) {                      
                        $is_required = "<span class=\"badge py-3 px-4 fs-7 badge-light-success\">نعم</span>";
                    } 
                    
                    return $is_required;

                })

     
                ->editColumn('created_at', function ($row) {
                    return $this->dataTableGetCreatedat($row->created_at);
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                })
                ->editColumn('actions', function ($row) {
                    return $this->dataTableEditRecordAction($row, $this->ROUTE_PREFIX);
                })
                ->rawColumns(['label','is_required','forms', 'fillables.display','actions', 'created_at', 'created_at.display'])                ->make(true);
        }
        if (view()->exists('fields.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'            => route($this->ROUTE_PREFIX . '.store'),
                'listingRoute'          => route($this->ROUTE_PREFIX . '.index'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX . '.destroyMultiple'),
            ];
            return view('fields.index', $compact);
            ////
        }
    }
    public function create(){
        if (view()->exists('fields.create')) {
            $compact = [
                'trans' => $this->TRANS,
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('fields.create', $compact);
        }
    }
    public function edit(Request $request, Field $field)
    {
        if (view()->exists('fields.edit')) {
            $compact = [
                'updateRoute'            => route($this->ROUTE_PREFIX . '.update', $field->id),
                'row'                    => $field,
                'destroyRoute'           => route($this->ROUTE_PREFIX . '.destroy', $field->id),
                'trans'                  => $this->TRANS,
                'redirect_after_destroy' => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('fields.edit', $compact);
        }
    }

    public function loadFieldInfo(Request $request){
        if ($request->type) {
            $view = '';
            $os = ['selectmenu', 'checkbox', 'radio'];
            if (in_array($request->type, $os)) {
                $view = view('components.fields.fieldfillable')->render();
            } else {
                $os = ['textbox', 'google_map', 'number', 'date', 'signature', 'textarea', 'file', 'gallery', 'id_number', 'email', 'phone_number', 'date_range'];
                if (in_array($request->type, $os)) {
                    $view = view('components.fields.' . $request->type)->render();
                }
            }
        }
        return $view;
    }

    public function update(FieldRequest $request, Field $field)
    {
        $validated = $request->validated();
        $validated['title'] = $request->title;
        $validated['notices'] = $request->notices;
        $updateRecord = [];
        foreach ($request->field_fillable_id as $k => $v) {
            if (!(empty($request->old_fillable_display[$v]) && !empty($request->old_fillable_value[$v]))) {
                $updateRecord[$k] = [
                    'id' => $v,
                    'display' => $request->old_fillable_display[$v],
                    'value' => $request->old_fillable_value[$v],
                ];
            }
        }
        #update old fillable
        $index = 'id';
        $fillablesInstance = new FieldFillable();
        \Batch::update($fillablesInstance, $updateRecord, $index);
        #new fillable added
        if (count($request->fillable_display) > 0 && count($request->fillable_value) > 0) {
            $result = array_combine($request->fillable_display, $request->fillable_value);
            $insert = [];
            foreach ($result as $k => $v) {
                if (!empty($k) && !empty($v)) {
                    $insert[] = [
                        'field_id' => $field->id,
                        'display' => $k,
                        'value' => $v,
                    ];
                }
            }
            if (!empty($insert)) {
                FieldFillable::insert($insert);
            }
        }
        if (Field::findOrFail($field->id)->update($validated)) {
            $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.updateMessageError'), 'status' => false];
        }

        return response()->json($arr);
    }

    public function AjaxRemoveFieldFillable($id)
    {
        // $field->form_field()->detach();
        if (FieldFillable::where('id',$id)->delete()) {
            $arr = ['msg' => __($this->TRANS . '.deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }


    public function destroy(Field $field)
    {
        // $field->form_field()->detach();

        if ($field->delete()) {
            $arr = ['msg' => __($this->TRANS . '.deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
}
