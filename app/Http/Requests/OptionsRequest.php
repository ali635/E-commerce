<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionsRequest extends FormRequest
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
            'name'          => 'required|max:100',
            'price'         => 'required|numeric|min:0',
            'product_id'    => 'required|exists:products,id',
            'attribute_id'  => 'required|exists:attributes,id',
        ];
    }
    public function messages()
    {
        return [
            'name.required'          => 'يجب ادخال الاسم الخاصية الفرعية', 
            'price.required'         => 'يجب ادخال السعر', 
            'product_id.required'    => 'يجب ختار المنتج',
            'attribute_id.required'  => 'يجب اختيار الخاصية الرئيسية',
        ];
    }
}
