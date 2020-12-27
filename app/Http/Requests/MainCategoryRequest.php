<?php

namespace App\Http\Requests;

use App\Http\Enumerations\CategoryType;
use Illuminate\Foundation\Http\FormRequest;

class MainCategoryRequest extends FormRequest
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
            'name' => 'required',
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
            'slug' => 'required|unique:categories,slug,'.$this -> id
        ];
        foreach(CategoryType::getAll() as $key => $val)
        {
            $rules[$key] = 'required|in:'.$val;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required'          => 'يجب ادخال الاسم القسم',
            'slug.unique'            => 'يجب ان يكون الاسم بالرابط غير مستخدم من قبل',
            'slug.required'          => 'يجب ادخال الاسم بالرابط',
            'type.required'          => 'يجب ان تختار نوع الحقل',
 
        ];
    }
}
