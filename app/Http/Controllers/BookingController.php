<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\Room;
use App\Resident;
use DB;

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

        return view('bookings.booking', compact('building', 'floor_no', 'type_of_bed','site'));
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
        DB::beginTransaction();

        try {
            
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

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }
       
        return redirect('/rooms/'.$request->room_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($booking_id)
    {
        return view('bookings.show-booking');
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
        return 'this ie for deleting.';
    }
}
