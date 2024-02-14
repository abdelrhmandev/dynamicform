<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class FieldRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {

        $id = $this->request->get('id') ? ',' . $this->request->get('id') : '';
        $rules['label']       = 'required|unique:fields,label'.$id;
        $rules['name']        = 'required|unique:fields,name'.$id;
        $rules['type']        = 'required';        
        return $rules; 
    } 

    public function messages(): array
{
    return [
        'type.required' => 'فضلا حدد نوع الحقل',
    ];
}

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => 'RequestValidation',
            'msg'      => $validator->errors()
        ]));
    }    
}
