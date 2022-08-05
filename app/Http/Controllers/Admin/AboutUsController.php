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
        $all_about = AboutUs:: all() ;
        return view('admin.about.index', compact('all_about'));
    }

    public function create()
    {
        $about = new AboutUs() ;
        return view('admin.about.create' , compact('about'));
    }

    public function store(AboutUsRequest $request)
    {
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'about');

        $about = AboutUs::create($data);

        return redirect()->route('admin.about.index')
            ->with('success' , "تم الاضافه بنجاح");

    }

    public function show(AboutUs $about)
    {
        return view('admin.about.show',compact('about'));
    }

    public function edit(AboutUs $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(AboutUsRequest $request , AboutUs $about)
    {
        $old_image = $about->image;
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'about');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        $about->update($data);

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('admin.about.index')
            ->with('success',"تم التعديل بنجاح");
    }

    public function destroy(AboutUs $about)
    {
        $about -> delete();
        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }
        return redirect()->route('admin.about.index')
            ->with('success' , "تم الحذف بنجاح");
    }
}