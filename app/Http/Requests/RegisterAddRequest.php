<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAddRequest extends FormRequest
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
    //Hàm này kiểm tra dữ gửi qua xem có đúng yêu cầu ko
    public function rules()
    {
        // trong hàm này chúng ta đã bắt được bug lỗi

        return [
            //kiểm tra 4 trường gửi qua

            //admin_name phải được yêu cầu(required) ký tự tối đa nhập vào max:255
            'admin_name' => 'bail|required|max:255|min:2',
            'admin_phone' => 'bail|required|max:15|min:10',
            'admin_email' => 'bail|required|email|max:120|min:10',
            'admin_password' =>'bail|required|max:120|min:3',
        ];
    }

    public function messages()
    {
        return [
            'admin_name.required' => 'Tên không được phép để trống',
            'admin_name.max' => 'Tên không được phép quá 255 kí tự',
            'admin_name.min' => 'Tên không được phép dưới 2 kí tự',
            'admin_phone.required' => 'Số điện không được phép để trống',
            'admin_phone.max' => 'Số điện không được phép quá 15 kí tự',
            'admin_phone.min' => 'Số điện không được phép dưới 10 kí tự',
            'admin_email.required' => 'email không được phép để trống',
            'admin_email.max' => 'email không được phép quá 120 kí tự',
            'admin_email.min' => 'email không được phép dưới 10 kí tự',
            'admin_password.required' => 'password không được phép để trống',
            'admin_password.max' => 'password không được phép quá 120 kí tự',
            'admin_password.min' => 'password không được phép dưới 3 kí tự',
        ];
    }
}
