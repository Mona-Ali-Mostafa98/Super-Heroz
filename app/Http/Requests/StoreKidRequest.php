<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class StoreKidRequest extends FormRequest
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
            'user_id' => ['required','exists:users,id'], //"parent:$id"
            'kid_name' => ['required','string', 'min:10' ,'max:255'],  //, 'unique:kids,kid_name,except,user_id' , new Enum(ServerStatus::class)
            'gender' => ['required', Rule::in(['ذكر', 'أنثى'])] ,  //in:نعم,لا
            'birth_date' => ['required' , 'date' , 'before:today', 'date_format:Y-m-d' ],
            'relative_relation' =>  ['required' , 'string' , 'max:255'],
            'home_address' =>  ['required' , 'string' , 'max:255'],
            'is_child_registered_school' => ['required', Rule::in(['نعم', 'لا'])] ,  //in:نعم,لا
            'educational_level' => ['required' , 'string' , 'max:255'],

            'emergency_first_name' => ['required' , 'string' , 'max:255'],
            'emergency_first_phone' => ['required','string', 'min:9' ,'max:14',
                                        'regex:/^(009665|9665|\+9665|05|5)([013456789])([0-9]{7})$/' ],
            'emergency_first_relation' => ['required' , 'string' , 'max:255'],

            'emergency_second_name' => ['required' , 'string' , 'max:255'],
            'emergency_second_phone' => ['required','string', 'min:9' ,'max:14',
                                        'regex:/^(009665|9665|\+9665|05|5)([013456789])([0-9]{7})$/' ],
            'emergency_second_relation' => ['required' , 'string' , 'max:255'],

            'kid_suffer_food_allergies' => ['required', Rule::in(['نعم', 'لا'])] ,
            'if_yes_suffer_food_allergens' => ['nullable' , 'string'],
            'kid_suffer_other_type_of_allergy' => ['required', Rule::in(['نعم', 'لا'])] ,
            'if_yes_state_the_type_of_allergy' => ['nullable' , 'string'],
            'use_injection_of_epinephrine' => ['required', Rule::in(['نعم', 'لا'])] ,
            'medical_report_image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'kid_with_special_needs' => ['required', Rule::in(['نعم', 'لا'])] ,
            'if_yes_special_needs' => ['nullable' , 'string'],
            'another_health_symptoms' => ['nullable' , 'string'],

            'recent_kid_photo' => ['required','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'family_card_image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'birth_record_image' => ['required','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'vaccination_card_image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'other_documents' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],

            'terms' => 'accepted',
            // 'images_terms'  => 'accepted',

            // 'kid_id' => ['nullable','exists:kids,id'],
            'addmore' => ['array','required'],
            'addmore.*.person_name' => ['required','string','max:255'],
            'addmore.*.person_phone' => ['required' , 'string' ,'min:9' ,'max:14',
                                        'regex:/^(009665|9665|\+9665|05|5)([013456789])([0-9]{7})$/' ],
            'addmore.*.relation_to_kid' =>  ['required' , 'string' , 'max:255'],

        ];
    }

        public function messages()
    {
        return [
            'user_id.required' => 'هذا الحقل مطلوب',
            'user_id.exists' => 'هناك خطا ما يرجى التاكد من البيانات المستخدم المدخله',


            'kid_name.required' => 'يجب ادخال أسم الطفل ثلاثى',
            'kid_name.string' => 'يجب ان يتم أدخال حروف فقط فى هذا الحقل',
            'kid_name.min' => 'يجب ادخال اسم الطفل كاملا ',
            'kid_name.max' => 'يجب  أدخال اسم الطفل لا يزيد عدد حروفه عن 255 حرفا',

            'gender.required' => 'يجب اختيار نوع الطفل',
            'gender.in' => 'يجب ان يكون نوع الطفل ذكر او انثى فقط',


            'birth_date.required' => 'يجب أدخال تاريخ الميلاد',
            'birth_date.date' => 'يجب ان يكون تاريخ الميلاد بصيغة التاريخ',
            'birth_date.before' => 'يجب أدخال تاريخ الميلاد قبل تاريخ اليوم',
            'birth_date.date_format' => 'يجب أدخال تاريخ الميلاد بصيغه سنه-شهر-يوم',


            'relative_relation.required' => 'يجب تحديد صله القرابة للطفل',
            'relative_relation.string' => 'يجب ان يتم أدخال حروف فقط فى هذا الحقل',
            'relative_relation.max' => 'يجب  أدخال صله القرابة لا يزيد عدد حروفه عن 255 حرفا',


            'home_address.required' => 'يجب أدخال عنوان الطفل',
            'home_address.string' => 'يجب ان يتم أدخال حروف فقط فى هذا الحقل',
            'home_address.max' => 'يجب  أدخال عنوان الطفل لا يزيد عدد حروفه عن 255 حرفا',


            'is_child_registered_school.required' => 'يجب اختيار ما اذا كان الطفل مسجل فى مدرسة ام لا',
            'is_child_registered_school.in' => 'يجب اختيار نعم ام لا',


            'educational_level.required' => 'يجب تحديد المرحلة الدراسية',
            'educational_level.string' => 'يجب ان يتم أدخال حروف فقط فى هذا الحقل',
            'educational_level.max' => 'يجب  أدخال المرحلة الدراسية لا يزيد عدد حروفه عن 255 حرفا',


            'emergency_first_name.required' => 'يجب ادخال اسم الشخص الاول المسئول عن الطفل فى حالتى الطوارئ',
            'emergency_first_name.string' => 'يجب ان يتم أدخال حروف فقط فى هذا الحقل',
            'emergency_first_name.max' => 'يجب  أدخال اسم الشخص الاول لا يزيد عدد حروفه عن 255 حرفا',


            'emergency_first_phone.required' => 'يجب ادخال رقم جوال الشخص الاول ',
            'emergency_first_phone.min' => 'يجب ادخال رقم جوال لا يقل عن 9 ارقام ',
            'emergency_first_phone.max' => 'يجب  أدخال رقم جوال لا يزيد عن 14 رقم',
            'emergency_first_phone.regex' => 'يجب  أدخال رقم جوال او رقم تليفون ارضى صحيح',


            'emergency_first_relation.required' => 'يجب ادخال صلة القرابه بالشخص الاول ',
            'emergency_first_relation.string' => 'يجب ان يتم أدخال حروف فقط فى هذا الحقل',
            'emergency_first_relation.max' => 'يجب  أدخال صلة القرابه لا يزيد عدد حروفه عن 255 حرفا',


            'emergency_second_name.required' => 'يجب ادخال اسم الشخص الثانى المسئول عن الطفل فى حالتى الطوارئ',
            'emergency_second_name.string' => 'يجب ان يتم أدخال حروف فقط فى هذا الحقل',
            'emergency_second_name.max' => 'يجب  أدخال اسم الشخص الاول لا يزيد عدد حروفه عن 255 حرفا',


            'emergency_second_phone.required' => 'يجب ادخال رقم جوال الشخص الثانى ',
            'emergency_second_phone.min' => 'يجب ادخال رقم جوال لا يقل عن 9 ارقام ',
            'emergency_second_phone.max' => 'يجب  أدخال رقم جوال لا يزيد عن 14 رقم',
            'emergency_second_phone.regex' => 'يجب  أدخال رقم جوال او رقم تليفون ارضى صحيح',


            'emergency_second_relation.required' => 'يجب ادخال صلة القرابه بالشخص الثانى ',
            'emergency_second_relation.string' => 'يجب ان يتم أدخال حروف فقط فى هذا الحقل',
            'emergency_second_relation.max' => 'يجب  أدخال صلة القرابه لا يزيد عدد حروفه عن 255 حرفا',


            'kid_suffer_food_allergies.required' => 'هذا الحقل مطلوب',
            'kid_suffer_food_allergies.in' => 'يرجى اختيار نعم ام لا فقط',


            'kid_suffer_other_type_of_allergy.required' => 'هذا الحقل مطلوب',
            'kid_suffer_other_type_of_allergy.in' => 'يرجى اختيار نعم ام لا فقط',



            'use_injection_of_epinephrine.required' => 'هذا الحقل مطلوب',
            'use_injection_of_epinephrine.in' => 'يرجى اختيار نعم ام لا فقط',


            'kid_with_special_needs.required' => 'هذا الحقل مطلوب',
            'kid_with_special_needs.in' => 'يرجى اختيار نعم ام لا فقط',

            'recent_kid_photo.required' => 'يجب رفع صوره حديثه للطفل',
            'recent_kid_photo.image' => 'تاكد من انك قمت بادخال مسار صوره صحيح',
            'recent_kid_photo.mimes' => 'فقط jpeg,png,jpg,gif,svg مطلوب رفع صوره من نوع',

            'birth_record_image.required' => 'يجب رفع صوره حديثه للطفل',
            'birth_record_image.image' => 'تاكد من انك قمت بادخال مسار صوره صحيح',
            'birth_record_image.mimes' => 'فقط jpeg,png,jpg,gif,svg مطلوب رفع صوره من نوع',

            'terms.accepted' => 'لابد من الموافقه على  الشروط والاحكام ',

            // 'images_terms.accepted' => 'لابد من الموافقه على مشاركة الصور',
            'addmore.*.person_name.required' =>'يجب ادخال اسم الشخص',
            'addmore.*.person_name.string' => 'يجب ان يتم أدخال حروف فقط فى هذا الحقل',
            'addmore.*.person_name.min' => 'يجب ادخال اسم الشخص كاملا ',
            'addmore.*.person_name.max' => 'يجب  أدخال اسم الشخص لا يزيد عدد حروفه عن 255 حرفا',

            'addmore.*.person_phone.required' => 'يجب ادخال رقم جوال الشخص  ',
            'addmore.*.person_phone.max' => 'يجب  أدخال رقم جوال لا يزيد عن 14 رقم',
            'addmore.*.person_phone.regex' => 'يجب  أدخال رقم جوال او رقم تليفون ارضى صحيح',


            'addmore.*.relation_to_kid.required' =>'يجب ادخال صلة القرابه بالشخص',
            'addmore.*.relation_to_kid.string' => 'يجب ان يتم أدخال حروف فقط فى هذا الحقل',
            'addmore.*.relation_to_kid.max' => 'يجب  أدخال صلة القرابه لا يزيد عدد حروفه عن 255 حرفا',


        ];
    }
}
