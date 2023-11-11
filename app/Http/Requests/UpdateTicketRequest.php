<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_name'        => 'required',
            'status'           => 'required',
            'type'             => 'required',
            'importance_level' => 'required',
            'customer_name'    => 'required',
            'phone_number'     => 'required|unique:tickets,phone_number,' . $this -> id,
            'email'            => 'required|email|unique:tickets,email,'.$this -> id,
            'directed_to'      => 'required',
            'complaint_subject'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'حقل حالة الشكوى مطلوب.',
            'user_name.required' => 'حقل اسم المستخدم مطلوب.',
            'type.required' => 'حقل نوع الشكوى مطلوب.',
            'importance_level.required' => 'حقل درجة الأهمية مطلوب.',
            'customer_name.required' => 'حقل اسم العميل مطلوب.',
            'phone_number.required' => 'حقل رقم الجوال مطلوب.',
            'phone_number.unique' => ' رقم الجوال مستخدم من قبل !.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني يجب أن يكون صالحا.',
            'email.unique' => 'البريد الإلكتروني  مستخدم من قبل ! .',
            'directed_to.required' => 'حقل موجهة إلى مطلوب.',
            'complaint_subject.required' => 'حقل موضوع الشكوى مطلوب.',
        ];
    }
}