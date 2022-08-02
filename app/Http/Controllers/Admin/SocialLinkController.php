<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        return view('admin.socialLinks.index', [
            'links' => SocialLink:: all()
        ]);
    }

    public function show($id)
    {
        return view('admin.socialLinks.show',[
            'link'=> SocialLink::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        return view('admin.socialLinks.edit',[
            'link'=> SocialLink::findOrFail($id)
        ]);
    }

    public function update ( Request $request, $id)
    {
        $link=SocialLink::findOrFail($id);

        $request->validate([
            'website_name' => 'required|string|max:255',
            'website_icon' => 'nullable|string',
            'website_url' => 'required|string',
            'status' =>'required'
        ]);

        $data = $request->all();
        $link->update($data);

        return redirect()->route('admin.social_links.index')
            ->with('success',"تم التعديل على روابط التواصل الاجتماعى");

    }

    public function destroy($id)
    {
        $link = SocialLink::findOrFail($id);
        $link -> delete();
        return redirect()->route('admin.social_links.index')
            ->with('success' , "تم حذف رابط من روابط التواصل الاجتماعى");
    }
}
