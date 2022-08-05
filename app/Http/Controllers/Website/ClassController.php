<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CenterClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = CenterClass::where('status' ,'عرض')->orderBy('id','desc')->get() ;
        return view('website.classes', compact('classes'));
    }
}