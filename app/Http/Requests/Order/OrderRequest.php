<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'nameClient' => 'sometimes',
            'telClient' => 'required|min:9|max:10',
            'addressClient' => 'required|max:255',
            'product' => 'required',
            'note' => 'sometimes',
            'sumPrice' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'addressClient.required' => 'Địa chỉ là bắt buộc',
            'telClient.required' => 'Số điện thoại là bắt buộc',
            'addressClient.max' => 'Địa chỉ tối đa 255 kí tự',
            'telClient.max' => 'Số điện thoại không hợp lệ',
            'telClient.min' => 'Số điện thoại không hợp lệ',
            'product.required' => 'Giỏ hàng của bạn bị lỗi',
            'sumPrice.required' => 'Tổng tiền là bắt buộc'
        ];
    }
}
