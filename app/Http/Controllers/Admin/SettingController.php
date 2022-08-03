<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use  App\Traits\UploadImageTrait ;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        return view('admin.settings.index', [
            'settings' => Setting:: first()->get()
        ]);
    }

    public function show($id)
    {
        return view('admin.settings.show',[
            'setting'=> Setting::findOrFail($id),
        ]);
    }

    public function edit($id)
    {
        return view('admin.settings.edit', [
            'setting' => Setting::findOrFail($id),
        ]);
    }

    public function update ( SettingRequest $request , $id)
    {
        $setting = Setting::findOrFail($id);
        $old_image = $setting->image;
        $old_logo = $setting->logo;
        $data = $request->except('image','logo');

        $data['logo'] = $this->uploadImage($request, 'logo', 'settings');
        $data['image'] = $this->uploadImage($request, 'image', 'settings');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }
        if(!$request->hasFile('logo')){
            unset($data['logo']);
        }

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }
        if ($old_logo && isset($data['logo'])) {
            Storage::disk('public')->delete($old_logo);
        }

        $setting->update($data);

        return redirect()->route('admin.settings.index')
            ->with('success' , "تم التعديل بنجاح");
    }

}
