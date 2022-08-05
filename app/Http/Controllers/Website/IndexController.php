<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CenterClass;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status' ,'عرض')->latest()->take(5)->get();
        $index_services = Service::where('status' ,'عرض')->latest()->limit(3)->get();
        $categories = Category::where('status' ,'عرض')->latest()->take(4)->get();
        $galleries = Gallery::latest()->take(10)->get();
        $center_classes = CenterClass::where('status' ,'عرض')->latest()->take(4)->get();
        return view('website.index', compact('sliders' , 'index_services' ,'categories' , 'galleries' , 'center_classes'));
    }
}