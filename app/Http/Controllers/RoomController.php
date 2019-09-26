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
            
            $harvard_ground_floor = Room::where('building', 'HARVARD')->where('floor_no','G')->orderBy('room_wing')->get();
            $harvard_lower_ground_floor = Room::where('building', 'HARVARD')->where('floor_no','L')->orderBy('room_wing')->get();
            $harvard_upper_ground_floor = Room::where('building', 'HARVARD')->where('floor_no','U')->orderBy('room_wing')->get();
            $harvard_second_floor = Room::where('building', 'HARVARD')->where('floor_no','2')->orderBy('room_wing')->get();
            $harvard_third_floor = Room::where('building', 'HARVARD')->where('floor_no','3')->orderBy('room_wing')->get();
            $harvard_fourth_floor = Room::where('building', 'HARVARD')->where('floor_no','4')->orderBy('room_wing')->get();
            $harvard_fifth_floor = Room::where('building', 'HARVARD')->where('floor_no','5')->orderBy('room_wing')->get();
            $harvard_sixth_floor = Room::where('building', 'HARVARD')->where('floor_no','6')->orderBy('room_wing')->get();
        

           $princeton_ground_floor = Room::where('building', 'PRINCETON')->where('floor_no','G')->orderBy('floor_no')->get();
           $princeton_lower_ground_floor = Room::where('building', 'PRINCETON')->where('floor_no','L')->orderBy('floor_no')->get();
           $princeton_upper_ground_floor = Room::where('building', 'PRINCETON')->where('floor_no','U')->orderBy('floor_no')->get();
           $princeton_second_floor = Room::where('building', 'PRINCETON')->where('floor_no','2')->orderBy('floor_no')->get();
           $princeton_third_floor = Room::where('building', 'PRINCETON')->where('floor_no','3')->orderBy('floor_no')->get();
           $princeton_fourth_floor = Room::where('building', 'PRINCETON')->where('floor_no','4')->orderBy('floor_no')->get();
           $princeton_fifth_floor = Room::where('building', 'PRINCETON')->where('floor_no','5')->orderBy('floor_no')->get();
           $princeton_sixth_floor = Room::where('building', 'PRINCETON')->where('floor_no','6')->orderBy('floor_no')->get();

           $wharton_ground_floor = Room::where('building', 'WHARTON')->where('floor_no','G')->orderBy('floor_no')->get();
           $wharton_second_floor = Room::where('building', 'WHARTON')->where('floor_no','2')->orderBy('floor_no')->get();
           $wharton_third_floor = Room::where('building', 'WHARTON')->where('floor_no','3')->orderBy('floor_no')->get();
           $wharton_fourth_floor = Room::where('building', 'WHARTON')->where('floor_no','4')->orderBy('floor_no')->get();
           $wharton_fifth_floor = Room::where('building', 'WHARTON')->where('floor_no','5')->orderBy('floor_no')->get();
           $wharton_sixth_floor = Room::where('building', 'WHARTON')->where('floor_no','6')->orderBy('floor_no')->get();
           

            session(['booking' => 'false']);

            return view('rooms.show-rooms', compact('harvard_lower_ground_floor','harvard_upper_ground_floor','harvard_ground_floor','harvard_first_floor', 'harvard_second_floor', 'harvard_third_floor', 'harvard_fourth_floor', 'harvard_fifth_floor', 'harvard_sixth_floor',
            'princeton_lower_ground_floor','princeton_upper_ground_floor','princeton_ground_floor','princeton_second_floor', 'princeton_third_floor', 'princeton_fourth_floor', 'princeton_fifth_floor', 'princeton_sixth_floor',
            'wharton_ground_floor','wharton_second_floor', 'wharton_third_floor', 'wharton_fourth_floor', 'wharton_fifth_floor', 'wharton_sixth_floor'
                        ));
        }else{
            $rooms = Room::where('site', $request->site)
                     ->where('building', $request->building)
                     ->where('floor_no', $request->floor_no)
                     ->where('type_of_bed', $request->type_of_bed)
                     ->get();

            session(['booking' => 'true']);
            session(['site' => $request->site]);
            session(['building' => $request->building]);
            session(['floor_no' => $request->floor_no]);
            session(['type_of_bed' => $request->type_of_bed]);
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
        if(session('booking') == 'false' || auth()->user()->role != 'admin'){
            $room = Room::findOrFail($room_id);

            $bookings = DB::table('bookings')
                            ->join('residents', 'bookings.res_id_foreign', 'residents.res_id')
                            ->where('room_id_foreign', $room_id)
                            ->get();    
            
            $owner = DB::table('users')
                            ->join('rooms', 'users.user_id', 'rooms.own_id_foreign')
                            ->where('room_id', $room_id)
                            ->distinct()
                            ->get(['name']);

            return view('rooms.show-bookings',compact('room', 'bookings', 'owner'));
        }
        else{
            $room = Room::findOrFail($room_id);
            return view('rooms.booking-form',compact('room'));
        }
       
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
