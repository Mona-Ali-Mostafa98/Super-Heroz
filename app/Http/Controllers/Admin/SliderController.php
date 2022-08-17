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
        $sliders = Slider:: all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        $slider = new Slider() ;
        return view('admin.sliders.create' , compact('slider'));
    }

    public function store(SliderRequest $request)
    {
        $data = $request->except('image' , '_token');
        $data['image'] = $this->uploadImage($request, 'image', 'sliders');

        $slider = Slider::create($data);
        return redirect()->route('admin.sliders.index')
            ->with('success' , "تمت الاضافه بنجاح");

    }

    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider') );
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(SliderRequest $request,Slider $slider)
    {
        $old_image = $slider->image;
        $data = $request->except('image' , '_token');

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

    public function destroy(Slider $slider)
    {
        $slider -> delete();
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }
        return redirect()->route('admin.sliders.index')
            ->with('success' , "تم الحذف بنجاح");
    }
}
