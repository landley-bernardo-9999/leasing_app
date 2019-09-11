<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use DB;
use App\Billing;

class PaymentController extends Controller
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
    public function create(Request $request)
    {

        if($request->request_billings === null){
            $residents = DB::table('bookings')
            ->join('billings',  'bookings.booking_id', 'billings.booking_id_foreign')
            ->join('residents', 'bookings.res_id_foreign', 'residents.res_id')
            ->join('rooms', 'bookings.room_id_foreign', 'rooms.room_id')
            ->groupBy('res_id')
            ->get();

            $billings = Billing::where('booking_id_foreign',$request->request_billings)->get();

            

        return view('payments.accept-payment', compact('residents', 'billings'));
        }
        else{
            $residents = DB::table('bookings')
            ->join('billings',  'bookings.booking_id', 'billings.booking_id_foreign')
            ->join('residents', 'bookings.res_id_foreign', 'residents.res_id')
            ->join('rooms', 'bookings.room_id_foreign', 'rooms.room_id')
            ->groupBy('res_id')
            ->where('booking_id', $request->request_billings)
            ->get();


            $billings = Billing::where('booking_id_foreign',$request->request_billings)->get();

            return view('payments.accept-payment', compact('residents', 'billings'));
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment();
        $payment->amt_paid = $request->amt_paid;
        $payment->form_of_pay = $request->form_of_pay;
        $payment->or_number = $request->or_number;
        $payment->ar_number = $request->ar_number;
        $payment->bank_name = $request->bank_name;
        $payment->check_no = $request->check_no;
        $payment->date_dep = $request->date_dep;
        $payment->resident_id_foreign = $request->res_id;
        $payment->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
