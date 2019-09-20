<?php

namespace App\Http\Controllers;

use App\Resident;
use App\Room;
use Illuminate\Http\Request;
use App\Booking;    
use App\Payment;    
use App\Guardian;
use DB;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $resident_info = $request->resident_info;

       session(['resident_info' => $resident_info]);

       $residents =  DB::table('bookings')
                        ->join('residents', 'bookings.res_id_foreign', 'residents.res_id')
                        ->join('rooms','bookings.room_id_foreign', 'rooms.room_id')
                        ->where('res_full_name', 'LIKE', "%$resident_info%")
                        ->orderBy('check_in_date', 'desc')
                        ->get();
                        
        return view('residents.show-residents', compact('residents'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function show(Resident $resident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function edit($res_id)
    {
        $booking = DB::table('bookings')
                ->join('residents', 'bookings.res_id_foreign', 'residents.res_id')
                ->join('rooms','bookings.room_id_foreign', 'rooms.room_id')
                ->join('guardians', 'res_id', 'res_guar_foreign_id')
                ->where('res_id', $res_id)
                ->get();

        return view('bookings.edit-booking-detail', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $res_id)
    {
        $resident = Resident::findOrFail($res_id);
        $resident->res_full_name = $request->res_full_name;
        $resident->res_email = $request->res_email;
        $resident->res_mobile = $request->res_mobile;
        $resident->res_email = $request->res_email;
        $resident->save();

        Booking:: where('res_id_foreign', $res_id)
        ->update([
                'initial_water_reading' => $request->initial_water_reading,
                'final_water_reading' => $request->final_water_reading,
                'initial_electric_reading' => $request->initial_electric_reading,
                'final_electric_reading' => $request->final_electric_reading                    
            ]);


        Guardian:: where('res_guar_foreign_id', $res_id)
        ->update([
                'guardian_full_name' => $request->guardian_full_name,
                'relationship' => $request->relationship,
                'guardian_mobile' => $request->guardian_mobile,
                'guardian_email' => $request->guardian_email                    
            ]);


        return back()->with('success','Data has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resident  $resident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $res_id)
    {
        Resident::where('res_id', $res_id)->delete();
        Booking::where('res_id_foreign', $res_id)->delete();
        Payment::where('resident_id_foreign', $res_id)->delete();
        Guardian::where('res_guar_foreign_id', $res_id)->delete();
        Room::
        where('room_id', $request->room_id)
        ->update([
                    'room_status' => 'VACANT'                    
                ]);

        return back()->with('success', 'Booking has been deleted!');
    }
}
