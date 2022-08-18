<?php

namespace App\Http\Requests;

use App\Models\Admin;
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
            'name' => 'required|string|min:10|max:255',
            'email' => ['required' ,'email','max:255' , Rule::unique('admins')->ignore($this->admin)],
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => ['nullable', Rule::in(['مدير الموقع' , 'أدمن' , 'سوبر أدمن' ])] ,  //in:نعم,لا
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'مطلوب ادخال الاسم الثلاثى',
            'name.string' => 'مطلوب ادخال الاسم مكون من حروف فقط',
            'name.min' => 'مطلوب ادخال اسم المستخدم كاملا',
            'name.max' => 'مطلوب ادخال اسم المستخدم لا يزيد عدد حروفه عن 255 حرفا',

            'email.required' => 'مطلوب ادخال البريد الالكترونى',
            'email.email' => 'مطلوب ادخال بريد الكترونى صحيح',
            'email.max' => 'مطلوب ادخال بريد الكترونى لا يزيد عدد حروفه عن 255 حرفا',
            'email.unique' => 'تم التسجيل بهذا البريد الالكترونى مسبقا, قم بأدخال بريد الكترونى اخر',

            'image.sometimes' => 'مطلوب رفع صوره فى حاله عدم رفعها من قبل ',
            'image.image' => 'تاكد من انك قمت بادخال مسار صوره صحيح',
            'image.max' => 'مطلوب رفع صوره لايزيد حجمها عن 2048 حرفا',
            'image.mimes' => 'فقط jpeg,png,jpg,gif,svg مطلوب رفع صوره من نوع',

            'type.in' => 'هناك خطأ فى نوع المشرف يرجى ادخال نوع مشرف صحيح',

        ];
    }
}