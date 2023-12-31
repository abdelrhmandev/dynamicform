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
        $rules['display']       = 'required|unique:fields,display'.$id;
        $rules['name']          = 'required|unique:fields,name'.$id;
        // $rules['type']          = 'required';
        return $rules; 
    } 
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => 'RequestValidation',
            'msg'      => $validator->errors()
        ]));
    }    
}
