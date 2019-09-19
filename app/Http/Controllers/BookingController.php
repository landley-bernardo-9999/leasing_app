<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\Room;
use App\Resident;
use DB;
use App\Billing;
use App\Payment;
use Carbon\Carbon;
use App\Guardian;
use App\Remittance;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $building = Room::orderBy('site')->orderBy('building')->distinct()->get('building');
        $floor_no = Room::orderBy('floor_no')->distinct()->get('floor_no');
        $type_of_bed = Room::orderBy('type_of_bed')->whereNotNull('type_of_bed')->distinct()->get('type_of_bed');
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
        $cn = DB::connection();
        

        try{
            $cn->beginTransaction();

            $resident = new Resident();
            $resident->res_type = 'PRIMARY';
            $resident->res_full_name = $request->full_name;
            $resident->res_email = $request->email;
            $resident->res_mobile = $request->mobile;
            $resident->res_country = $request->country;
            $resident->save();
    
            $guardian = new Guardian();
            $guardian->guardian_full_name = $request->guardian_full_name;
            $guardian->relationship = $request->relationship;
            $guardian->guardian_mobile = $request->guardian_mobile;
            $guardian->guardian_email = $request->guardian_email;
            $guardian->res_guar_foreign_id = $resident->res_id;
            $guardian->save();
    
            $booking = new Booking();
            $booking->check_in_date = $request->check_in_date;
            $booking->check_out_date = $request->check_out_date;
            $booking->booking_term = $request->booking_term;
            $booking->booking_status = 'ACTIVE';
            $booking->room_id_foreign = $request->room_id;
            $booking->res_id_foreign = $resident->res_id;
            $booking->save();
    
            Room:: where('room_id', $request->room_id)
                ->update([
                        'room_status' => 'OCCUPIED'                    
                    ]);

            if($request->building == 'TRANSIENT'){
                $billing = new Billing();
                $billing->created_at = $request->check_in_date;
                $billing->bil_amt = $request->adv_rent;
                $billing->desc = 'TRANSIENT RENT';
                $billing->booking_id_foreign = $booking->booking_id;
                $billing->save();

                $payment = new Payment();
                $payment->updated_at = $request->check_in_date;
                $payment->amt_paid = $billing->bil_amt;
                $payment->resident_id_foreign =  $resident->res_id;
                $payment->save();
            }else{
                $billing1 = new Billing();
                $billing1->created_at = $request->check_in_date;
                $billing1->bil_amt = $request->sec_dep;
                $billing1->desc = 'SECURITY DEPOSIT';
                $billing1->booking_id_foreign = $booking->booking_id;
                $billing1->save();
        
                $billing2 = new Billing();
                $billing2->created_at = $request->check_in_date;
                $billing2->bil_amt = $request->util_dep;
                $billing2->desc = 'UTILITIES DEPOSIT';
                $billing2->booking_id_foreign = $booking->booking_id;
                $billing2->save();
        
                $billing3 = new Billing();
                $billing3->created_at = $request->check_in_date;
                $billing3->bil_amt = $request->adv_rent;
                $billing3->desc = 'ADVANCE RENT';
                $billing3->booking_id_foreign = $booking->booking_id;
                $billing3->save();

                $payment = new Payment();
                $payment->updated_at = $request->check_in_date;
                $payment->amt_paid = $billing1->bil_amt +  $billing2->bil_amt +  $billing3->bil_amt;
                $payment->resident_id_foreign =  $resident->res_id;
                $payment->save();
                
                if($request->building == 'HARVARD'){
                    if($request->booking_term == 'LONG TERM'){
                        $payment1 = new Payment();
                        $payment1->updated_at = $booking->check_in_date;
                        $payment1->amt_paid = $request->room_size * 58.61;
                        $payment1->resident_id_foreign =  $resident->res_id;
                        $payment1->desc = 'CONDO DUES'; 
                        $payment1->save();

                        $payment2 = new Payment();
                        $payment2->updated_at = $booking->check_in_date;
                        $payment2->amt_paid = 780;
                        $payment2->resident_id_foreign =  $resident->res_id;
                        $payment2->desc = 'MANAGEMENT FEE';
                        $payment2->save();

                        $remittance = new Remittance();
                        $remittance->rem_amt = $request->long_term_rent - ($payment1->amt_paid + $payment2->amt_paid);
                        $remittance->created_at = $booking->check_in_date; 
                        $remittance->rem_own_id_foreign = $request->own_id;
                        $remittance->rem_pay_id_foreign = $billing3->bil_id;
                        $remittance->save();
                    }
                    else{
                        $payment1 = new Payment();
                        $payment1->updated_at = $booking->check_in_date;
                        $payment1->amt_paid = $request->room_size * 58.61;
                        $payment1->resident_id_foreign =  $resident->res_id;
                        $payment1->desc = 'CONDO DUES';
                        $payment1->save();

                        $payment2 = new Payment();
                        $payment2->updated_at = $booking->check_in_date;
                        $payment2->amt_paid = $request->long_term_rent * .2;
                        $payment2->resident_id_foreign =  $resident->res_id;
                        $payment2->desc = 'MANAGEMENT FEE';
                        $payment2->save();

                        $remittance = new Remittance();
                        $remittance->rem_amt = $request->long_term_rent - ($payment1->amt_paid + $payment2->amt_paid);
                        $remittance->created_at = $booking->check_in_date; 
                        $remittance->rem_own_id_foreign = $request->own_id;
                        $remittance->rem_pay_id_foreign = $billing3->bil_id;
                        $remittance->save();

                }
            }
            elseif($request->building == 'PRINCETON'){
                    if($request->booking_term == 'LONG TERM'){
                        $payment1 = new Payment();
                        $payment1->updated_at = $booking->check_in_date;
                        $payment1->amt_paid = $request->room_size * 58.61;
                        $payment1->resident_id_foreign =  $resident->res_id;
                        $payment1->desc = 'CONDO DUES';
                        $payment1->save();

                        $payment2 = new Payment();
                        $payment2->updated_at = $booking->check_in_date;
                        $payment2->amt_paid = 1200;
                        $payment2->resident_id_foreign =  $resident->res_id;
                        $payment2->desc = 'MANAGEMENT FEE';
                        $payment2->save();

                        $remittance = new Remittance();
                        $remittance->rem_amt = $request->long_term_rent - ($payment1->amt_paid + $payment2->amt_paid);
                        $remittance->created_at = $booking->check_in_date; 
                        $remittance->rem_own_id_foreign = $request->own_id;
                        $remittance->rem_pay_id_foreign = $billing3->bil_id;
                        $remittance->save();

                    }else if($request->booking_term == 'SHORT TERM'){
                        $payment1 = new Payment();
                        $payment1->updated_at = $booking->check_in_date;
                        $payment1->amt_paid = $request->room_size * 58.61;
                        $payment1->resident_id_foreign =  $resident->res_id;
                        $payment1->desc = 'CONDO DUES';
                        $payment1->save();

                        $payment2 = new Payment();
                        $payment2->updated_at = $booking->check_in_date;
                        $payment2->amt_paid = $request->long_term_rent * .2;
                        $payment2->resident_id_foreign =  $resident->res_id;
                        $payment2->desc = 'MANAGEMENT FEE';
                        $payment2->save();

                        $remittance = new Remittance();
                        $remittance->rem_amt = $request->long_term_rent - ($payment1->amt_paid + $payment2->amt_paid);
                        $remittance->created_at = $booking->check_in_date; 
                        $remittance->rem_own_id_foreign = $request->own_id;
                        $remittance->rem_pay_id_foreign = $billing3->bil_id;
                        $remittance->save();
                    }
                    
                }
                elseif($request->building == 'WHARTON'){
                    if($request->booking_term == 'LONG TERM'){
                        $payment1 = new Payment();
                        $payment1->updated_at = $booking->check_in_date;
                        $payment1->amt_paid = $request->room_size * 58.61;
                        $payment1->resident_id_foreign =  $resident->res_id;
                        $payment1->desc = 'CONDO DUES';
                        $payment1->save();

                        $payment2 = new Payment();
                        $payment2->updated_at = $booking->check_in_date;
                        $payment2->amt_paid = $request->long_term_rent * .2;
                        $payment2->resident_id_foreign =  $resident->res_id;
                        $payment2->desc = 'MANAGEMENT FEE';
                        $payment2->save();

                        $remittance = new Remittance();
                        $remittance->rem_amt = $request->long_term_rent - ($payment1->amt_paid + $payment2->amt_paid);
                        $remittance->created_at = $booking->check_in_date; 
                        $remittance->rem_own_id_foreign = $request->own_id;
                        $remittance->rem_pay_id_foreign = $billing3->bil_id;
                        $remittance->save();
                        
                    }else{
                        $payment1 = new Payment();
                        $payment1->updated_at = $booking->check_in_date;
                        $payment1->amt_paid = $request->room_size * 58.61;
                        $payment1->resident_id_foreign =  $resident->res_id;
                        $payment1->desc = 'CONDO DUES';
                        $payment1->save();

                        $payment2 = new Payment();
                        $payment2->updated_at = $booking->check_in_date;
                        $payment2->amt_paid = 1500;
                        $payment2->resident_id_foreign =  $resident->res_id;
                        $payment2->desc = 'MANAGEMENT FEE';
                        $payment2->save();

                        $remittance = new Remittance();
                        $remittance->rem_amt = $request->long_term_rent - ($payment1->amt_paid + $payment2->amt_paid);
                        $remittance->created_at = $booking->check_in_date; 
                        $remittance->rem_own_id_foreign = $request->own_id;
                        $remittance->rem_pay_id_foreign = $billing3->bil_id;
                        $remittance->save();
                    }

                }
            }
            
        }catch(\Exception $e){
            $cn->rollBack();
            return back()->withError($e->getMessage());
        } 

        session()->forget('check_in_date');
        session()->forget('check_out_date');

        return redirect('/bookings/'.$booking->booking_id)->with('success', 'Booking has been added to the database!');
        
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

        $guardian = DB::table('residents')
                        ->leftJoin('bookings', 'res_id', 'res_id_foreign')
                        ->leftJoin('guardians', 'res_id', 'res_guar_foreign_id')
                        ->where('booking_id', $booking_id)
                        ->groupBy('res_id')
                        ->get();
                        
        $billings = Billing::where('booking_id_foreign', $booking_id)->get(); 

        $payments = DB::table('residents')
            ->leftJoin('bookings', 'res_id', 'res_id_foreign')
            ->leftJoin('payments', 'res_id', 'resident_id_foreign')
            ->where('desc', NULL)
            ->where('booking_id', $booking_id)
            
            ->get();

        return view('bookings.show-booking-detail', compact('booking', 'billings', 'payments', 'guardian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking, Request $request)
    {
        if($booking->approved_at != null){
            $booking = Booking::findOrFail($booking->booking_id);

            $billings = Billing::where('booking_id_foreign', $booking->booking_id)->get();

            $sec_dep = Billing::where('booking_id_foreign', $booking->booking_id)->whereIn('desc',['SECURITY DEPOSIT', 'UTILITIES DEPOSIT'])->get();

            $payments = DB::table('residents')
            ->leftJoin('bookings', 'res_id', 'res_id_foreign')
            ->leftJoin('payments', 'res_id', 'resident_id_foreign')
            ->where('desc', NULL)
            ->where('booking_id', $booking->booking_id)
            ->get();

            $balance = $billings->sum('bil_amt') - $payments->sum('amt_paid');

            return view('bookings.moveout-form', compact('booking', 'balance', 'sec_dep'));
        }else{
            return abort(404);
        }
        
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
        if($request->action === 'requested'){
            $booking = Booking::findOrFail($booking->booking_id);
            $booking->requested_at = Carbon::today()->format('Y-m-d');
            $booking->save();

            return back()->with('success', 'Request has been sent to the manager!');
        }
        elseif($request->action === 'approved'){
            $booking = Booking::findOrFail($booking->booking_id);
            $booking->approved_at = Carbon::today()->format('Y-m-d');
            $booking->save();

            return back()->with('success', 'Request has been approved!');   
        }else{
            return 'this is for move-out form.';
        }

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
