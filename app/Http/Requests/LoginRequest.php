<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginRequest extends FormRequest
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
            'email'    => 'required|email',
            'password' => 'required|min:8|regex:/^(?=.*?[a-zA-Z])(?=.*[0-9]).*$/',
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Chưa nhập email',
            'email.email'       => 'Email không đúng',
            'password.required' => 'Chưa nhập mật khẩu',
            'password.min'      => 'Mật khẩu phải hơn 8 kí tự',
            'password.regex'    => 'Mật khẩu gồm chữ in hoa, chữ thường, chữ số, không có kí tự đặc biệt',
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
