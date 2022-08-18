<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Kid;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use UploadImageTrait;
    // public function __construct() {
    //     $this->middleware(['auth']);
    // }

    public function index()
    {
        $users = User:: simplePaginate();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('admin.users.create' , compact('user'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'users');

        User::create($data);

        return redirect()->route('admin.users.index')
            ->with('success' , "تم الاضافه بنجاح");
    }

    public function show(User $user)
    {
        $kids = Kid::where('user_id', $user->id)->get();

        return view('admin.users.show', compact('user' , 'kids'));
    }

    public function info_about_kid(Kid $kid)
    {
        $user = $kid->user;

        return view('admin.users.show_kid' , compact('kid' , 'user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request,User $user)
    {
        $old_image = $user->image;
        $data = $request->except('image' , '_token');

        $data['image'] = $this->uploadImage($request, 'image', 'users');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        $user->update($data);

        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('admin.users.index')
            ->with('success',"تم التعديل بنجاح");
    }

    public function destroy(User $user)
    {
        $user -> delete();
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }
        return redirect()->route('admin.users.index')
            ->with('success' , "تم الحذف بنجاح");
    }

}