<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\ContactUs;
use App\Models\Kid;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    use UploadImageTrait;

    public function dashboard(){
        $users_count = User:: count();
        $admins_count = Admin:: count();
        $kids_count = Kid:: count();
        $contacts_count = ContactUs:: count();
        $admins = Admin::latest()->take(6)->get();

        return view('admin.dashboard' , compact('users_count' , 'admins_count' , 'kids_count' , 'contacts_count' , 'admins'));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function dologin(Request $request)
    {
        $data = $request -> validate([
            'email'=> 'required|email|exists:admins,email',
            'password'=> 'required | string',
        ],[
            'email.required' => ' مطلوب ادخال البريد الالكترونى',
            'email.email' => 'مطلوب ادخال بريد الكترونى صحيح',
            'email.exists' => 'هناك خطأ فى البريد الالكترونى',
            'password.required' => 'مطلوب ادخال كلمة المرور',
        ]);
        // dd(!auth()->guard('admin')-> attempt(['email'=> $data['email'],'password'=> $data['password']]));
        if(!auth()->guard('admin')-> attempt(['email'=> $data['email'],'password'=> $data['password']]))
        {
            return back();
        }
        else
        {
            return redirect()->route('admin.settings.index')->with('success' , 'تم تسجيل الدخول بنجاح');

        }
    }

    public function logout()
    {
        auth()->guard('admin')-> logout() ;
        return redirect(route('admin.login'));

    }

    public function index()
    {

        $admins =Admin:: all();
        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        $admin = new Admin();
        return view('admin.admins.create' , compact('admin'));
    }

    public function store(StoreAdminRequest $request)
    {
        $data = $request->except('image' , '_token');
        $data['image'] = $this->uploadImage($request, 'image', 'admins');

        Admin::create($data);

        return redirect()->route('admin.admins.index')
            ->with('success' , "تمت الاضافة بنجاح");
    }

    public function show(Admin $admin)
    {
        return view('admin.admins.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request , Admin $admin)
    {

        $old_image = $admin->image;
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'admins');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        $admin->update($data);

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('admin.admins.index')
            ->with('success',"تم التعديل بنجاح");

    }

    public function destroy(Admin $admin)
    {
        $admin -> delete();
        if ($admin->image) {
            Storage::disk('public')->delete($admin->image);
        }
        return redirect()->route('admin.admins.index')
            ->with('success' , "تم الحذف بنجاح");

    }



}