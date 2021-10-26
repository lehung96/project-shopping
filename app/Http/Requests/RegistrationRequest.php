<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // để validation request đầu tiên hàm này phải tra về giá trị true
        // để request được phép ủy quyền

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // trong hàm này chúng ta đã bắt được bug lỗi
        return [
            'customer_name' => 'bail|required|unique:customers|max:255|min:2',
            'customer_email' => 'required',
            'customer_password' => 'required',
            'customer_phone' => 'bail|required|unique:customers|max:255|min:10',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'Tên không được để trống',
            'customer_name.max' => 'Tên không được quá 255 kí tự',
            'customer_name.min' => 'Tên không được dưới 2 kí tự',
            'customer_email.required' => 'Email không được để trống',
            'customer_password.required' => 'Mật khẩu không được để trống',
            'customer_phone.required'  => 'Phone không được để trống',
            'customer_phone.min' => 'phone không được dưới 10 kí tự',
        ];
    }
}
