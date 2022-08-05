<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use UploadImageTrait;

    public function create()
    {
        return view('website.auth.register');
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $user = User::create($data);
        auth()->login($user); //to regester and make login
        return redirect()->route('website.profile')
            ->with('success' , "تم انشاء الحساب بنجاح");
    }

    public function profile()
    {
        $user=User::where('id',Auth::user()->id)->first();
        return view('website.auth.profile', compact('user'));
    }

    // public function edit(User $user)
    // {
    //     return view('website.auth.profile', compact('user'));
    // }

    public function update_profile(Request $request , User $user)
    {
        // $user = User::where('id',Auth::user()->id)->first();

        $old_image = $user->image;
        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request, 'image', 'users');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        $user->update($data);

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('website.profile')
            ->with('success',"تم التعديل بنجاح");
    }

    public function login(){
        return view('website.auth.login');
    }

    public function dologin(Request $request)
    {
        $data = $request -> validate([
            'email'=> 'required | email',
            'password'=> 'required | string',
        ]);

        if(!auth()->guard('web')-> attempt(['email'=> $data['email'],'password'=> $data['password']]))
        {
            return back();
        }
        else
        {
            return redirect()->route('website.index')
                ->with('success',"تم تسجيل الدخول بنجاح");

        }
    }

    public function logout()
        {
            auth()->guard('web')-> logout() ;
            return redirect()->route('website.index');

        }



// eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
// public function change_password()
//     {
//         return view('style.change-password');
//     }

//     public function update_password(Request $request)
//     {
//         $data = User::where('id',Auth::user()->id)->first();
//         if(Hash::check($request->password ,$data->password))
//         {
//         	$this->validate($request, [
//     			'new_password' => 'required|required_with:confirm_password|same:confirm_password|min:6',
// 			], [
// 				'new_password.required' =>'required',
// 				'new_password.min' =>'min',
// 				'new_password.required_with' =>'required_with',
// 				'new_password.same' =>'same',
// 			]);
//              $data->update([
//           'password' => bcrypt($request->new_password),
//         ]);

//           return Redirect()->back()->withFlashMessage(trans('main.edit-done'));
//           auth()->logout();
//         }
//         else
//         {
//          return Redirect()->back()->withErrorFlashMessage(trans('main.error'));

//         }

//     }

public function add_kid_view()
{
    echo('sssssss');
}







}