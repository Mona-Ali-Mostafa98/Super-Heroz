<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

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
            'emergency_first_phone' => ['required' , 'string' ,'min:11' , 'max:11'], //'min:10' ,regex:/^([0-9\s\-\+\(\)]*)$/
            'emergency_first_relation' => ['required' , 'string' , 'max:255'],

            'emergency_second_name' => ['required' , 'string' , 'max:255'],
            'emergency_second_phone' => ['required' , 'string' ,'min:11' , 'max:11'], //'min:10' ,
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

            'recent_kid_photo' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'family_card_image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'birth_record_image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'vaccination_card_image' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'other_documents' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg|max:2048'],

            'terms' => 'accepted',
            'images_terms'  => 'accepted',

            // 'kid_id' => ['nullable','exists:kids,id'],
            // 'addmore' => ['array','required'],
            // 'addmore.*.person_name' => ['nullable','string', 'min:10' ,'max:255'],
            // 'addmore.*.person_phone' => ['nullable' , 'string' ,'min:11' , 'max:11'],
            // 'addmore.*.relation_to_kid' =>  ['nullable' , 'string' , 'max:255'],

        ];
    }
}