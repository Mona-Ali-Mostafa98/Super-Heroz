<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingService;
use Illuminate\Http\Request;

class ServiceBookingController extends Controller
{
    public function index()
    {
        $booking_services = BookingService::with('user')->simplePaginate(10) ;
        return view( 'admin.booking_services.index', compact('booking_services'));
    }

    public function destroy( BookingService $booking_service)
    {
        $booking_service -> delete();
        return redirect()->route('admin.booking_services.index')
            ->with('success' , "تم الحذف بنجاح");
    }
}