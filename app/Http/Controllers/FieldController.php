<?php
namespace App\Http\Controllers;
use DataTables;
use Carbon\Carbon;
use App\Traits\Functions;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Field as MainModel;
use App\Models\FieldFillable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Http\Requests\FieldRequest as ModuleRequest;
class FieldController extends Controller
{

    use Functions;
    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX     = 'fields';        
        $this->TRANS            = 'field';
        $this->Tbl              = 'fields';
    }

    
    public function store(ModuleRequest $request)
    { 
            $validated = $request->validated();
            $validated['display']  = $request->display;
            $validated['name']  = $request->name;
            $validated['type']  = $request->type;
            $query = MainModel::create($validated);
            if ($query) {
                if((count($request->fillable_display) > 0) && (count($request->fillable_value)>0)) {                 
                    $result = array_combine($request->fillable_display,$request->fillable_value);    
                    $insert = [];
                    foreach($result as $k=>$v){
                        if(!empty($k) && !empty($v)){
                            $insert[] = [
                                'field_id'  =>$query->id,
                                'display'   =>$k,
                                'value'     =>$v
                            ];
                        }
                    }
                    if(!empty($insert)) {
                        FieldFillable::insert($insert);
                    }
                }
                $arr = ['msg' => __($this->TRANS.'.storeMessageSuccess'), 'status' => true];
            }else{
                $arr = ['msg' => __($this->TRANS.'.storeMessageError'), 'status' => false];
            }
            return response()->json($arr);
    }


    public function index(Request $request){
        if ($request->ajax()) {
            $model = MainModel::select('id','display','name','type','created_at');
            return Datatables::of($model)

                ->addIndexColumn()
                ->editColumn('display', function ($row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->display . '</a>';
                })
 

                ->editColumn('FieldFillable.display', function ($row) {
                    $fillable = '';
                    if (count($row->FieldFillable)) {
                        foreach ($row->FieldFillable as $value) {
                            $fillable .= "<div class=\"badge py-3 px-4 fs-7 badge-light-primary mt-1\">&nbsp;" . "<span class=\"text-primary\">".$value->display."</span></div> ";
                        }
                    } else {
                        $fillable = "<div class=\"badge py-3 px-4 fs-7 badge-light-danger\">&nbsp;" . "<span class=\"text-danger\">لا يوجد</span></div>";
                    }


                    return $fillable;

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
                ->rawColumns(['display', 'FieldFillable.display','actions', 'created_at', 'created_at.display'])                ->make(true);
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
                'trans'         => $this->TRANS,
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('fields.create', $compact);
        }
    }
    public function edit(Request $request, MainModel $field)
    {
        if (view()->exists('fields.edit')) {
            $compact = [
                'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $field->id),
                'row'                     => $field,
                'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $field->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('fields.edit', $compact);
        }
    }

    
 

    public function update(ModuleRequest $request, MainModel $field)
    {

            $validated = $request->validated();  
            $validated['title']  = $request->title;
            $updateRecord = [];
            foreach($request->field_fillable_id as $k=>$v){                            
                if(!(empty($request->old_fillable_display[$v]) && (!(empty($request->old_fillable_value[$v]))))) {
                    $updateRecord[$k] =   [
                        'id'        =>$v,
                        'display'   =>$request->old_fillable_display[$v],
                        'value'     =>$request->old_fillable_value[$v],         
                    ];               
                }                 
            }           
            #update old fillable 
            $index = 'id';
            $FieldFillableInstance = new FieldFillable;          
            \Batch::update($FieldFillableInstance, $updateRecord, $index);

            #new fillable added             
            if((count($request->fillable_display) > 0) && (count($request->fillable_value)>0)) {                 
                $result = array_combine($request->fillable_display,$request->fillable_value);    
                $insert = [];
                foreach($result as $k=>$v){
                    if(!empty($k) && !empty($v)){
                        $insert[] = [
                            'field_id'  =>$field->id,
                            'display'   =>$k,
                            'value'     =>$v
                        ];
                    }
                } 
                if(!empty($insert)) {
                    FieldFillable::insert($insert);
                    
                }
            }
            

            if(MainModel::findOrFail($field->id)->update($validated)){
                $arr = ['msg' => __($this->TRANS.'.updateMessageSuccess'), 'status' => true];
            }else{
                $arr = ['msg' => __($this->TRANS.'.updateMessageError'), 'status' => false];
            }
           
            
        
        return response()->json($arr);
    }
    public function destroy(MainModel $field)
    {
        if ($field->delete()) {
            $arr = ['msg' => __($this->TRANS.'.deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS.'.deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
}
