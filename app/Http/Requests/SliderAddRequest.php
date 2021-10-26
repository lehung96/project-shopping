<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:sliders|max:255|min:10',
            'price' => 'required',
            'description' => 'required',
            'content_time' => 'required',
            'discount' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'name.unique' => 'Tên không được phép trùng',
            'name.max' => 'Tên không được phép quá 255 kí tự',
            'name.min' => 'Tên không được phép dưới 10 kí tự',
            'price.required' => 'Giá không được phép để trống',
            'content_time.required'  => 'nội dung & thời gian không được để trống',
            'description.required'=>' mô tả không được để trống',
            'discount.required'  => 'giảm giá không được để trống',
        ];
    }
}
