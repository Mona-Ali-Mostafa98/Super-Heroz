<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use  App\Traits\UploadImageTrait ;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $settings = Setting:: first()->get() ;
        return view('admin.settings.index', compact('settings'));
    }

    public function show(Setting $setting)
    {
        return view('admin.settings.show', compact('setting'));
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update (UpdateSettingRequest $request , Setting $setting)
    {
        $old_image = $setting->image;
        $old_logo = $setting->logo;
        $data = $request->except('image','logo' , '_token');

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
