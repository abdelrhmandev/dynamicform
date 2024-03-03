<?php
namespace App\Http\Controllers;
use Batch;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\Building;
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use App\Models\BuildingType;
use Illuminate\Http\Request;
use App\Models\BuildingSubmission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\BuildingRequest;
use App\Models\BuildingSubmissionMultiplie;

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
                'buildingtypes' => BuildingType::select('id', 'title', 'image', 'form_id')->withCount('buildings')->get(),
                'trans' => $this->TRANS,
                'createRoute' => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('buildings.create', $compact);
        }
    }
    public function store(BuildingRequest $request)
    {
        $validated = $request->validated();
        $query = Building::create($validated);
        if ($query) {
            $building_id = $query->id;
            $BuildingSubmissionMiltiplie = [];
            $SaveMulti = [];
            ////////Inser building detailed data /////////////////////
            foreach ($request->field_id as $k => $v) {
                $F_type = substr($k, strpos($k, '-') + 1);
                $os = ['textbox', 'number', 'date', 'textarea', 'email'];
                // Handle Fillable Pure Data Inserted By user
                $fieldId = intval($k);
                $data[$fieldId]['building_id'] = $building_id;
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
                    foreach ($v as $k => $b_sMiltiplie) {
                        $BuildingSubmissionMiltiplie[$k]['field_fillable_id'] = $b_sMiltiplie;
                    }
                    //Get Forgin Fillable Ids
                    $data[$fieldId]['field_fillable_id'] = 'multiplie_answer';
                    $data[$fieldId]['fill_answer_text']  = 'multiplie_answer';
                } else {
                    $data[$fieldId]['field_fillable_id'] = $v;
                }
            }
            $b_Query = BuildingSubmission::insert($data);
            if (isset($BuildingSubmissionMiltiplie) && !(empty($BuildingSubmissionMiltiplie))) {
                $building_submission_id = DB::getPdo()->lastInsertId();
                foreach ($BuildingSubmissionMiltiplie as $k => $v) {
                    $SaveMulti[$k]['building_submission_id'] = $building_submission_id;
                    $SaveMulti[$k]['field_fillable_id'] = $v['field_fillable_id'];
                }
                BuildingSubmissionMultiplie::insert($SaveMulti);
            }
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageSuccess'), 'status' => true];
        } else {
            $arr = ['msg' => __($this->TRANS . '.' . 'storeMessageError'), 'status' => false];
        }
        return response()->json($arr);
    }

    public function index()
    {
        if (view()->exists('buildings.index')) {
            $buildings = Building::with(['submissions.fields','submissions.bfillables'])->get();

            $compact = [
                'buildings'   => $buildings,
                'trans'       => $this->TRANS,
                'createRoute' => route($this->ROUTE_PREFIX . '.create'),
            ];
            return view('buildings.index', $compact);
        }
    }
    public function AjaxFormdata(Request $request)
    {
        $query = BuildingType::with([
            'form' => function ($query) {
                $query->select('id', 'title', 'mobile', 'id_number', 'region_id', 'address_info', 'gender', 'created_at');
            },
            'form.fields.fillables',
        ])
            ->where('id', $request->building_type_id)
            ->select(['id', 'title', 'form_id'])
            ->first();
        $view = view('buildings.AjaxGetFormdata', ['query' => $query])->render();
        return $view;
    }
}
