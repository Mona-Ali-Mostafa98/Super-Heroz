<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $services = Service:: all() ;
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $service =  new Service() ;
        return view('admin.services.create' , compact('service') );
    }

    public function store(ServiceRequest $request)
    {
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'services');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        $service = Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success' , "تم الاضافه بنجاح");

    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service') );
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service') );
    }

    public function update(ServiceRequest $request , Service $service )
    {
        $old_image = $service->image;
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'services');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success',"تم التعديل بنجاح");
    }

    public function destroy(Service $service)
    {
        $service -> delete();
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        return redirect()->route('admin.services.index')
            ->with('success' , "تم الحذف بنجاح");
    }}
