<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::all();
        return view('admin.policies.index', compact('policies'));
    }

    public function create()
    {
        $policy = new Policy();
        return view('admin.policies.create' , compact('policy'));
    }

    public function store(Request $request)
    {
        $data = $request -> validate([
            'title'=> 'required|min:10|max:225',
            'description'=> 'required | string',
            'status'=> 'required',
        ],[
            'title.required' => ' مطلوب ادخال العنوان',
            'title.min' => 'مطلوب ادخال العنوان لايقل عن 10 احرف',
            'title.max' => 'مطلوب ادخال العنوان لا يزيد عن 225',
            'description.required' => 'مطلوب ادخال الوصف',
            'status.required' => 'مطلوب ادخال حالة العرض',
        ]);

        Policy::create($data);
        return redirect()->route('admin.policies.index')
            ->with('success' , "تمت الاضافه بنجاح");

    }

    public function show(Policy $policy)
    {
        return view('admin.policies.show', compact('policy'));
    }

    public function edit(Policy $policy)
    {
        return view('admin.policies.edit', compact('policy'));
    }

    public function update(Request $request , Policy $policy)
    {
        $request->validate([
            'title'=> 'required|min:10|max:225',
            'description'=> 'required | string',
            'status'=> 'required',
        ],[
            'title.required' => ' مطلوب ادخال العنوان',
            'title.min' => 'مطلوب ادخال العنوان لايقل عن 10 احرف',
            'title.max' => 'مطلوب ادخال العنوان لا يزيد عن 225',
            'description.required' => 'مطلوب ادخال الوصف',
            'status.required' => 'مطلوب ادخال حالة العرض',
        ]);
        $data = $request->all();

        $policy->update($data);

        return redirect()->route('admin.policies.index')
            ->with('success',"تم التعديل بنجاح");
    }

    public function destroy( Policy $policy)
    {
        $policy -> delete();
        return redirect()->route('admin.policies.index')
          ->with('success' , "تم الحذف بنجاح");
    }
}