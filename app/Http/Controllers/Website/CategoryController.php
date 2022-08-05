<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('status' ,'عرض')->orderBy('id','desc')->get();
        return view('website.categories', compact('categories'));
    }

    public function show(Category $category){
        return view('website.category',compact('category'));
    }
    
}