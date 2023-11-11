<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required',
            'user_name' => 'required',
            'customer_name' => 'required',
            'phone_number'     => 'required|unique:tickets,phone_number,' . $this -> id,
            'email'            => 'required|email|unique:tickets,email,'.$this -> id,
            'importance_level' => 'required',
            'directed_to' => 'required',
            'complaint_subject' => 'required',
            'complaint_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'حقل نوع الشكوى مطلوب.',
            'user_name.required' => 'حقل اسم المستخدم مطلوب.',
            'customer_name.required' => 'حقل اسم العميل مطلوب.',
            'phone_number.required' => 'حقل رقم الجوال مطلوب.',
            'phone_number.unique' => ' رقم الجوال مستخدم من قبل !.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني يجب أن يكون صالحا.',
            'email.unique' => 'البريد الإلكتروني  مستخدم من قبل ! .',
            'importance_level.required' => 'حقل درجة الأهمية مطلوب.',
            'directed_to.required' => 'حقل موجهة إلى مطلوب.',
            'complaint_subject.required' => 'حقل موضوع الشكوى مطلوب.',
            'complaint_description.required' => 'حقل وصف الشكوى مطلوب.',
        ];
    }
}