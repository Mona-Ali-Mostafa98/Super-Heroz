<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CenterClassRequest;
use App\Models\CenterClass;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CenterClassController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $center_classes = CenterClass:: simplePaginate() ;
        return view('admin.center_classes.index', compact('center_classes'));
    }

    public function create()
    {
        $center_class = new CenterClass() ;
        return view('admin.center_classes.create' , compact('center_class'));
    }

    public function store(CenterClassRequest $request)
    {
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'center_classes');

        $center_classes = CenterClass::create($data);

        return redirect()->route('admin.center_classes.index')
            ->with('success' , "تم الاضافه بنجاح");

    }

    public function show(CenterClass $center_class)
    {
        return view('admin.center_classes.show',compact('center_class'));
    }

    public function edit(CenterClass $center_class)
    {
        return view('admin.center_classes.edit', compact('center_class'));
    }

    public function update(CenterClassRequest $request , CenterClass $center_class)
    {
        $old_image = $center_class->image;
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'center_classes');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        $center_class->update($data);

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('admin.center_classes.index')
            ->with('success',"تم التعديل بنجاح");
    }

    public function destroy(CenterClass $center_class)
    {
        $center_class -> delete();
        if ($center_class->image) {
            Storage::disk('public')->delete($center_class->image);
        }
        return redirect()->route('admin.center_classes.index')
            ->with('success' , "تم الحذف بنجاح");
    }
}
