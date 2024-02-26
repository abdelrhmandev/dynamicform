<?php
namespace App\Http\Controllers;
use DataTables; 
use Carbon\Carbon;
use App\Models\Form;
use App\Traits\Functions;
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use App\Models\BuildingType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BuildingTypeRequest;

class BuildingTypeController extends Controller
{
 
    use UploadAble, Functions;
     public function __construct()
     {
         $this->middleware('auth');
         $this->ROUTE_PREFIX     = 'buildingtypes';        
         $this->TRANS            = 'buildingtype';
         $this->UPLOADFOLDER     = 'buildings/types';
     }
 
    public function create()
    {       
        if (view()->exists('buildingtypes.create')) {
            $compact = [
                'forms'             =>Form::get(),
                'storeRoute'        => route($this->ROUTE_PREFIX . '.store'),
                'trans'             => $this->TRANS,
            ];
            return view('buildingtypes.create', $compact);
        }
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = BuildingType::with('form');
       


            return Datatables::of($model)

                ->addIndexColumn()
                ->editColumn('title', function ($row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->title . '</a>';
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

    public function store(BuildingTypeRequest $request){
        $validated = $request->validated();
        $validated['image'] = !empty($request->file('image')) ? $this->uploadFile($request->file('image'), $this->UPLOADFOLDER) : null;
        $query = BuildingType::insert($validated);

        if ($query) {    
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageError'), 'status' => false];
        }

        return response()->json($arr);
    }


}
