<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Form as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormDRequest as ModuleRequest;
class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX     = 'forms';        
    }

    
    public function store(ModuleRequest $request)
    {
 
            $validated           = $request->validated();
            $validated['title']  = $request->title;
            $validated['status'] = isset($request->status) ? '1' : '0';

            if (MainModel::create($validated)) {
                $arr = ['msg' => __('site.save_succeeded'), 'status' => true];
            }else{
                $arr = ['msg' => __('site.failed'), 'status' => false];
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
            $model = MainModel::select('id', 'title','status','created_at');
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('title', function ($row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . Str::words($row->title, '20') . '</a>';
                })
                ->editColumn('status', function (MainModel $row) {
                    return $this->dataTableGetStatus($row);
                })
                ->editColumn('created_at', function (MainModel $row) {
                    return $this->dataTableGetCreatedat($row->created_at);
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                })
                ->editColumn('actions', function ($row) {
                    return $this->dataTableEditRecordAction($row, $this->ROUTE_PREFIX);
                })
                ->rawColumns(['title', 'status', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('forms.index')) {
            $compact = [
                'createRoute'           => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'            => route($this->ROUTE_PREFIX . '.store'),
                'listingRoute'          => route($this->ROUTE_PREFIX . '.index'),
                'destroyMultipleRoute'  => route($this->ROUTE_PREFIX . '.destroyMultiple'),

            ];
            return view('forms.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('forms.create')) {
            $compact = [
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('forms.create', $compact);
        }
    }
    // public function edit(Request $request, MainModel $MainModel)
    // {
    //     if (view()->exists('forms.edit')) {
    //         $compact = [
    //             'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $MainModel->id),
    //             'row'                     => $MainModel,
    //             'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $MainModel->id),
    //             'trans'                   => 'site',
    //             'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
    //         ];
    //         return view('forms.edit', $compact);
    //     }
    // }

    // public function update(ModuleRequest $request, MainModel $MainModel)
    // {
    //     try {
    //         DB::beginTransaction();
    //         $validated = $request->validated();
 
    //         $validated['status'] = isset($request->status) ? '1' : '0';
    //         $validated['image'] = $image;

    //         MainModel::findOrFail($MainModel->id)->update($validated);

    //         $arr = ['msg' => __('site.updateMessageSuccess'), 'status' => true];
    //         DB::commit();
    //          $arr = ['msg' => __('site.updateMessageSuccess'), 'status' => true];
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         $arr = ['msg' => __('site.updateMessageError'), 'status' => false];
    //     }
    //     return response()->json($arr);
    // }
    // public function destroy(MainModel $MainModel)
    // {
    //     if ($MainModel->delete()) {
    //         $arr = ['msg' => __('site.deleteMessageSuccess'), 'status' => true];
    //     } else {
    //         $arr = ['msg' => __('site.deleteMessageError'), 'status' => false];
    //     }
    //     return response()->json($arr);
    // }
}
