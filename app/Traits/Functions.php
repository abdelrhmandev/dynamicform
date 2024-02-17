<?php
namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
/**
 * Trait UploadAble
 * @package App\Traits
 */
trait Functions
{
    public function handleSaveField($request)
    {
        $field = [];
        $pattern = '';
        

        if ($request->type == 'textbox' || $request->type == 'textarea') {
            if ($request->attribute == 'arabic_letters_only') {
                $pattern = '^[\u0621-\u064A\u0660-\u0669 ]+$';
                $message = 'هذا الحقل يقبل كتابه لغه عربيه فقط';
            }
            $dataValidation['validators'] = [
                'type' => 'Regex',
                'pattern' => $pattern ?? '',
                'message' => $message ?? '',
                'minlength' => $request->minlength ?? '',
                'minStringLengthMessage' => $request->minlength ? 'يجب أن يكون عدد حروف النّص بحد أدني ' . $request->minlength : '',
                'maxlength' => $request->maxlength ?? '',
                'maxStringLengthMessage' => $request->maxlength ? 'يجب أن يكون عدد حروف النّص بحد أقصي ' . $request->maxlength : '',
            ];
        } elseif ($request->type == 'email') {
            $pattern = '/^[a-zA-Z0-9. _-]+@[a-zA-Z0-9. -]+\. [a-zA-Z]{2,4}$/';
            $message = 'البريد الألكتروني يجب أن يكون في صيغه صحيحه';
        } elseif ($request->type == 'numbers') {
            $dataValidation['validators'] = [
                'type' => 'StringLength',
                'minlength' => $request->NumbersMinLength ?? '',
                'minStringLengthMessage' => $request->NumbersMinLength ? 'يجب أن يكون عدد الأرقام بحد أدني ' . $request->NumbersMinLength : '',
                'maxlength' => $request->NumbersMaxLength ?? '',
                'maxStringLengthMessage' => $request->NumbersMaxLength ? 'يجب أن يكون عدد الأرقام بحد أقصي ' . $request->NumbersMaxLength : '',
                'prefix' => $request->NumbersPrefix ?? '',
            ];
        } elseif ($request->type == 'file') {
            $data_file = 'true';
            if ($request->checkFileRules == 'images') {
                $accept = '.png, .jpg, .jpeg';
                $data_file_extension = 'jpeg,jpg,png';
                $data_file_type = 'image/jpeg,image/jpg,image/png';
                $data_file_message = __('validation.mimetypes', ['attribute' => 'image', 'values' => '*.png, *.jpg and *.jpeg']);
            } elseif ($request->checkFileRules == 'documents') {
                $accept = '.xlsx,.docx,.pdf';
                $data_file_extension = 'xlsx,docx,pdf';
                $data_file_type = 'application/xlsx,application/docx,application/pdf';
                $data_file_message = __('validation.mimetypes', ['attribute' => 'file', 'values' => '*.xlsx, *.docx and *.pdf']);
            }
            $dataValidation['validators'] = [
                'accept' => $accept,
                'data_file_extension' => $data_file_extension,
                'data_file_type' => $data_file_type,
                'data_file_message' => $data_file_message,
            ];
        } elseif ($request->type == 'date') {
            $dataValidation['validators'] = [
                'is_min_date' => $request->is_min_date ? '1' : '',
            ];
        } elseif ($request->type == 'date_range') {
            $dataValidation['validators'] = [
                'min_date' => $request->date_range_min_date ?? '',
                'max_date' => $request->date_range_max_date ?? '',
            ];
        }

        ///////////////////////If validation values is empty remove also key ///////////////////

        $validation = NULL;
        if(isset($dataValidation['validators'])){
            foreach ($dataValidation['validators'] as $key => $value) {
                if (is_null($value) || $value == '') {
                    unset($dataValidation['validators'][$key]);
                }
            }  
            $validation = json_encode($dataValidation['validators']);          
        }
        $field['type']        = $request->type;
        $field['label']       = $request->label;
        $field['name']        = $request->name;
        $field['width']       = $request->width;
        $field['is_required'] = $request->is_required ?? '0';
        $field['validation']  =  $validation;
        return $field;
    }

    public function dataTableGetStatus($row)
    {
        if ($row->status == 1) {
            $checked = 'checked';
            $statusLabel = "<span class=\"text-success\">" . __('site.published') . '</span>';
        } else {
            $checked = '';
            $statusLabel = "<span class=\"text-danger\">" . __('site.unpublished') . '</span>';
        }
        $div = "<div class=\"form-check form-switch form-check-custom form-check-solid\"><input class=\"form-check-input UpdateStatus\" name=\"Updatetatus\" type=\"checkbox\" " . $checked . " id=\"Status" . $row->id . "\" onclick=\"UpdateStatus($row->id,'" . __($this->TRANS . '.plural') . "','$this->Tbl','" . route('UpdateStatus') . "')\" />&nbsp;" . $statusLabel . '</div>';
        return $div;
    }

    public function dataTableGetCreatedat($date)
    {
        $div = "<div class=\"font-weight-bolder text-primary mb-0\">" . \Carbon\Carbon::parse($date)->format('d/m/Y') . '</div><div class=\"text-muted\">' . '' . '</div>';
        return [
            'display' => $div,
            'timestamp' => $date->timestamp,
        ];
    }

    public function dataTableEditRecordAction($row, $route, $hide_edit = null)
    {
        $editRoute = $hide_edit == 'hide_edit' ? 'hide_edit' : route($route . '.edit', $row->id);

        return view('partials.btns.edit-delete', [
            'trans' => $this->TRANS,
            'editRoute' => $editRoute,
            'destroyRoute' => route($route . '.destroy', $row->id),
            'id' => $row->id,
        ]);
    }

    public function dataTableUpdateStatus(Request $request)
    {
        if (DB::table($request->table)->find($request->id)) {
            if (
                DB::table($request->table)
                    ->where('id', $request->id)
                    ->update(['status' => $request->status])
            ) {
                $arr = ['msg' => __('site.status_updated'), 'status' => true];
            } else {
                $arr = ['msg' => 'ERROR In Update Status', 'status' => false];
            }
            return response()->json($arr);
        }
    }
}
