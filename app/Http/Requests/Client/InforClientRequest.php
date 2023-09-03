<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class InforClientRequest extends FormRequest
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
            'nameClient' => 'required',
            // 'emailClient' => 'required|unique:clients',
            // 'passwordClient' => 'required|min:8|max:16',
            'telClient' => 'required|min:9|max:10',
            'addressClient' => 'sometimes|max:255'
        ];

    }
    public function messages()
    {
        return [
            // 'emailClient.unique' => 'Email đã tồn tại',
            // 'password.min' => 'Mật khẩu tối thiểu 8 kí tự',
            // 'password.max' => 'Mật khẩu tối đa 16 kí tự'
            'telClient.max' => 'Số điện thoại không hợp lệ',
            'telClient.min' => 'Số điện thoại không hợp lệ',
            'addressClient.max' => 'Tối đa 255 kí tự',
            'nameClient.required' => 'Tên là bắt buộc'
        ];
    }
}
