<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\Room;
use App\Resident;
use DB;
use App\Billing;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $building = Room::orderBy('building')->distinct()->get('building');
        $floor_no = Room::orderBy('floor_no')->distinct()->get('floor_no');
        $type_of_bed = Room::orderBy('type_of_bed')->distinct()->get('type_of_bed');
        $site = Room::orderBy('site')->distinct()->get('site');

        return view('bookings.book', compact('building', 'floor_no', 'type_of_bed','site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resident = new Resident();
        $resident->res_type = 'primary';
        $resident->res_full_name = $request->full_name;
        $resident->res_email = $request->email;
        $resident->res_mobile = $request->mobile;
        $resident->res_country = $request->country;
        $resident->save();

        $booking = new Booking();
        $booking->check_in_date = $request->check_in_date;
        $booking->check_out_date = $request->check_out_date;
        $booking->booking_term = $request->booking_term;
        $booking->booking_status = 'active';
        $booking->room_id_foreign = $request->room_id;
        $booking->res_id_foreign = $resident->res_id;
        $booking->save();

        Room::
        where('room_id', $request->room_id)
        ->update([
                    'room_status' => 'OCCUPIED'                    
                ]);
        
        $billing = new Billing();
        $billing->bil_amt = $request->sec_dep;
        $billing->desc = 'SECURITY DEPOSIT';
        $billing->booking_id_foreign = $booking->booking_id;
        $billing->save();

        $billing = new Billing();
        $billing->bil_amt = $request->util_dep;
        $billing->desc = 'UTILITIES DEPOSIT';
        $billing->booking_id_foreign = $booking->booking_id;
        $billing->save();

        $billing = new Billing();
        $billing->bil_amt = $request->adv_rent;
        $billing->desc = 'ADVANCE RENT';
        $billing->booking_id_foreign = $booking->booking_id;
        $billing->save();

        session()->forget('check_in_date');
        session()->forget('check_out_date');

        $room = Room::findOrFail($request->room_id);

        $bookings = DB::table('bookings')
                        ->join('residents', 'bookings.res_id_foreign', 'residents.res_id')
                        ->where('room_id_foreign', $request->room_id)
                        ->get();
            
        $owner = DB::table('users')
                        ->join('rooms', 'users.user_id', 'rooms.own_id_foreign')
                        ->where('room_id', $request->room_id)
                        ->distinct()
                        ->get(['name']);

        return view('rooms.show-bookings',compact('room', 'bookings', 'owner'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($booking_id)
    {
        $booking = DB::table('bookings')
                        ->join('residents', 'bookings.res_id_foreign', 'residents.res_id')
                        ->join('rooms','bookings.room_id_foreign', 'rooms.room_id')
                        ->where('booking_id', $booking_id)
                        ->get();
                        
        $billings = DB::table('billings')->where('booking_id_foreign', $booking_id)->get();

        return view('bookings.show-booking-detail', compact('booking', 'billings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($booking_id)
    {
        return view('bookings.edit-booking');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($booking_id)
    {

    }
}
