<?php

namespace App\Http\Controllers;

use App\Billing;
use Illuminate\Http\Request;
use DB;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $harvard_bookings = DB::table('bookings')
        ->join('residents', 'res_id', 'res_id_foreign')
        ->join('rooms', 'room_id', 'room_id_foreign')
        ->where('booking_status', 'ACTIVE')
        ->where('building', 'HARVARD')
        ->orderBy('res_full_name')
        ->get();

         $princeton_bookings = DB::table('bookings')
        ->join('residents', 'res_id', 'res_id_foreign')
        ->join('rooms', 'room_id', 'room_id_foreign')
        ->where('booking_status', 'ACTIVE')
        ->where('building', 'PRINCETON')
        ->orderBy('res_full_name')
        ->get();

        $wharton_bookings = DB::table('bookings')
        ->join('residents', 'res_id', 'res_id_foreign')
        ->join('rooms', 'room_id', 'room_id_foreign')
        ->where('booking_status', 'ACTIVE')
        ->where('building', 'WHARTON')
        ->orderBy('res_full_name')
        ->get();


        return view('billing_and_collection.create-billing', compact('harvard_bookings', 'princeton_bookings', 'wharton_bookings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      dd('create-billing');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billing $billing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing)
    {
        //
    }
}
