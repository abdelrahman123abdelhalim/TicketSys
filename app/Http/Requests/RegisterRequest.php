<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
    return true;
    }

    public function rules()
    {
    return [
    'name' => 'required|string|max:255',
    'company_name' => 'required|string|max:255',
    'email' => 'required|email|unique:users,email',
    'mobile' => 'required|string|max:20',
    'password' => 'required|string|min:8|confirmed',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];
    }

    public function messages(){
        return [
            'name.required' => 'حقل اسم المستخدم مطلوب',
            'name.string' => 'اسم المستخدم يجب أن يكون نصًّا',
            'name.max' => 'اسم المستخدم لا يجب أن يتجاوز 255 حرفًا',
            
            'company_name.required' => 'حقل اسم الشركة مطلوب',
            'company_name.string' => 'اسم الشركة يجب أن يكون نصًّا',
            'company_name.max' => 'اسم الشركة لا يجب أن يتجاوز 255 حرفًا',
            
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني يجب أن يكون صالحًا',
            'email.unique' => 'البريد الإلكتروني مُستخدم من قبل',
            
            'mobile.required' => 'حقل رقم الجوال مطلوب',
            'mobile.string' => 'رقم الجوال يجب أن يكون نصًّا',
            'mobile.max' => 'رقم الجوال لا يجب أن يتجاوز 20 حرفًا',
            
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.string' => 'كلمة المرور يجب أن تكون نصًّا',
            'password.min' => 'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
            
            'image.image' => 'يجب أن يكون الملف ملف صورة',
            'image.mimes' => 'يجب أن يكون الملف من نوع: jpeg, png, jpg, gif',
            'image.max' => 'حجم الصورة يجب أن لا يتجاوز 2MB',
        ];
         
    }
}