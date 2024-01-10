<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Form as MainModel;
use App\Models\FormElement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormElementRequest as ModuleRequest;
class ElementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX     = 'elements';        
    }

    
    public function store(ModuleRequest $request)
    {
 
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['title'] = isset($request->form_title);

            


            
            $query = MainModel::create($validated);

            $formElements = [
                'form_id'         => $query->id,
                'display'         =>$validated['element_display'],
                'name'            =>$validated['element_name'],
                'type'            =>$validated['element_type'],                
                'is_required'     =>$validated['element_is_required'],             
            ];

       
            if ($query && FormElement::insert($formElements)) {
                $arr = ['msg' => __('site.save_succeeded'), 'status' => true];
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __('site.failed'), 'status' => false];
        }
        return response()->json($arr);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = FormElement::select('id', 'image', 'status', 'created_at');
            return Datatables::of($model)
                ->addIndexColumn()
                ->editColumn('translate.title', function (FormElement $row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . Str::words($row->translate->title, '20') . '</a>';
                })
                ->editColumn('image', function ($row) {
                    return $this->dataTableGetImage($row, $this->ROUTE_PREFIX . '.edit');
                })
                ->editColumn('status', function (FormElement $row) {
                    return $this->dataTableGetStatus($row);
                })
                ->editColumn('created_at', function (FormElement $row) {
                    return $this->dataTableGetCreatedat($row->created_at);
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                })
                ->editColumn('actions', function ($row) {
                    return $this->dataTableEditRecordAction($row, $this->ROUTE_PREFIX);
                })
                ->rawColumns(['image', 'translate.title', 'status', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('elements.index')) {
            $compact = [
                'trans'                 => 'site',
                'createRoute'           => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'            => route($this->ROUTE_PREFIX . '.store'),
                'listingRoute'          => route($this->ROUTE_PREFIX . '.index'),
            ];
            // return view('elements.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('elements.create')) {
            $compact = [
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('elements.create', $compact);
        }
    }
    public function edit(Request $request, FormElement $formelement)
    {
        if (view()->exists('elements.edit')) {
            $compact = [
                'updateRoute'             => route($this->ROUTE_PREFIX . '.update', $formelement->id),
                'row'                     => $formelement,
                'destroyRoute'            => route($this->ROUTE_PREFIX . '.destroy', $formelement->id),
                'trans'                   => 'site',
                'redirect_after_destroy'  => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('elements.edit', $compact);
        }
    }

    public function update(ModuleRequest $request, FormElement $formelement)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
 
            $validated['status'] = isset($request->status) ? '1' : '0';
            $validated['image'] = $image;

            FormElement::findOrFail($formelement->id)->update($validated);

            $arr = ['msg' => __('site.updateMessageSuccess'), 'status' => true];
            DB::commit();
             $arr = ['msg' => __('site.updateMessageSuccess'), 'status' => true];
        } catch (\Exception $e) {
            DB::rollback();
            $arr = ['msg' => __('site.updateMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
    public function destroy(FormElement $formelement)
    {
        if ($formelement->delete()) {
            $arr = ['msg' => __('site.deleteMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __('site.deleteMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }
}
