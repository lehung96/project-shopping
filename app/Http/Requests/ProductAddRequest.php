<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'product_name' => 'bail|required|unique:products|max:255|min:10',
            'meta_keywords' => 'bail|required|unique:products|max:120|min:6',
            'product_quantity' => 'required',
            'price' => 'required',
            'promontion_price' => 'required',
            'desc' => 'required',
            'category_id' => 'required',
            'contents' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Tên không được phép để trống',
            'product_name.unique' => 'Tên không được phép trùng',
            'product_name.max' => 'Tên không được phép quá 255 kí tự',
            'product_name.min' => 'Tên không được phép dưới 10 kí tự',
            'meta_keywords.required' => 'Tên keywords không được phép để trống',
            'meta_keywords.unique' => 'Tên keywords không được phép trùng',
            'meta_keywords.max' => 'Tên keywords không được phép quá 120 kí tự',
            'meta_keywords.min' => 'Tên không được phép dưới 6 kí tự',
            'product_quantity.required' => 'số lượng không được phép để trống',
            'price.required' => 'Giá không được phép để trống',
            'promontion_price.required' => 'Giá không được phép để trống',
            'category_id.required' => 'Danh mục không được để trống',
            'desc.required' => ' mô tả không được để trống',
            'contents.required' => 'Nội dung không được để trống',
        ];
    }
}
