<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $links = SocialLink:: all() ;
        return view('admin.socialLinks.index' , compact('links'));
    }

    public function show(SocialLink $social_link)
    {
        return view('admin.socialLinks.show', compact('social_link'));
    }

    public function edit(SocialLink $social_link)
    {
        return view('admin.socialLinks.edit', compact('social_link'));
    }

    public function update ( Request $request, SocialLink $social_link)
    {
        $request->validate([
            'website_name' => 'required|string|max:255',
            'website_icon' => 'nullable|string',
            'website_url' => 'required|url',
            'status' =>'required'
        ]);

        $data = $request->except('_token');
        $social_link->update($data);

        return redirect()->route('admin.social_links.index')
            ->with('success',"تم التعديل على روابط التواصل الاجتماعى");

    }

    public function destroy(SocialLink $social_link)
    {
        $social_link -> delete();
        return redirect()->route('admin.social_links.index')
            ->with('success' , "تم حذف رابط من روابط التواصل الاجتماعى");
    }
}