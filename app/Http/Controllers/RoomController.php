<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use DB;
use App\Booking;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->booking == null){
            $rooms = Room::all();

            return view('rooms.show-rooms', compact('rooms'));
        }else{
            $rooms = Room::where('site', $request->site)
                     ->where('building', $request->building)
                     ->where('floor_no', $request->floor_no)
                     ->where('type_of_bed', $request->type_of_bed)
                     ->get();

            session(['check_in_date' => $request->check_in_date]);
            session(['check_out_date'=> $request->check_out_date]);

            return view('rooms.search', compact('rooms'));
        }

        
      
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
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($room_id)
    {
        $room = Room::findOrFail($room_id);

        $bookings = DB::table('bookings')
                        ->join('residents', 'bookings.res_id_foreign', 'residents.res_id')
                        ->where('room_id_foreign', $room_id)
                        ->get();

        return view('rooms.booking-form',compact('room', 'bookings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
