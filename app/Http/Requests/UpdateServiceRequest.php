<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
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
            'description' => 'required|string',
            'advantage' => 'required|string',
            'age' => 'required|string|max:255',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=>['required' ,  Rule::in(['عرض', 'أخفاء'])]
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'مطلوب ادخال العنوان ',
            'title.string' => 'مطلوب ادخال العنوان مكون من حروف فقط',
            'title.max' => 'مطلوب ادخال العنوان لايزيد عدد حروفه عن 255 حرفا',

            'description.required' => 'مطلوب ادخال الوصف',
            'description.string' => 'مطلوب ادخال الوصف مكون من حروف فقط',

            'advantage.required' => 'مطلوب ادخال الميزه',
            'advantage.string' => 'مطلوب ادخال الميزه مكونه من حروف فقط',

            'age.required' => 'مطلوب ادخال العمر',
            'age.string' => 'مطلوب ادخال العمر مكون من حروف فقط',
            'age.max' => 'مطلوب ادخال العمر لا يزيد عدد حروفه عن 255 حرفا',

            'image.sometimes' => 'مطلوب رفع صوره فى حاله عدم رفعها من قبل ',
            'image.image' => 'تاكد من انك قمت بادخال مسار صوره صحيح',
            'image.max' => 'مطلوب رفع صوره لايزيد حجمها عن 2048 حرفا',
            'image.mimes' => 'فقط jpeg,png,jpg,gif,svg مطلوب رفع صوره من نوع',

            'status.required' => 'مطلوب ادخال حالة العرض',
            'status.in' => 'هناك خطأ فى حالة العرض يرجى ادخال حالة عرض صحيح',
        ];
    }
}
