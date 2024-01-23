<?php
namespace App\Http\Controllers;
use Batch;
use Carbon\Carbon;
use App\Models\Form;
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
            $os = ['textbox', 'numbers', 'date', 'textarea'];
            // Handle Fillable Pure Data Inserted By user
            $fieldId = intval($k);
            $data[$fieldId]['form_id'] = 1;
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

    public function edit($id)
    {
        $form = Form::with(['fields.fillables', 'fields.values'])
            ->where('id', $id)
            ->first();
        $fields = $form->fields;
        $values = $form->values;

        if (view()->exists('buildings.answer')) {
            $compact = [
                'updateRoute' => route($this->ROUTE_PREFIX . '.update', $id),
                'values' => $values,
                'fields' => $fields,
            ];
            return view('buildings.edit', $compact);
        }
    }

    public function update(Request $request, $id)
    {
        $form = Form::FindOrFail($id)
            ->with('fields.values')
            ->first();

        foreach ($request->field_id as $k => $v) {
            $F_type = substr($k, strpos($k, '-') + 1);
            $os = ['textbox', 'numbers', 'date', 'textarea'];
            // Handle Fillable Pure Data Inserted By user
            $fieldId = intval($k);
            $updateRecord[$fieldId]['form_id'] = $id;
            $updateRecord[$fieldId]['field_id'] = $fieldId;
            $updateRecord[$fieldId]['field_fillable_id'] = null;
            $updateRecord[$fieldId]['fill_answer_text'] = $v;

            echo '<pre>';
            ///////////////////////////////////////////////////////////////////////////////
            if (in_array($F_type, $os)) {
                $updateRecord[$fieldId]['fill_answer_text'] = $v;
            } elseif ($F_type == 'file') {
                if (!empty($v)) {
                    foreach ($form->fields as $b) {
                        if (!empty($b->values->fill_answer_text)) {
                            if ($b->values->field_id == $fieldId) {
                                $this->unlinkFile($b->values->fill_answer_text);
                            }
                        }
                    }

                    // Delete Old File
                    $fileNameToStore = Str::random(25) . '.' . $v->getClientOriginalExtension();
                    $v->move(public_path('uploads/' . $this->UPLOADFOLDER), $fileNameToStore);
                    $updateRecord[$fieldId]['fill_answer_text'] = 'uploads/' . $this->UPLOADFOLDER . '/' . $fileNameToStore;
                }
            } elseif ($F_type == 'checkbox') {
                $updateRecord[$fieldId]['field_fillable_id'] = implode(',', $v);
                $updateRecord[$fieldId]['fill_answer_text'] = null;
            } else {
                $updateRecord[$fieldId]['field_fillable_id'] = $v;
            }
        }

        #update old fillable
        $index = 'field_id';
        $BuildInstance = new BuildingValue();

        \Batch::update($BuildInstance, $updateRecord, $index);

        echo '<pre>';
        // dd($updateRecord);
        echo '<pre>';
    }
}
