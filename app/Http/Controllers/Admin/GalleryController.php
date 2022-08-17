<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

    use UploadImageTrait;

    public function index()
    {
        $galleries = Gallery:: simplePaginate() ;
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        $gallery = new Gallery() ;
        return view('admin.galleries.create' , compact('gallery'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'galleries');

        $gallery = Gallery::create($data);
        return redirect()->route('admin.galleries.index')
            ->with('success' , "تمت الاضافه بنجاح");

    }

    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show',compact('gallery'));
    }

    public function destroy(Gallery $gallery)
    {
        $gallery -> delete();
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        return redirect()->route('admin.galleries.index')
            ->with('success' , "تم الحذف بنجاح");
    }
}