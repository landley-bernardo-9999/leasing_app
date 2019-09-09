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
        }
    }
       
});

Route::group(['middleware' => 'verified'], function(){
    Route::resources([
        'owners' => 'OwnerController',
        'rooms' => 'RoomController',
        'residents' => 'ResidentController',
        'bookings' => 'BookingController',
    ]);

});


