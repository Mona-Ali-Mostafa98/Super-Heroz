<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $all_about_us = AboutUs::where('status' ,'عرض')->latest()->take(10)->get();
        return view('website.about_us', compact('all_about_us'));
    }
}