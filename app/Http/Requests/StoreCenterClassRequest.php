<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCenterClassRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'teacher_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=>['required' ,  Rule::in(['عرض', 'أخفاء'])]
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'مطلوب ادخال العنوان ',
            'title.string' => 'مطلوب ادخال العنوان مكون من حروف فقط',
            'title.max' => 'مطلوب ادخال العنوان لايزيد عدد حروفه عن عن 255 حرفا',

            'age.required' => 'مطلوب ادخال العمر ',
            'age.string' => 'مطلوب ادخال االعمر مكون من حروف فقط',
            'age.max' => 'مطلوب ادخال العمر لايزيد عدد حروفه عن 255 حرفا',

            'teacher_name.required' => 'مطلوب ادخال أسم المعلم',
            'teacher_name.string' => 'مطلوب ادخال أسم المعلم مكون من حروف فقط',
            'teacher_name.max' => 'مطلوب ادخال أسم المعلم لايزيد عن 255 حرفا',

            'image.required' => 'مطلوب رفع صوره',
            'image.image' => 'تاكد من انك قمت بادخال مسار صوره صحيح',
            'image.mimes' => 'فقط jpeg,png,jpg,gif,svg مطلوب رفع صوره من نوع',
            'image.max' => 'مطلوب رفع صوره لايزيد حجمها عن 2048 حرفا',

            'status.required' => 'مطلوب ادخال حالة العرض',
            'status.in' => 'هناك خطأ فى حالة العرض يرجى ادخال حالة عرض صحيح',
        ];
    }
}
