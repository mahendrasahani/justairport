<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BookingLog;
use Illuminate\Http\Request;

class BookingLogController extends Controller
{
    public function index(){
        $booking_logs = BookingLog::with('getJob')->orderBy('id', 'desc')->paginate(100);  
        return view('backend.booking_logs.index', compact('booking_logs'));
    }
}
