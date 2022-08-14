<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKidRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Kid;
use App\Models\PersonsTakeKid;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    use UploadImageTrait;

    public function create()
    {
        return view('website.auth.register');
    }

    public function store(StoreUserRequest $request)
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

    public function update_profile(UpdateUserRequest $request , User $user)
    {
        // $user = User::where('id',Auth::user()->id)->first();
        $old_image = $user->image;

        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request, 'image', 'users');

        if(!$request->hasFile('image')){
            unset($data['image']);
        }

        $user->update($data);
        //  dd($user);
        if ($old_image && isset($data['image'])) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('website.profile')
            ->with('success',"تم تحديث الملف الشخصى بنجاح");
    }

    public function login(){
        return view('website.auth.login');
    }

    public function dologin(Request $request)
    {
        $data = $request -> validate([
            'email'=> 'required|email|exists:users,email',
            'password'=> 'required | string',
        ],[
            'email.required' => ' مطلوب ادخال البريد الالكترونى',
            'email.email' => 'مطلوب ادخال بريد الكترونى صحيح',
            'email.exists' => 'هناك خطأ فى البريد الالكترونى',
            'password.required' => 'مطلوب ادخال كلمة المرور',
        ]);

        if(!auth()->guard('web')-> attempt(['email'=> $data['email'],'password'=> $data['password']]))
        {
            return back()->with('error' , 'تاكد من عنوان البريد الالكترونى وكلمة المرور');
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


    public function showForgotForm()
    {
        return view('website.auth.forget-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ],[
            'email.required' => 'مطلوب ادخال البريد الالكترونى',
            'email.email' => 'مطلوب ادخال بريد الكترونى صحيح',
            'email.exists' => 'هناك خطأ فى البريد الالكترونى',
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        $action_link = route('website.reset.password.form',['token'=>$token,'email'=>$request->email]); //this variable responsible for return view of reset password
        $body = "لقد أرسلنا رابطًا فريدًا لإعادة تعيين كلمة المرور الخاصه بك . لإعادة تعيين كلمة المرور ، انقر فوق الرابط التالي.";

        Mail::send('website.auth.email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
                $message->from('superheroz@example.com' , config('app.name'));
                $message->to($request->email,'Your Email : ')
                        ->subject('أعادة تعين كلمة المرور');
        });

        return back()->with('success', 'لقد تم ارسال رابط لاعادة تعين كلمة المرور على البريد الالكترونى الخاص بك!');
    }

    public function showResetForm(Request $request, $token = null){
        return view('website.auth.change-password')->with(['token'=>$token,'email'=>$request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            // 'email'=>'required|email|exists:users,email',
            'password'=>'required|min:8|confirmed',
            'password_confirmation'=>'required|same:password',
        ],[
            'password.required' => ' مطلوب ادخال كلمة المرور',
            'password_confirmation.required' => ' مطلوب اعادة ادخال كلمة المرور',
            'password.min' => 'مطلوب ادخال كلمة المرور لاتقل عن 8 أحرف',
            'password.confirmed' => 'لابد من تاكيد كلمة المرور',
            'password_confirmation.same' => 'أعاده تاكيد كلمة المرور غير متطابقه مع كلمة المرور',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();
        // dd( $check_token);
        if(!$check_token){
            return back()->withInput()->with('error', 'لقد حدث خطا ما أطلب رابط أعادة تعيين كلمة المرور مره اخرى');
        }else{

            User::where('email', $request->email)->update([
                'password'=>Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('website.login')->with('success', 'لقد تم أعادة تعين كلمة المرور الخاصه بك بنجاح ! يمكنك الان تسجيل الدخول  ')->with('verifiedEmail', $request->email);
        }
    }




    public function add_kid_view()
    {
        return view('website\add-kid');
    }

    public function add_kid(StoreKidRequest $request)
    {
        $user = User::where('id',Auth::user()->id)->first();      // dd($user->id);

        DB::beginTransaction();
        try {
            $data = $request->except('addmore' , '_token');
            // dd($data);
            $data['medical_report_image'] = $this->uploadImage($request, 'medical_report_image', 'kid_images');
            $data['recent_kid_photo'] = $this->uploadImage($request, 'recent_kid_photo', 'kid_images');
            $data['family_card_image'] = $this->uploadImage($request, 'family_card_image', 'kid_images');
            $data['birth_record_image'] = $this->uploadImage($request, 'birth_record_image', 'kid_images');
            $data['vaccination_card_image'] = $this->uploadImage($request, 'vaccination_card_image', 'kid_images');
            $data['other_documents'] = $this->uploadImage($request, 'other_documents', 'kid_images');

            $kid = Kid::create($data) ;                              // dd( $kid);// dd($kid->id);
            if($request->addmore){
                foreach($request->addmore as $key => $value){
                    // dd($request->addmore );
                    $person = PersonsTakeKid::where('kid_id', $kid->id)->create([
                        'person_name' => $value['person_name'],
                        'person_phone' => $value['person_phone'],
                        'relation_to_kid' => $value['relation_to_kid'],
                        'user_id' =>  Auth::user()->id ,
                        'kid_id' =>  $kid->id,
                    ]);
                }
            }
            DB::commit();
            // dd($person);
            return redirect()->route('website.index')
                ->with('success',"تم تسجيل الطفل بنجاح");

        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function kids(){
        $user = User::where('id',Auth::user()->id)->first();      // dd($user->id);

        $kids = Kid::where('id',Auth::user()->id)->with('persons_take_kid')->get();
        //dd($kids);

        return  view('website.my-kids', compact('kids' ,'user'));
    }
}