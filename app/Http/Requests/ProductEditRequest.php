<?php

namespace App\Http\Requests;
use App\Rules\ProductQty;
use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'name'                  => 'required|max:100',
            'slug'                  => 'required|unique:products,slug,'.$this -> id,
            'description'           => 'required|max:1000',
            'short_description'     => 'nullable|max:500',
            'categories'            => 'array|min:1',
            'categories.*'          => 'numeric|exists:categories,id',
            'tags'                  => 'nullable',
            'brand_id'              => 'nullable|exists:brands,id',  
            'price'                 => 'required|min:0|numeric',
            'photo'                 => 'required',
            'special_price'         => 'nullable|numeric',
            'special_price_type'    => 'required_with:special_price|in:fixed,percent',
            'special_price_start'   => 'required_with:special_price|date_format:Y-m-d',
            'special_price_end'     => 'required_with:special_price|date_format:Y-m-d',
            'sku'                   => 'nullable|min:3|max:10',
            'manage_stock'          => 'required|in:0,1',
            'in_stock' => 'required|in:0,1',
            'document' => 'required|array|min:1',
            'document.*' => 'required|string',
            //'qty' => 'required_if:manage_stock,==,1',
            'qty'  =>[new ProductQty($this ->manage_stock )]

        ];
    }
    public function messages()
    {
        return [
            'name.required'          => 'يجب ادخال الاسم المنتج القسم',
            'slug.unique'            => 'يجب ان يكون الاسم بالرابط غير مستخدم من قبل',
            'slug.required'          => 'يجب ادخال الاسم بالرابط',
            'description.required'   => 'يجب ادخال وصف المنتج',
            'description.max'        => 'يجب الا يزيد حروف الوصف عن ألف حرف',
            'short_description.max'  => 'يجب الا يزيد حروف الوصف عن 500 حرف',
            'categories.min'         => 'يجب ان تختار قسم واحد علي الاقل',   
            'categories.exists'      => 'يجب ان يكون القسم موجود',
            'brand_id.required'      => 'يجب ان تكون العلامة التجارية موجودة',
            'price.required'                        => 'يجب ادخال سعر المنتج',
          
            'special_price_type.required'           => 'نوع السعر الخاص يجب ان يكون موجود',
            'special_price_start.required'          => 'تاريخ بداية السعر الخاص يجب ان يكون موجود',
            'special_price_end.required'            => 'تاريخ نهاية السعر الخاص يجب ان يكون موجود',
            'manage_stock.required'       => '',
           
            'in_stock.required'           => 'يجب ان يكون المنتج متوفر في المخزن',
        ];
    }
}
