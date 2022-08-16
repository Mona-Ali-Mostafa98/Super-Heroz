<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
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
            'email' => ['required','string','email','max:255' , Rule::unique('admins')->ignore($this->admin)],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => ['nullable', Rule::in(['مدير الموقع' , 'أدمن' , 'سوبر أدمن' ])] ,  //in:نعم,لا
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
            'i+mage.image' => 'تاكد من انك قمت بادخال مسار صوره صحيح',

        ];
    }
}