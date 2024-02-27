<?php
namespace App\Http\Controllers;
use DataTables;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\BuildingType;
use App\Traits\Functions;
use App\Traits\UploadAble;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BuildingTypeRequest;
use App\Http\Controllers\Controller;

class BuildingTypeController extends Controller
{
    use UploadAble,Functions;
    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX = 'buildingtypes';
        $this->TRANS = 'buildingtype';
        $this->Tbl = 'building_types';
        $this->UPLOADFOLDER = 'buildings/types';
    }

   

    public function index(Request $request){
        if ($request->ajax()) {           
            $model = BuildingType::withCount('form');  
            return Datatables::of($model)
                ->addIndexColumn()       
                
                ->editColumn('title', function ($row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->title . '</a>';
                })

               ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                })
                ->editColumn('actions', function ($row) {
                    return 'dsad';
                })
                ->rawColumns(['title','actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('buildingtypes.index')) {
            $compact = [
                'trans'                => $this->TRANS,
                'model'                => BuildingType::select('*')->withCount('form')->get(),
                'createRoute'          => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'           => route($this->ROUTE_PREFIX . '.store'),
                'listingRoute'         => route($this->ROUTE_PREFIX . '.index'),
                'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
            ];
             
            return view('buildingtypes.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('buildingtypes.create')) {
            $compact = [
                'trans'        => $this->TRANS,
                'forms'        => Form::select('id', 'title')->get(),
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'   => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('buildingtypes.create', $compact);
        }
    }

    public function store(BuildingTypeRequest $request){
        $validated = $request->validated();
        $validated['image'] = !empty($request->file('image')) ? $this->uploadFile($request->file('image'), $this->UPLOADFOLDER) : null;
        if (BuildingType::create($validated)) {
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageError'), 'status' => false];
        }
        return response()->json($arr); 
    }



    public function edit(BuildingType $buildingtype){         
        if (view()->exists('buildingtypes.edit')) {
            $compact = [
                'forms'                  => Form::select('id', 'title')->get(),
                'updateRoute'            => route($this->ROUTE_PREFIX . '.update', $buildingtype->id),
                'row'                    => $buildingtype,
                'destroyRoute'           => route($this->ROUTE_PREFIX . '.destroy', $buildingtype->id),
                'trans'                  => $this->TRANS,
                'redirect_after_destroy' => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('buildingtypes.edit', $compact);
        }
    }

    public function update(BuildingTypeRequest $request, BuildingType $buildingtype){
        $validated = $request->validated();        
        $validated['image'] = !empty($request->file('image')) ? $this->uploadFile($request->file('image'), $this->UPLOADFOLDER) : null;
        $update = $buildingtype->update($validated);
        if ($update) {
            $arr = ['msg' => __('form.updateMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __('form.updateMessageError'), 'status' => true];
        }
        return response()->json($arr);
    }

    public function destroy(BuildingType $buildingtype){
        if ($buildingtype->delete()) {
            $arr = ['msg' => __($this->TRANS . '.deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.deleteMessageError'), 'status' => false];
        }
        return response()->json($arr); 
    }

    public function destroyMultiple(Request $request)
    {
        $ids = explode(',', $request->ids);
        $items = BuildingType::whereIn('id', $ids); // Check
        if ($items->delete()) {
            $arr = ['msg' => __($this->TRANS . '.' . 'MulideleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'MiltideleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    
}
