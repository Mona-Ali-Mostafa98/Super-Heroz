<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function create()
    {
        return view('website.contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string', 'min:5' ,'max:255'],
            'email' => ['required','string' , 'email'],
            'message' => ['required' , 'string' , 'min:10'],
        ],[
        'name.required' => 'مطلوب ادخال اسم المرسل',
        'email.required' => 'مطلوب ادخال البريد الالكترونى',
        'name.min' => 'مطلوب ادخال اسم المستخد كاملا',
        'email.email' => 'مطلوب ادخال بريد الكترونى صحيح',
        'message.required' => 'مطلوب ادخال نص الرساله',
        'message.min' => ' مطلوب ادخال نص الرساله لا يقل عن 10 احرف',
        ]);

        ContactUs::create($data);

        return redirect()->route('website.index')
            ->with('success' , "تم أرسال رسالتك بنجاح ! شكرا لتواصلك  معنا");
    }
}