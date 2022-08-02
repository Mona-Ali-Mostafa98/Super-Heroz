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
        return view('admin.about_us.index', [
            'all_about_us' => AboutUs:: all()
        ]);
    }

    public function create()
    {
        return view('admin.about_us.create' ,[
            'about_us'=>  new AboutUs() ,
        ]);
    }

    public function store(AboutUsRequest $request)
    {
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'about_us');

        $about_us = AboutUs::create($data);

        return redirect()->route('admin.about_us.index')
            ->with('success' , "تم الاضافه بنجاح");

    }

    public function show($id)
    {
        return view('admin.about_us.show',[
            'about_us'=>AboutUs::findOrFail($id)
        ]);
    }
    public function edit($id)
    {
        return view('admin.about_us.edit', [
            'about_us' => AboutUs::find($id)
        ]);
    }

    public function update(AboutUsRequest $request, $id)
    {
        $about_us = AboutUs::findOrFail($id);
        $old_image = $about_us->image;
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'about_us');

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        $about_us->update($data);

        return redirect()->route('admin.about_us.index')
            ->with('success',"تم التعديل بنجاح");
    }

    public function destroy($id)
    {
        $about_us = AboutUs::find($id);
        $about_us -> delete();
        if ($about_us->image) {
            Storage::disk('public')->delete($about_us->image);
        }
        return redirect()->route('admin.about_us.index')
            ->with('success' , "تم الحذف بنجاح");
    }}
