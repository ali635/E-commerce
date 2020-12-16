<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'email'         => 'required|email|unique:admins,email,'.$this->id,
            'name'          => 'required',
            'password'      => 'nullable|confirmed|min:8'
        ];
    }
    public function messages()
    {
        return [
            'email.required'        => 'يجب ادخال الايميل',
            'email.email'           => 'يجب ان تكون صيغة الايميل صحيحة',
            'email.unique'          => 'يجب ان يكون الايميل غير مستخدم من قبل',
            'name.required'         => 'يجب ادخال اسمك',
            'password.min'          => 'يجب الا تقل كلمة المرور عن ثمانية احرف او ارقام', 
            'password.confirmed'    => 'كلمة المرور غير مطابقة',
        ];
    }
}
