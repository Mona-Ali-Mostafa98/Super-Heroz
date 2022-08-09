<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,except,id',
            'phone' => 'required|numeric|min:10|unique:users,phone,except,id',  //|regex:/^([0-9\s\-\+\(\)]*)$/  digits:10
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required',Password::min(8),  //Hash::make($data['password']
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'مطلوب ادخال الاسم الثلاثى',
        'email.required' => 'مطلوب ادخال البريد الالكترونى',
        'name.min' => 'مطلوب ادخال اسم المستخد كاملا',
        'email.email' => 'مطلوب ادخال بريد الكترونى صحيح',
        'phone.required' => 'مطلوب ادخال رقم الهاتف',
        'phone.min' => ' مطلوب ادخال رقم هاتف لا يقل عن 10 ارقام',

    ];
}
}