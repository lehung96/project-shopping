<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:categories|max:255|min:6',
            'meta_keywords' => 'bail|required|unique:categories|max:120|min:6',
            'category_slug' => 'required',
            'category_desc' => 'required',
            'parent_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'name.unique' => 'Tên không được phép trùng',
            'name.max' => 'Tên không được phép quá 255 kí tự',
            'name.min' => 'Tên không được phép dưới 6 kí tự',
            'meta_keywords.required' => 'Tên keywords không được phép để trống',
            'meta_keywords.unique' => 'Tên keywords không được phép trùng',
            'meta_keywords.max' => 'Tên keywords không được phép quá 120 kí tự',
            'meta_keywords.min' => 'Tên không được phép dưới 6 kí tự',
            'category_slug.required' => 'Giá không được phép để trống',
            'parent_id.required'  => 'Danh mục không được để trống',
            'category_desc.required'=>' mô tả không được để trống',

        ];
    }
}
