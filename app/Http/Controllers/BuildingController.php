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

    public function create(){
        if (view()->exists('buildings.create')) {
            $compact = [
                'buildingtypes' => BuildingType::select('id','title','image','form_id')->get(),
                'trans'         => $this->TRANS,
                'createRoute'   => route($this->ROUTE_PREFIX . '.create'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
            ];
            return view('buildings.create', $compact);
        }
    }
    public function store(Request $request){
            dd('store');
    }

    public function AjaxFormdata(Request $request){
        $form = BuildingType::with('form')->where('form_id', $request->building_type_id);


         
    $query = BuildingType::with([
        'form' => function($query) {
            $query->select('id', 'title','mobile','id_number','region_id','address_info','gender','created_at');  
        },
       
    ])
    ->where('id', $request->building_type_id)
    ->select(['id', 'title','form_id'])->first();
      


       

        $view = view('buildings.AjaxGetFormdata', ['query' => $query])->render();
        return $view;
    }
}
