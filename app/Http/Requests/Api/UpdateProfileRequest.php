<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'username' => 'required|unique:users,username,' . auth()->user()->id,
            'phone' => 'required|unique:users,phone,' . auth()->user()->id,
            'password' => 'nullable|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'برجاء ادخال اسم',
            'email.required' => 'برجاء ادخال بريدك الالكتروني',
            'email.email' => 'برجاء ادخال بريد الكتروني صحيح',
            'email.unique' => 'هذا البريد مستخم من قبل',
            'username.required' => 'برجاء ادخال اسم المستخد',
            'username.unique' => 'اسم المستخد موجود',
            'phone.required' => 'برجاء ادخال رقم هاتف',
            'phone.unique' => 'رقم الهاتف مستخدم من قبل',
            'password.confirmed' => 'كلمة المرور غير متطابقة',
        ];
    }
}
