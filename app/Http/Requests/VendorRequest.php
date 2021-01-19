<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'name'          => 'required|string',
            'mobile'        => 'required|numeric|unique:vendors,mobile,'.$this -> id,
            'email'         => 'required|email|unique:vendors,email,'.$this -> id,
            'password'      => 'required|min:8|string',
            'iban'          => 'required|string|min:22|max:30|unique:vendors,iban,'.$this -> id,
            'city'          => 'required|string|min:4',
            'address'       => 'required|string|min:20',
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'يجب ادخال الاسم',
            'mobile.required'       => 'يجب ادخال رقم الهاتف',
            'email.required'        => 'يجب ادخال الايميل',
            'email.email'           => 'يجب ان تكون صيغة الايميل صحيحة',
            'password.required'     => 'يجب ادخال كلمة المرور',
            'iban.required'         => 'يجب ادخال الحساب البنكي IBAN',
            'city.required'         => 'يجب ادخال المدينة',
            'address.required'      => 'يجب ادخال عنوانك بالتفصيل',
        ];
    }
}
