<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class LoginClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'emailClient' => 'required',
            'passwordClient' => 'required|min:8|max:16',
        ];
    }
    public function messages()
    {
        return [
            'emailClient.required' => 'Email là bắt buộc',
            'passwordClient.min' => 'Mật khẩu tối thiểu 8 kí tự',
            'passwordClient.max' => 'Mật khẩu tối đa 16 kí tự'
        ];
    }
}
