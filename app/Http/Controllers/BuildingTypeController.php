<?php
namespace App\Http\Controllers;
use DataTables;
use Carbon\Carbon;
use App\Models\Form;
 
use App\Models\BuildingType;
 
use App\Traits\Functions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BuildingTypeRequest;
use App\Http\Controllers\Controller;

class BuildingTypeController extends Controller
{
    use Functions;
    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX = 'buildingtypes';
        $this->TRANS = 'buildingtype';
        $this->Tbl = 'buildingtypes';
    }

    public function store(FormDRequest $request)
    {
        $validated = $request->validated();
        $query = Form::create($validated);
        if ($query) {
            $arr = ['msg' => __($this->TRANS . '.storeMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.storeMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = BuildingType::with([              
                'form' => function($query) {
                    $query->select('id', 'title'); # One to many
                },
               
            ]);

            dd($model);
            


            return Datatables::of($model)

                ->addIndexColumn()
                ->editColumn('title', function ($row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->title . '</a>';
                })

           
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                })
                ->editColumn('actions', function ($row) {
                    return $this->dataTableEditRecordAction($row, $this->ROUTE_PREFIX);
                })
                ->rawColumns(['title', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('buildingtypes.index')) {
            $compact = [
                'trans' => $this->TRANS,
                'createRoute' => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
            ];
            return view('buildingtypes.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('forms.create')) {
            $compact = [
                'trans' => $this->TRANS,
                'regions' => Region::where('country_id', 177)->select('id', 'title')->get(),
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('forms.create', $compact);
        }
    }
    public function edit(Form $form)
    {
        if (view()->exists('forms.edit')) {
            $compact = [
                'fields' => Field::get(),
                'selectedFields' => $form->fields,
                'updateRoute' => route($this->ROUTE_PREFIX . '.update', $form->id),
                'row' => $form,
                'destroyRoute' => route($this->ROUTE_PREFIX . '.destroy', $form->id),
                'trans' => $this->TRANS,
                'regions' => Region::where('country_id', 177)->select('id', 'title')->get(),
                'redirect_after_destroy' => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('forms.edit', $compact);
        }
    }

    public function update(FormDRequest $request, Form $form)
    {
        $validated = $request->validated();
        $update = $form->update($validated);
        if ($update) {
            $arr = ['msg' => __('form.updateMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __('form.updateMessageError'), 'status' => true];
        }
        return response()->json($arr);
    }

    public function destroy(Form $form)
    {
        if ($form->delete()) {
            $arr = ['msg' => __($this->TRANS . '.deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.deleteMessageError'), 'status' => false];
        }
        return response()->json($arr); 
    }

    public function AjaxLoadjKanban(Request $request)
    {
        $form = Form::where('id', $request->FormId)->first();

        $FormId = $request->FormId;
        $avaiableFields = Field::whereDoesntHave('forms', function($query) use($FormId) {
            $query->where('form_id',$FormId);
          })->get();
        

        $view = view('forms.AjaxLoadjKanban', ['formFields' => $form->fields, 'avaiableFields' => $avaiableFields,'FormId'=>$FormId])->render();
        return $view;
    }
    public function saveFormfield(Request $request)
    {
        
        $conditionArr = ['form_id' => $request->form_id, 'field_id' => $request->field_id];

        #remove from tbl
        if ($request->action == '_inprocess') {
            FormField::where($conditionArr)->delete();
            $msg = 'تم حذف الحقل من الأستمارة بنجاح';
            $status = 'info';
        } elseif ($request->action == '_working') {
            FormField::insert($conditionArr);
            $msg = 'تم اضافه الحقل الي الأستماره بنجاح';
            $status = true;
        }

        /*$order  = explode(",",$request->order);
        for($i=0; $i < count($order);$i++) {
            FormField::where('field_id',$order[$i])->update(['order'=>$i]);
        }*/

        $arr = ['msg' => $msg, 'status' => $status];
        return response()->json($arr);
    }
}
