<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKidRequest;
use App\Models\Kid;
use App\Models\KidImage;
use App\Models\KidMessage;
use App\Models\KidReport;
use App\Models\PersonsTakeKid;
use App\Models\User;
use App\Notifications\AdminSendImageForKid;
use App\Notifications\AdminSendMessageForKid;
use App\Notifications\AdminSendReportForKid;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Throwable;

class KidController extends Controller
{
    use UploadImageTrait;

    public function info_about_kid(Kid $kid)
    {
        $user = $kid->user;

        return view('admin.users.show_kid' , compact('kid' , 'user'));
    }

    public function add_kid_view(User $user){
        return view('admin.users.add_kid' , compact('user'));
    }

    public function add_kid(StoreKidRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->except('addmore' , '_token' , 'medical_report_image' , 'recent_kid_photo' , 'family_card_image' , 'birth_record_image' , 'vaccination_card_image' , 'other_documents');
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
                        'user_id' =>  $request->user_id ,
                        'kid_id' =>  $kid->id,
                    ]);
                }
            }
            DB::commit();
            // dd( $kid);
            // dd($person);
            return redirect()->route('admin.users.index')
                ->with('success',"تم تسجيل الطفل بنجاح");

        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function send_report_view(User $user , Kid $kid){
        return view('admin.users.send_report' , compact('user' , 'kid'));
    }


    public function send_report(Request $request){

        $user = User::where('id' , $request->user_id)->first();
        $kid = Kid::where('id' , $request->kid_id)->first();

        $request->validate([
            'kid_id' => 'required|exists:kids,id',
            'user_id' => 'required|exists:users,id',
            'report' => 'required'
        ],[
            'kid_id.required' => "لابد من ان يكون رقم الطفل صحيح",
            'kid_id.exists' => "لابد من ان يكون الطفل مسجل مسبقا فى الموقع",
            'user_id.required' => "لابد من ان يكون رقم المستخدم صحيح",
            'user_id.exists' => "لابد من ان يكون المستخدم مسجل مسبقا فى الموقع",
            'report.required' => "لابد من رفع التقرير المراد ارساله "
        ]);

        if ($reports = $request->file('report')) {
            foreach($reports as $report){
                $reportName = time().rand(0,999). "." . $report->getClientOriginalExtension();
                $report->storeAs('kid_reports', $reportName ,'public');
                $report = KidReport::create([
                    'kid_id' => $request->kid_id,
                    'user_id' => $request->user_id,
                    'report' => $reportName ,
                ]);
            }
        }

        Notification::send($user, new AdminSendReportForKid($report));
        // dd('Notification send!');

        return redirect()->route('admin.info_about_kid', $request->kid_id )
            ->with('success',"تم أرسال التقارير بنجاح");
    }


    public function send_image_view(User $user , Kid $kid){
        return view('admin.users.send_image' , compact('user' ,'kid'));
    }

    public function send_image(Request $request)
    {
        $user = User::where('id' , $request->user_id)->first();
        $kid = Kid::where('id' , $request->kid_id)->with('user')->get();

        $request->validate([
            'kid_id' => 'required|exists:kids,id',
            'user_id' => 'required|exists:users,id',
            'image' => 'required',
        ],[
            'kid_id.required' => "لابد من ان يكون رقم الطفل صحيح",
            'kid_id.exists' => "لابد من ان يكون الطفل مسجل مسبقا فى الموقع",
            'user_id.required' => "لابد من ان يكون رقم المستخدم صحيح",
            'user_id.exists' => "لابد من ان يكون المستخدم مسجل مسبقا فى الموقع",
            'image.required' => "لابد من رفع الصوره المراد ارساله "
        ]);

        if ($images = $request->file('image')) {
            foreach($images as $image){
                $imageName = time().rand(0,999). "." . $image->getClientOriginalExtension();
                $image->storeAs('kid_images', $imageName ,'public');
                $image = KidImage::create([
                    'kid_id' => $request->kid_id,
                    'user_id' => $request->user_id,
                    'image' => $imageName ,
                ]);
            }
        }
        Notification::send($user, new AdminSendImageForKid($image));
        // dd('Notification send!');

        return redirect()->route('admin.info_about_kid', $request->kid_id )
            ->with('success',"تم أرسال الصور بنجاح");
    }

    public function send_message_view(User $user , Kid $kid){
        return view('admin.users.send_message' , compact('user' , 'kid'));
    }

    public function send_message(Request $request)
    {
        $user = User::where('id' , $request->user_id)->first();
        $kid = Kid::where('id' , $request->kid_id)->with('user')->get();

        $data = $request->validate([
            'kid_id' => 'required|exists:kids,id',
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ],[
            'kid_id.required' => "لابد من ان يكون رقم الطفل صحيح",
            'kid_id.exists' => "لابد من ان يكون الطفل مسجل مسبقا فى الموقع",
            'user_id.required' => "لابد من ان يكون رقم المستخدم صحيح",
            'user_id.exists' => "لابد من ان يكون المستخدم مسجل مسبقا فى الموقع",
            'message.required' => "لابد من كتابة محتوى الرساله المراد ارساله ",
        ]);


        $message = KidMessage::create([
            'kid_id' => $request->kid_id,
            'user_id' => $request->user_id,
            'message' => $data['message'] ,
        ]);

        Notification::send($user, new AdminSendMessageForKid($message));
        // dd('Notification send!');

        return redirect()->route('admin.info_about_kid', $request->kid_id )
            ->with('success',"تم أرسال الرساله بنجاح");    }
}