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
            'email' => ['required' ,'email','max:255' , Rule::unique('users')->ignore($this->user)],
            'phone' => ['required','string', 'min:9' ,'max:14',
                        'regex:/^(009665|9665|\+9665|05|5)([013456789])([0-9]{7})$/' ,
                        Rule::unique('users')->ignore($this->user)],    //(009665|9665|\+9665|05|5)  ((5|0|3|6|4|9|1|8|7)مفتاح الشركه) (خانات)
            'address' => 'nullable|string',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'مطلوب ادخال الاسم الثلاثى',
            'name.string' => 'مطلوب ادخال الاسم مكون من حروف فقط',
            'name.min' => 'مطلوب ادخال اسم المستخدم كاملا',

            'email.required' => 'مطلوب ادخال البريد الالكترونى',
            'email.email' => 'مطلوب ادخال بريد الكترونى صحيح',
            'email.max' => 'مطلوب ادخال بريد الكترونى لا يزيد عدد حروفه عن 255 حرفا ',
            'email.unique' => 'تم التسجيل بهذا البريد الالكترونى مسبقا, قم بأدخال بريد الكترونى اخر',

            'phone.required' => 'مطلوب ادخال رقم الهاتف',
            'phone.string' => '(+) مطلوب ادخال رقم هاتف مكون من ارقام فقط ومسموح بادخال',
            'phone.min' => ' مطلوب ادخال رقم هاتف لا يقل عن 9 ارقام',
            'phone.max' => ' مطلوب ادخال رقم هاتف لا يزيد عن 14 ارقام',
            'phone.regex' => ' هناك خطا فى رقم الهاتف , يرجى ادخال رقم هاتف صحيح',
            'phone.unique' => 'تم التسجيل بهذا الرقم مسبقا, قم بأدخال رقم اخر',

            'address.string' => 'مطلوب ادخال عنوان المستخدم مكون من حروف فقط',

            'image.image' => 'تاكد من انك قمت بادخال مسار صوره صحيح',
            'image.sometimes' => 'مطلوب رفع صوره فى حاله عدم رفعها من قبل ',
            'image.max' => 'مطلوب رفع صوره لايزيد حجمها عن 2048 حرفا',

        ];
    }
}