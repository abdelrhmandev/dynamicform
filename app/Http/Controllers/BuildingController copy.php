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

        $data['form_id'] = 1;
    
        foreach ($request->field_id as $k => $v) {
            // Field Type File Upload
            $F_type = substr($k, strpos($k, '-') + 1);
            // echo '<h1>'.$F_type.'</h1>'.$v.'<br>';
            // $Field_id = 0;


            // Handle Fillable Pure Data Inserted By user
            $data['field_fillable_id'] = $v;

            $os = array("textbox", "numbers", "date", "textarea","file");
            if (in_array($F_type, $os)) {
            
                $data['field_fillable_id'][$k] = $v;
            }

            dd();


            /*if ($F_type == 'file') {            
                $fileNameToStore =  Str::random(25) . "." .$v->getClientOriginalExtension();
                $database_file = $v->move(public_path('uploads/'.$this->UPLOADFOLDER), $fileNameToStore);            
                $data[$k] = $database_file;
            }*/
            // $k;

                // Handle Fillable With Related Foreign Key form_fillable_id


        }

        dd($data);
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
