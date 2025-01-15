<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BookingSlot;
use Illuminate\Http\Request;

class BookingSlotController extends Controller
{
    public function index(){
        $slots = BookingSlot::get(); 
        return view('backend.booking_slot.index', compact('slots'));
    }
    public function create(){ 
        return view('backend.booking_slot.create');
    }
    public function store(Request $request){
       BookingSlot::create([ 
        "start_date_time" => $request->start_date_time,
        "end_date_time" => $request->end_date_time,
        "status" => 1
       ]);
       return redirect()->route('admin.booking_slot');
    }

    public function edit($id){
        $slot = BookingSlot::where('id', $id)->first();
        return view('backend.booking_slot.edit', compact('slot'));
    }

    public function update(Request $request, $id){
        BookingSlot::where('id', $id)->update([
            "date" => $request->date,
            "start_time" => $request->start_time,
            "end_time" => $request->end_time,
            "status" => 1
           ]);
           return redirect()->route('admin.booking_slot');
    }
}
