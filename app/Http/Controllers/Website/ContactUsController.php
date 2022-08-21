<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ContactUs;
use App\Notifications\ContactUsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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

        $contact_us = ContactUs::create($data);

        $sdmins = Admin::all();

        Notification::send($sdmins, new ContactUsNotification($contact_us));
        // $sdmins->notify(new ContactUsNotification($contact_us));
        // dd('Notification send!');

        return redirect()->route('website.index')
            ->with('success' , "تم أرسال رسالتك بنجاح ! شكرا لتواصلك  معنا");
    }
}