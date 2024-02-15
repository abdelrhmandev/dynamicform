<?php
namespace App\Http\Controllers;
 
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
