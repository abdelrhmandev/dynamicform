<?php
namespace App\Http\Controllers;
use DataTables;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\Region;
use App\Models\Field;
use App\Models\FormField;
use App\Traits\Functions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FormDRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormDUpdateRequest;

class FormController extends Controller
{
    use Functions;
    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX = 'forms';
        $this->TRANS = 'form';
        $this->Tbl = 'forms';
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
            $model = Form::with('fields','region')->withCount('fields');

            return Datatables::of($model)

                ->addIndexColumn()
                ->editColumn('title', function ($row) {
                    return '<a href=' . route($this->ROUTE_PREFIX . '.edit', $row->id) . " class=\"text-gray-800 text-hover-primary fs-5 fw-bold mb-1\" data-kt-item-filter" . $row->id . "=\"item\">" . $row->title . '</a>';
                })

                ->editColumn('region_id', function ($row) {
                    return $row->region->title;
                })

                ->editColumn('gender', function ($row) {
                    if ($row->gender == 'male') {                       
                        $div = "<span class=\"text-success\">ذكر</span>";
                    } else {                       
                        $div = "<span class=\"text-danger\">أنثي</span>";
                    }
                     return $div;
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
                ->rawColumns(['title', 'mobile', 'id_number', 'region_id', 'address_info', 'gender', 'fields', 'actions', 'created_at', 'created_at.display'])
                ->make(true);
        }
        if (view()->exists('forms.index')) {
            $compact = [
                'trans' => $this->TRANS,
                'createRoute' => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'destroyMultipleRoute' => route($this->ROUTE_PREFIX . '.destroyMultiple'),
            ];
            return view('forms.index', $compact);
        }
    }
    public function create()
    {
        if (view()->exists('forms.create')) {
            $compact = [
                'trans'          => $this->TRANS,
                'regions'       =>Region::where('country_id',177)->select('id','title')->get(),
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('forms.create', $compact);
        }
    }
    public function edit(Form $form)
    {   
        if (view()->exists('forms.edit')) {
            $compact = [
                'updateRoute'            => route($this->ROUTE_PREFIX . '.update', $form->id),
                'row'                    => $form,
                'destroyRoute'           => route($this->ROUTE_PREFIX . '.destroy', $form->id),
                'trans'                  => $this->TRANS,
                'regions'                =>Region::where('country_id',177)->select('id','title')->get(),
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
}
