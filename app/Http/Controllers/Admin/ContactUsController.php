<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = ContactUs:: all() ;
        return view('admin.contact-us.index', compact('contacts'));
    }
    public function show(ContactUs $contact )
    {
        return view('admin.contact-us.show', compact('contact'));
    }

    public function destroy(ContactUs $contact)
    {
        $contact -> delete();
        return redirect()->route('admin.contact.index')
            ->with('success' , "Massage from '$contact->full_name' Deleted Successfully");
    }
}