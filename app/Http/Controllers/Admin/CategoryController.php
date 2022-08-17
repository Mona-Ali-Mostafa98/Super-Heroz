<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $categories = Category:: all() ;
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category() ;
        return view('admin.categories.create' , compact('category'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'categories');

        $category = Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success' , "تم الاضافه بنجاح");

    }

    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request , Category $category)
    {
        $old_image = $category->image;
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'categories');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        $category->update($data);

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('admin.categories.index')
            ->with('success',"تم التعديل بنجاح");
    }

    public function destroy(Category $category)
    {
        $category -> delete();
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        return redirect()->route('admin.categories.index')
            ->with('success' , "تم الحذف بنجاح");
    }
}
