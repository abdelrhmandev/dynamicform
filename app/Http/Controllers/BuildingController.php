<?php
namespace App\Http\Controllers;
use Batch;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\BuildingType;
use App\Traits\UploadAble;
use App\Models\FormElement;
use App\Models\BuildingValue;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BuildingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX = 'buildings';
        $this->UPLOADFOLDER = 'buildings';
        $this->TRANS = 'building';
    }
    use UploadAble;

    public function create()
    {
        if (view()->exists('buildings.create')) {
            $compact = [
                'buildingtypes' => BuildingType::select('id', 'title', 'image', 'form_id')->get(),
                'trans' => $this->TRANS,
                'createRoute' => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('buildings.create', $compact);
        }
    }
    public function store(Request $request)
    {

        foreach ($request->field_id as $k => $v) {
            $F_type = substr($k, strpos($k, '-') + 1);
            $os = ['textbox', 'numbers', 'date', 'textarea','email'];
            // Handle Fillable Pure Data Inserted By user
            $fieldId = intval($k);
            $data[$fieldId]['building_type_id'] = $request->building_type_id;
            $data[$fieldId]['field_id'] = $fieldId;
            $data[$fieldId]['field_fillable_id'] = null;
            $data[$fieldId]['fill_answer_text'] = null;

            if (in_array($F_type, $os)) {
                $data[$fieldId]['fill_answer_text'] = $v;
            } elseif ($F_type == 'file') {
                $fileNameToStore = Str::random(25) . '.' . $v->getClientOriginalExtension();
                $v->move(public_path('uploads/' . $this->UPLOADFOLDER), $fileNameToStore);
                $data[$fieldId]['fill_answer_text'] = 'uploads/' . $this->UPLOADFOLDER . '/' . $fileNameToStore;
            } elseif ($F_type == 'checkbox') {
                //Get Forgin Fillable Ids
                $data[$fieldId]['field_fillable_id'] = implode(',', $v);
                $data[$fieldId]['fill_answer_text'] = null;
            } else {
                $data[$fieldId]['field_fillable_id'] = $v;
            }
        }
        if (DB::table('buildings')->insert($data)) {
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageError'), 'status' => false];
        }
        return response()->json($arr); 


    }

    public function AjaxFormdata(Request $request)
    {
        $form = BuildingType::with('form')->where('form_id', $request->building_type_id);

        $query = BuildingType::with([
            'form' => function ($query) {
                $query->select('id', 'title', 'mobile', 'id_number', 'region_id', 'address_info', 'gender', 'created_at');
            },
            'form.fields.fillables'
        ])
            ->where('id', $request->building_type_id)
            ->select(['id', 'title', 'form_id'])
            ->first();

        $view = view('buildings.AjaxGetFormdata', ['query' => $query])->render();
        return $view;
    }
}
