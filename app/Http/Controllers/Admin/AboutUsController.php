<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUs;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $all_about_us = AboutUs:: all() ;
        return view('admin.about_us.index', compact('all_about_us'));
    }

    public function create()
    {
        $about_us = new AboutUs() ;
        return view('admin.about_us.create' , compact('about_us'));
    }

    public function store(AboutUsRequest $request)
    {
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'about_us');

        $about_us = AboutUs::create($data);

        return redirect()->route('admin.about_us.index')
            ->with('success' , "تم الاضافه بنجاح");

    }

    public function show(AboutUs $about_us)
    {
        return view('admin.about_us.show',compact('about_us'));
    }

    public function edit(AboutUs $about_us)
    {
        return view('admin.about_us.edit', compact('about_us'));
    }

    public function update(AboutUsRequest $request , AboutUs $about_us)
    {
        $old_image = $about_us->image;
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'about_us');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        $about_us->update($data);

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('admin.about_us.index')
            ->with('success',"تم التعديل بنجاح");
    }

    public function destroy(AboutUs $about_us)
    {
        $about_us -> delete();
        if ($about_us->image) {
            Storage::disk('public')->delete($about_us->image);
        }
        return redirect()->route('admin.about_us.index')
            ->with('success' , "تم الحذف بنجاح");
    }
}
