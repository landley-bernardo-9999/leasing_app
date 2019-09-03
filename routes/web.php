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
    else
        $rooms = App\Room::all();
        $residents = App\Resident::all();
        $owners = App\User::where('role', 'owner')->get();
        return view('dashboard', compact('rooms', 'residents', 'owners'));
});

Route::group(['middleware' => 'verified'], function(){
    Route::resources([
        'owners' => 'OwnerController',
        'rooms' => 'RoomController',
        'residents' => 'ResidentController',
        'bookings' => 'BookingController',
    ]);

});


