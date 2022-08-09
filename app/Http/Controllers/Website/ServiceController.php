<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

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

    public function reserve_service(){
        return view('website\reserve-service');
    }

    public function reserve_service_store(Request $request){

    }
}