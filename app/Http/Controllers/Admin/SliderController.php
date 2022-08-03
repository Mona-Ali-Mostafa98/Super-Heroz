<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        return view('admin.sliders.index', [
            'sliders' => Slider:: all()
        ]);
    }

    public function create()
    {
        return view('admin.sliders.create' , [
            'slider'=>  new Slider() ,
        ]);
    }

    public function store(SliderRequest $request)
    {
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'sliders');

        $slider = Slider::create($data);
        return redirect()->route('admin.sliders.index')
            ->with('success' , "تمت الاضافه بنجاح");

    }

    public function show($id)
    {
        return view('admin.sliders.show',[
            'slider'=> Slider::findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        return view('admin.sliders.edit', [
            'slider' => Slider::findOrFail($id),
        ]);
    }

    public function update(SliderRequest $request,$id)
    {
        $slider = Slider::findOrFail($id);
        $old_image = $slider->image;
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'sliders');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')
            ->with('success',"تم التعديل بنجاح");
     }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider -> delete();
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }
        return redirect()->route('admin.sliders.index')
            ->with('success' , "تم الحذف بنجاح");
    }
}
