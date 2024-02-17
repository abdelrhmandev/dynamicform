<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class FormDRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $id = $this->request->get('id') ? ',' . $this->request->get('id') : '';
        $rules['title'] = 'required|unique:forms,title' . $id;

        $rules['mobile'] = 'required|unique:forms,mobile' . $id;

        $rules['id_number'] = 'required|unique:forms,id_number' . $id;
        $rules['address_info'] = 'nullable';

        $rules['region_id'] = 'exists:regions,id';

        $rules['gender'] = 'required|in:male,female';

        return $rules;
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => 'RequestValidation',
                'msg' => $validator->errors(),
            ]),
        );
    }
}
