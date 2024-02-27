<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class BuildingTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {

        $id = $this->request->get('id') ? ',' . $this->request->get('id') : '';
        $rules['title']         = 'required|unique:building_types,title'.$id;
        $rules['image']         = 'nullable|max:1000|mimes:jpeg,bmp,png,gif'; // max size 1 MB
        $rules['form_id']       = 'exists:forms,id';
        $rules['color']         = 'nullable';   
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
