<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateUserRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => "required|email|unique:users,email,$this->id,id",
            'name'  => "required|unique:users,name,$this->id,id",
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Chưa nhập email',
            'email.email'    => 'Email không đúng',
            'email.unique'   => 'Email đã có',
            'name.required'  => 'Chưa nhập tên',
            'name.unique'    => 'Tên đã có',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json([
            'errors' => $errors,
        ], JsonResponse::HTTP_OK));

    }

}
