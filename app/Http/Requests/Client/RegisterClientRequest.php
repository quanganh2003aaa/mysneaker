<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class RegisterClientRequest extends FormRequest
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
            'emailClient' => 'required|unique:clients',
            'passwordClient' => 'required|min:8|max:16',
            'telClient' => 'required|min:9|max:10'
        ];
    }
    public function messages()
    {
        return [
            'emailClient.required' => 'Email là bắt buộc',
            'emailClient.unique' => 'Email đã tồn tại',
            'passwordClient.min' => 'Mật khẩu tối thiểu 8 kí tự',
            'passwordClient.max' => 'Mật khẩu tối đa 16 kí tự',
            'telClient.max' => 'Số điện thoại không hợp lệ',
            'telClient.min' => 'Số điện thoại không hợp lệ',
            // 'addressClient.max' => 'Tối đa 255 kí tự',
            'name.required' => 'Tên là bắt buộc'
        ];
    }
}
