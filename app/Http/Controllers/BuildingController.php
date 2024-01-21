<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\FormElement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Traits\UploadAble;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

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
        $this->ROUTE_PREFIX = 'buildings';
        $this->UPLOADFOLDER = 'buildings';
    }
    use UploadAble;

    public function store(Request $request)
    {

        
    
        foreach ($request->field_id as $k => $v) {

            $F_type = substr($k, strpos($k, '-') + 1);
            $os = array("textbox", "numbers", "date", "textarea","file");
            if (in_array($F_type, $os)) {
              
             $fieldId = intval($k);   
                $data[$fieldId]['form_id'] = 1;
                $data[$fieldId]['field_id'] = $fieldId;
                $data[$fieldId]['fill_answer_text'] = $v;

                
            }
        }


       
         DB::table('building_values')->insert($data);
        
    }

    public function create()
    {
        $form = Form::with('fields.fillables')
            ->where('id', 1)
            ->first();

        $fields = $form->fields;

        if (view()->exists('buildings.answer')) {
            $compact = [
                'listingRoute' => route($this->ROUTE_PREFIX . '.index'),
                'storeRoute' => route($this->ROUTE_PREFIX . '.store'),
                'fields' => $fields,
            ];
            return view('buildings.answer', $compact);
        }
    }
}
