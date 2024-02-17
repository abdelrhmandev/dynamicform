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
        $rules['width']       = 'required';        
        return $rules; 
    } 

    public function messages(): array
{
    return [
        'label.required' => 'فضلا حدد الأسم الذي سيظر به الحقل',
        'type.required' => 'فضلا حدد نوع الحقل',
        'name.required' => 'الأسم البرمجي للحقل',
        'label.unique' => 'أسم الحقل مستخدم من قبل',
        'name.unique' => 'الأسم البرمجي مستخدم من قبل',
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
