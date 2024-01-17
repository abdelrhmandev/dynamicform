<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\FormElement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Form as MainModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormElementRequest as ModuleRequest;

class BuildingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->ROUTE_PREFIX     = 'buildings';        
    }

    
    public function store(ModuleRequest $request)
    {
 
        
        
    }


  
    public function create()
    {

        $fields = Form::with([
            'fields' => function($query) {
                $query->select('*'); # Many to many
            },
        ])->where('id','1')->get();

        if (view()->exists('buildings.answer')) {
            $compact = [
                'listingRoute'  => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute'    => route($this->ROUTE_PREFIX . '.store'),
                'fields'          =>$fields
            ];
            return view('buildings.answer', $compact);
        }
    }
 

 
}
