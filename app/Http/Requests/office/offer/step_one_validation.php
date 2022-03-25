<?php

namespace App\Http\Requests\office\offer;

use Illuminate\Foundation\Http\FormRequest;

class step_one_validation extends FormRequest
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
        if ($this->attributes->has('type_offer') == 0) {
            return [
                'type_offer' => 'required',
                'name_owner' => 'required|string|alpha|min:10|max:35',
                'phone' =>'required|digits:10'
            ];
        }else{
            return [
                'name_owner' => 'required|string|alpha|min:10|max:35',
                'phone' =>'required|digits:10'
            ];
        }
        
    }

    public function messages()
    {
        return [
          'type_offer.required' => 'يجب أختيار نوع العقار',
          'name_owner.required' => 'يجب أدخال أسم الزبون',
          'name_owner.string' => 'يجب أن يكون الأسم خالي من الأرقام',
          'name_owner.alpha' => 'يجب أن يكون الأسم خالي من الرموز',
          'name_owner.min' => 'يجب أن يكون الأسم متكون من 10 حروف علي الأقل',
          'name_owner.max' => 'يجب أن لا يتعدي الأسم 35 حرف',

          'phone.required' => 'يجب أدخال رقم الزبون ' ,
          'phone.digits' => 'رقم الهاتف لايجب أن يحتوي علي حروف و مكون من 10 أرقام' ,
         

        ];
    }
}
