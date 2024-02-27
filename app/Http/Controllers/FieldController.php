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
        $this->TRANSFillable = 'fillable';
        $this->Tbl = 'fields';
    }

    public function store(FieldRequest $request){
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
                ->rawColumns(['label','is_required','forms', 'fillables.display','actions', 'created_at', 'created_at.display'])                
                ->make(true);
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
    public function edit(Request $request, Field $field){
        if (view()->exists('fields.edit')) { 
        if ($request->ajax()) {
            $fillables =  $field->fillables;
            return Datatables::of($fillables)
                ->addIndexColumn()
                ->editColumn('fillable_display', function ($row) {                                    
                 $data = "<input type=\"hidden\" name=\"field_fillable_id[]\" value='".$row->id."'>
                 <div class=\"input-group\">
                <span class=\"input-group-text\" data-kt-item-filter" . $row->id . "=\"item\">
                <label class=\"form-check form-check-custom form-check-solid me-1\">
                 ".$row->display."
                </label>
                </span>
                <input type=\"text\" value='".$row->display."' id=\"answerText\"
                name=\"old_fillable_display[".$row->id."]\" class=\"form-control\"/>                
                </div>";
                    return $data;  
                })    
                ->editColumn('fillable_value', function ($row) {
                    return "<input type=\"text\" class=\"form-control form-control-lg\" placeholder=\"مثال ذكر\"
                    name=\"old_fillable_value[".$row->id."]\" 
                    data-kt-item-filter" . $row->id . "=\"item\"
                    value=\"".$row->value."\" />";
                })    
                ->editColumn('actions', function ($row) {
                    return "<div class=\"menu-item px-3\"><a id=\"delete_item\" 
                    data-destroy-route=".route('fields.AjaxRemoveFieldFillable',":id")." 
                    data-item-filter" . $row->id . "=\"item\"
                    data-id=".$row->id."
                    class=\"menu-link px-3\"  
                    data-kt-table-filter=\"delete_row\" 
                    data-back-list-text=\"العودة الى القائمة\" 
                    data-confirm-message=\"هل تريد حذف الملأ\"
                    data-confirm-button-text=\"نعم, حذف!\" 
                    data-cancel-button-text=\"لا, ألغ\" 
                    data-confirm-button-textgotit=\"حسنا\"
                    data-deleting-selected-items=\"حذف العناصر المحدده الملأ\" 
                    data-not-deleted-message=\"لم يتم الحذف\"                    
                    ><i class=\"fa fa-trash-alt m-1 w-1 h-1 mr-1 rtl:ml-1\"></i></a></div>";
                })                
                ->rawColumns(['fillable_display','fillable_value','actions'])
                ->make(true);
        }
            $compact = [
                'editRoute'                    => route($this->ROUTE_PREFIX . '.edit', $field->id),
                'updateRoute'                  => route($this->ROUTE_PREFIX . '.update', $field->id),
                'row'                          => $field,
                'transfillable'                =>$this->TRANSFillable,
                'destroyRoute'                 => route($this->ROUTE_PREFIX . '.destroy', $field->id),
                'trans'                        => $this->TRANS,
                'AjaxRemoveMultiFieldFillable' =>route('fields.AjaxRemoveMultiFieldFillable'),
                'redirect_after_destroy'       => route($this->ROUTE_PREFIX . '.index'),
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

    public function destroyMultiple(Request $request){
        /*$ids = explode(',', $request->ids);
        foreach (MainModel::whereIn('id', $ids)->get() as $selectedItems) {
            $selectedItems->image ? $this->unlinkFile($selectedItems->image) : ''; // Unlink Images
        }
        $items = MainModel::whereIn('id', $ids); // Check
        if ($items->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'MulideleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'MiltideleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
        */
    }


    public function update(FieldRequest $request, Field $field){
        
        $validated = $request->validated();
        $validated['label'] = $request->label;
        $validated['name'] = $request->name;
        $validated['type'] = $request->type;
        $validated['width'] = $request->width;
        $validated['is_required'] = $request->is_required;
       
        $fieldInfo              = $this->handleSaveField($request);
         
        $updateRecord = [];
        if(!(empty($request->field_fillable_id))){
            foreach ($request->field_fillable_id as $k => $v) {             
                if (!(empty($request->old_fillable_display[$v]) && !empty($request->old_fillable_value[$v]))) {
                    $updateRecord[$k] = [
                        'id' => $v,
                        'display' => $request->old_fillable_display[$v],
                        'value' => $request->old_fillable_value[$v],
                    ];
                }
            }
            $index = 'id';
            $fillablesInstance = new FieldFillable();
            \Batch::update($fillablesInstance, $updateRecord, $index);
        }

       #new fillable added
       if (!empty($request->fillable_display) > 0 && !empty($request->fillable_value) > 0) {
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


 
        if (Field::findOrFail($field->id)->update($fieldInfo)) {
            $arr = ['msg' => __($this->TRANS . '.updateMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.updateMessageError'), 'status' => false];
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
    
    //////////////// Fillable Handle //////////////////////////////////////////////
    public function AjaxRemoveFieldFillable($id){ 

        if (FieldFillable::where('id',$id)->delete()) {
            $arr = ['msg' => __($this->TRANS . '.deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function AjaxRemoveMultiFieldFillable(Request $request){
        $ids = explode(',', $request->ids);        
        $items = FieldFillable::whereIn('id', $ids); // Check
        if ($items->delete()) {
            $arr = ['msg' => __($this->TRANSFillable . '.' . 'MulideleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANSFillable . '.' . 'MiltideleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }


}
