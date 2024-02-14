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

    public function store(Request $request)
    {

        
        dd($request);
        $query = FormField::insert([
            'form_id'=>'1',
            'field_id'=>$request->field_id,
            'order'=>NULL,
        ]);
        dd();

        $model = FormField::where('form_id','1')->get();
        $output = '';
        $output .= '  
        <h3>Order Details</h3>  
        <div class="table-responsive">  
             <table class="table table-bordered">  
                  <tr>  
                       <th width="40%">Item Name</th>  
                       <th width="20%">Action</th>  
                  </tr>  
   ';  
   foreach($model as $keys => $values)  {  
        $output .= '  
             <tr>  
                  <td>'.$values["field_id"].'.<a href="#" class="remove_field" id="'.$values["field_id"]. '"><span class="text-danger">Remove</span></a></td>  
             </tr>  
        ';  
   }  
   $output .= '          
   </table>  
   ';  
   return response()->json($output);
 



    
        // $validated = $request->validated();
        // $validated['title'] = $request->title;

        // $query = Form::create($validated);
        // if ($query) {
        //     $field_id = [];
        //     $required = [];
        //     $note = [];
        //     if (!empty($request->field_id)) {
        //         foreach ($request->field_id as $field) {
        //             if (!empty($field)) {
        //                 $FormField[$field]['is_required'] = !empty($request->is_required[$field]) ? $request->is_required[$field] : '0';
        //                 $FormField[$field]['field_id'] = $field;
        //                 $FormField[$field]['form_id'] = $query->id;
        //             }
        //         }
        //         FormField::insert($FormField);
        //     }
        //     $arr = ['msg' => __($this->TRANS . '.storeMessageSuccess'), 'status' => true];
        // } else {
        //     $arr = ['msg' => __($this->TRANS . '.storeMessageError'), 'status' => false];
        // }
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function GetFields($Form_id){

        
      $model = FormField::where('form_id',$Form_id)->get();


    }

     
    public function index(Request $request)
    {
       
        if ($request->ajax()) {
            $model = Form::with('fields', 'region')->withCount('fields');

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

                // ->editColumn('fields', function ($row) {
                //     $formfields = '';
                //     if(count($row->fields)>0){
                //         foreach($row->fields as $value){
                //             $formfields.= "<div class=\"badge py-3 px-4 fs-7 badge-light-primary mt-1\">&nbsp;" . "<span class=\"text-primary\">".$value->display."</span></div> ";
                //         }
                //     }else{
                //         $formfields = "<div class=\"badge py-3 px-4 fs-7 badge-light-warning\">&nbsp;" . "<span class=\"text-warning\">لم يتم بعد ربط حقول بهذه الأستمارة</span></div>";
                //     }
                //     return $formfields;
                // })

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
                'fields' => Field::with('fillables')                    
                    ->get(),
                'trans' => $this->TRANS,
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('forms.create', $compact);
        }
    }
    public function edit(Request $request, Form $form)
    {
        $OldFormfields = $form->fields;

        $fields = Field::with('fillables')
            ->get()
            ->map(function ($field) use ($OldFormfields) {
                $field->is_required = data_get($OldFormfields->firstWhere('id', $field->id), 'pivot.is_required') ?? 0;
                // $field->is_disabled = data_get($OldFormfields->firstWhere('id', $field->id), 'pivot.is_disabled') ?? 0;
                // $field->summable    = data_get($OldFormfields->firstWhere('id', $field->id), 'pivot.summable') ?? 0;
                return $field;
            });

        if (view()->exists('forms.edit')) {
            $compact = [
                'fields' => $fields,
                'OldFormfields' => $OldFormfields->count(),
                'updateRoute' => route($this->ROUTE_PREFIX . '.update', $form->id),
                'row' => $form,
                'destroyRoute' => route($this->ROUTE_PREFIX . '.destroy', $form->id),
                'trans' => $this->TRANS,
                'EditRoute' => route($this->ROUTE_PREFIX . '.edit', $form->id),
                'redirect_after_destroy' => route($this->ROUTE_PREFIX . '.index'),
            ];
            return view('forms.edit', $compact);
        }
    }

    public function update(FormDRequest $request, Form $form)
    {
        $validated = $request->validated();
        $validated['title'] = $request->title;

        $field_id = $request->input('field_id');
        $is_required = $request->input('is_required');

        $update = $form->update($validated);
        $form->fields()->sync($this->mapFields($field_id, $is_required)); // More Extra Columns
        if ($update) {
            $arr = ['msg' => __('form.updateMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __('form.updateMessageError'), 'status' => true];
        }
        return response()->json($arr);
    }

    public function mapFields($field_id, $is_required)
    {
        $MapFieldsArr = [];
        foreach ($field_id as $field) {
            if (!empty($field)) {
                $MapFieldsArr[] = [
                    'field_id' => $field,
                    'is_required' => $is_required[$field] ?? '0',
                ];
            }
        }
        $Fieldscollection = collect($MapFieldsArr);
        $keyed = $Fieldscollection->keyBy(function ($item, $key) {
            return $item['field_id'];
        });
        return $keyed;
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
