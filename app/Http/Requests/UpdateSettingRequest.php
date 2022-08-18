<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'logo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'region'=>'required|string',
            'street'=>'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'evening_care_times' => 'nullable|string|max:100',
            'day_care_times' => 'nullable|string|max:100',
            'daily_care_times' => 'nullable|string|max:100',

        ];
    }

    public function messages()
    {
        return [
            'logo.sometimes' => 'مطلوب رفع صوره لوجو الموقع فى حاله عدم رفعها من قبل ',
            'logo.image' => 'تاكد من انك قمت بادخال مسار صوره لوجو الموقع بشكل صحيح',
            'logo.max' => 'مطلوب رفع صوره لوجو لايزيد حجمها عن 2048 حرفا',
            'logo.mimes' => 'فقط jpeg,png,jpg,gif,svg مطلوب رفع صوره لوجو من نوع',

            'title.required' => 'مطلوب ادخال العنوان ',
            'title.string' => 'مطلوب ادخال العنوان مكون من حروف فقط',
            'title.max' => 'مطلوب ادخال العنوان لايزيد عدد حروفه عن 255 حرفا',

            'description.required' => 'مطلوب ادخال الوصف',
            'description.string' => 'مطلوب ادخال الوصف مكون من حروف فقط',

            'image.sometimes' => 'مطلوب رفع صوره فى حاله عدم رفعها من قبل ',
            'image.image' => 'تاكد من انك قمت بادخال مسار صوره بشكل صحيح',
            'image.max' => 'مطلوب رفع صوره لايزيد حجمها عن 2048 حرفا',
            'image.mimes' => 'فقط jpeg,png,jpg,gif,svg مطلوب رفع صوره من نوع',


            'region.required' => 'مطلوب ادخال الميزه',
            'region.string' => 'مطلوب ادخال الميزه مكونه من حروف فقط',

            'street.required' => 'مطلوب ادخال العمر',
            'street.string' => 'مطلوب ادخال العمر مكون من حروف فقط',

            'phone.max' => 'مطلوب ادخال العمر لا يزيد عدد حروفه عن 255 حرفا',
            'phone.max' => 'مطلوب ادخال العمر لا يزيد عدد حروفه عن 255 حرفا',

            'status.required' => 'مطلوب ادخال حالة العرض',
            'status.in' => 'هناك خطأ فى حالة العرض يرجى ادخال حالة عرض صحيح',
        ];
    }

}
