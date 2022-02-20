<?php

namespace App\Http\Requests\office\auth;

use Illuminate\Foundation\Http\FormRequest;

class loginValidation extends FormRequest
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
            'email'   => 'required|email|exists:office_account,email',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
         return [
             'email.required' => ' هذا الحقل مطلوب إدخالة' ,
             'password.required' => ' هذا الحقل مطلوب إدخالة',
             'password.min'    => 'يجب أن تكون كلمة المرور علي الأقل 6 أحرف' ,

         ];
    }
}
