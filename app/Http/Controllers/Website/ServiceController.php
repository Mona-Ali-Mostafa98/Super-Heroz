<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BookingService;
use App\Models\Kid;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(){
        return view('website.services');
    }

    public function show(Service $service){
        // $previous_service = Service::where('id',$service->id-1)->exists() ; //true or false
        // $next_service = Service::where('id', $service->id+1)->exists() ;

        // $previous_service = Service::where('id', '<', $service->id)->max('id'); //return service id or null
        // $next_service = Service::where('id', '>', $service->id)->min('id');

        $previous_service = Service::where('id', '<', $service->id)->orderBy('id','desc')->first(); //return model sservice or null
        $next_service = Service::where('id', '>', $service->id)->orderBy('id','asc')->first();

        // dd($previous_service);
        // dd($next_service);

        return view('website.single_service', compact('service' , 'previous_service' , 'next_service'));
    }

    public function reserve_service()
    {
        $kids = Kid::where('user_id', Auth::user()->id)->get();
        // dd($kids);
        return view('website.reserve-service' , compact('kids'));
    }

    public function reserve_service_store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service' => ['required','exists:services,title'],
            'date' => ['required' , 'date' , 'after:today', 'date_format:Y-m-d' ],
            'child' => ['required'],
        ],[
            'service.required' => 'مطلوب ادخال أسم الخدمه المراد حجزها',
            'email.exists' => 'هناك خطأ فى الخدمه المطلوبه ',
            'date.required' => 'مطلوب ادخال التاريخ المراد حجز الخدمه فيه',
            'date.date' => 'مطلوب ادخال التاريخ المراد حجز الخدمه فيه بصيغة صحيحه',
            'date.after' => 'مطلوب ادخال التاريخ المراد حجز الخدمه فيه بعد تاريخ اليوم',
            'child.required' => 'مطلوب تحديد الطفل المراد حجز الخدمه له' ,

        ]);

        BookingService::create($data);
        // dd($data);
        return redirect()->route('website.reserve_service')
            ->with('success',"تم حجز الخدمه بنجاح! يمكنك أضافة خدمه أخرى");

    }
}

