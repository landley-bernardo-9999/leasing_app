<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify'=>true]);

Route::get('/', function () {
    if(Auth::guest()){
        return view('auth.login');
    }
    else{
        if(auth()->user()->role === 'admin'){
            $rooms = App\Room::all();
            $bookings = App\Booking::all();
            $owners = App\User::where('role', 'owner')->get();

            return view('dashboard', compact('rooms', 'bookings', 'owners'));
        }elseif(auth()->user()->role === 'owner'){
            $rooms = DB::table('rooms')
                ->join('users', 'rooms.own_id_foreign', 'users.user_id')
                ->where('own_id_foreign', auth()->user()->user_id)
                ->get();

            return view('owners.dashboard', compact('rooms'));
        }elseif(auth()->user()->role === 'treasury'){

           $payments = DB::table('residents')
            ->join('payments', 'residents.res_id', 'payments.resident_id_foreign')
            ->join('bookings', 'residents.res_id', 'bookings.res_id_foreign')
            ->get();

            return view('payments.dashboard', compact('payments'));

        }
    }
       
});

Route::group(['middleware' => 'verified'], function(){
    Route::resources([
        'owners' => 'OwnerController',
        'rooms' => 'RoomController',
        'residents' => 'ResidentController',
        'bookings' => 'BookingController',
        'payments' => 'PaymentController',
        'billings' => 'BillingController',
    ]);

    Route::get('/search/payments{s?}', 'PaymentController@create')->where('s', '[\w\d]+');

});


