<?php
namespace App\Http\Controllers;
use DataTables;
use Carbon\Carbon;
use App\Models\Field;
use App\Models\FormField;
use App\Traits\Functions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Form as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormDRequest as ModuleRequest;

class FormController extends Controller
{

    use Functions;
    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX   = 'forms';        
        $this->TRANS            = 'form';
        $this->Tbl              = 'forms';
    }

    
    public function store(ModuleRequest $request)
    {         
            $validated = $request->validated();
            $validated['title']  = $request->title;
            $validated['status'] = isset($request->status) ? '1' : '0';

            $query = MainModel::create($validated);
            if ($query) {
                $field_id = [];
                $required = [];
                $notices = [];        
                if(!empty($request->field_id)) {
                    foreach($request->field_id as $field){
                        if(!(empty($field))){
                            $FormField[$field]['is_required']   = !(empty($request->is_required[$field])) ? $request->is_required[$field] : '0';
                            $FormField[$field]['notices']       = !(empty($request->notices[$field])) ? $request->notices[$field] : NULL; 
                            $FormField[$field]['field_id']      = $field;
                            $FormField[$field]['form_id']       = $query->id;                                                             
                        }
                    }
                    FormField::insert($FormField);
                } 
                $arr = ['msg' => __($this->TRANS.'.storeMessageSuccess'), 'status' => true];
            }else{
                $arr = ['msg' => __($this->TRANS.'.storeMessageError'), 'status' => false];
            }
            return response()->json($arr);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
        if ($request->ajax()) {


            $model = MainModel::with([
                'fields' => function ($query) {
                    $query->select('display','name');
                },
            ])->select('id','title','status','created_at');


          
            return Datatables::of($model)

                ->addIndexColumn()

                ->editColumn('title', function ($row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->title . '</a>';
                })
 


                ->editColumn('formfields', function ($row) {

                    $x = '';
                    foreach($row->fields as $FormField){
                         dd($FormField);
                    }
                    return $x; 
                })
                

                ->editColumn('status', function ($row) {
                    return $this->dataTableGetStatus($row);
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
                ->rawColumns(['title', 'formfields','status', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('forms.index')) {
            $compact = [
                'trans'                 => $this->TRANS,
                'createRoute'           => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'            => route($this->ROUTE_PREFIX . '.store'),
                'listingRoute'          => route($this->ROUTE_PREFIX . '.index'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX . '.destroyMultiple'),
            ];
            return view('forms.index', $compact);
        }
    }
    public function create(){
        if (view()->exists('forms.create')) {
            $compact = [
                'fields'        => Field::select('id','display','name','notices','type')->get(),
                'trans'         => $this->TRANS,
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('forms.create', $compact);
        }
    }
    public function edit(Request $request, MainModel $form)
    {
        if (view()->exists('forms.edit')) {
            $compact = [
                'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $form->id),
                'row'                     => $form,
                'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $form->id),
                'trans'                   => $this->TRANS,
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('forms.edit', $compact);
        }
    }

    public function update(ModuleRequest $request, MainModel $form)
    {
            $validated = $request->validated();
            $validated['title']  = $request->title;
            $validated['status'] = isset($request->status) ? '1' : '0';


            if(MainModel::findOrFail($form->id)->update($validated)){
                $arr = ['msg' => __($this->TRANS.'.updateMessageSuccess'), 'status' => true];
            }else{
                $arr = ['msg' => __($this->TRANS.'.updateMessageError'), 'status' => false];
            }
        
        return response()->json($arr);
    }
    public function destroy(MainModel $form)
    {
        if ($form->delete()) {
            $arr = ['msg' => __($this->TRANS.'.deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS.'.deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
}
