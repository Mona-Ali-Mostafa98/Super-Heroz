<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|min:10|max:255',
            'email' => ['required' ,'email','max:255' , Rule::unique('users')->ignore($this->user)],
            'phone' => ['required','string', 'min:9' ,'max:14',
                        'regex:/^(009665|9665|\+9665|05|5)([013456789])([0-9]{7})$/' ,
                        Rule::unique('users')->ignore($this->user)],    //(009665|9665|\+9665|05|5)  ((5|0|3|6|4|9|1|8|7)مفتاح الشركه) (خانات)
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => ['required', Password::min(8) ,'max:20'],           //Password::min(8)    Hash::make($data['password']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'مطلوب ادخال الاسم الثلاثى',
            'name.string' => 'مطلوب ادخال الاسم مكون من حروف فقط',
            'name.min' => 'مطلوب ادخال اسم المستخدم كاملا',
            'name.max' => 'مطلوب ادخال اسم المستخدم لايزيد عدد حروفه عن 255 حرفا',

            'email.required' => 'مطلوب ادخال البريد الالكترونى',
            'email.email' => 'مطلوب ادخال بريد الكترونى صحيح',
            'email.max' => 'مطلوب ادخال بريد الكترونى لا يزيد عدد حروفه عن 255 حرفا',
            'email.unique' => 'تم التسجيل بهذا البريد الالكترونى مسبقا, قم بأدخال بريد الكترونى اخر',

            'phone.required' => 'مطلوب ادخال رقم الهاتف',
            'phone.string' => '(+) مطلوب ادخال رقم هاتف مكون من ارقام فقط ومسموح بادخال',
            'phone.min' => ' مطلوب ادخال رقم هاتف لا يقل عن 9 ارقام',
            'phone.max' => ' مطلوب ادخال رقم هاتف لا يزيد عن 14 ارقام',
            'phone.regex' => ' هناك خطا فى رقم الهاتف , يرجى ادخال رقم هاتف صحيح',
            'phone.unique' => 'تم التسجيل بهذا الرقم مسبقا, قم بأدخال رقم اخر',

            'image.image' => 'تاكد من انك قمت بادخال مسار صوره صحيح',
            'image.mimes' => 'فقط jpeg,png,jpg,gif,svg مطلوب رفع صوره من نوع',
            'image.max' => 'مطلوب رفع صوره لايزيد حجمها عن 2048 حرفا',

            'password.required' => 'مطلوب ادخال كلمة المرور',
            'password.min' => 'مطلوب ادخال كلمة مرور لا تقل عن 8 احرف',
            'password.max' => ' مطلوب ادخال كلمة مرور لا يزيد عن 20 ارقام',

        ];
    }
}