<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'email' => ['required','string','email','max:255' , Rule::unique('users')->ignore($this->user)],
            'phone' => ['required','numeric','min:10',Rule::unique('users')->ignore($this->user)],
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'مطلوب ادخال الاسم الثلاثى',
            'email.required' => 'مطلوب ادخال البريد الالكترونى',
            'name.min' => 'مطلوب ادخال اسم المستخدم كاملا',
            'email.email' => 'مطلوب ادخال بريد الكترونى صحيح',
            'email.unique' => 'تم التسجيل بهذا البريد الالكترونى مسبقا, قم بأدخال بريد الكترونى اخر',
            'phone.required' => 'مطلوب ادخال رقم الهاتف',
            'phone.min' => ' مطلوب ادخال رقم هاتف لا يقل عن 10 ارقام',
            'phone.numeric' => ' مطلوب ادخال رقم هاتف مكون من ارقام فقط',
            'phone.unique' => 'تم التسجيل بهذا الرقم مسبقا, قم بأدخال رقم اخر',
            'image.image' => 'تاكد من انك قمت بادخال مسار صوره صحيح',

        ];
    }
}
