<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use DB;
use App\Billing;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $pay_date = $request->pay_date;

            if($pay_date == NULL){
                $pay_date = Carbon::today()->format('Y-m-d');
            }
    
           $payments = Payment::where('updated_at', $pay_date)->get();
    
            return view('payments.reports', compact('payments'));
       
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
            ->orderBy('res_full_name')
            ->get();

            $billings = Billing::where('booking_id_foreign',$request->request_billings)->get();

            $payments = Payment::where('resident_id_foreign', ' ')->get();

            
        return view('payments.accept-payment', compact('residents', 'billings', 'payments'));
        }
        else{

            $pieces = explode(" ", $request->request_billings);

            $booking_id = $pieces[0];
            $resident_id = $pieces[1];

            $residents = DB::table('bookings')
            ->join('billings',  'bookings.booking_id', 'billings.booking_id_foreign')
            ->join('residents', 'bookings.res_id_foreign', 'residents.res_id')
            ->join('rooms', 'bookings.room_id_foreign', 'rooms.room_id')
            ->groupBy('res_id')
            
            ->where('booking_id', $booking_id)
            ->get();

            $billings = Billing::where('booking_id_foreign',$booking_id)->get();

            $payments = Payment::where('resident_id_foreign', $resident_id)->whereNull('desc')->get();

            return view('payments.accept-payment', compact('residents', 'billings', 'payments'));
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
        $payment->updated_at = $request->pay_date;
        $payment->amt_paid = $request->amt_paid;
        $payment->form_of_pay = $request->form_of_pay;
        $payment->or_number = $request->or_number;
        $payment->ar_number = $request->ar_number;
        $payment->bank_name = $request->bank_name;
        $payment->check_no = $request->check_no;
        if($request->form_of_pay === 'THRU BANK'){
            $payment->date_dep = $request->date_dep;
        }
        $payment->resident_id_foreign = $request->res_id;
        $payment->save();

        return back()->with('success', 'Payment Information has been added!');
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
