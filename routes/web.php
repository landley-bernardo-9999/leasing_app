<?php

use App\Room;

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
            $rooms = Room::all();
            $bookings = App\Booking::where('booking_status', 'ACTIVE')->get();
            $owners = App\User::where('role', 'owner')->get();

            $occupied_rooms_harvard =Room::where('building', 'HARVARD')->where('room_status', 'OCCUPIED')->count();
            $vacant_rooms_harvard = Room::where('building', 'HARVARD')->where('room_status', 'VACANT')->count();
            $reserved_rooms_harvard = Room::where('building', 'HARVARD')->where('room_status', 'RESERVED')->count();
            $rectification_rooms_harvard =Room::where('building', 'HARVARD')->where('room_status', 'RECTIFICATION')->count();
    
            $occupied_rooms_princeton= Room::where('building', 'PRINCETON')->where('room_status', 'OCCUPIED')->count();
            $vacant_rooms_princeton = Room::where('building', 'PRINCETON')->where('room_status', 'VACANT')->count();
            $reserved_rooms_princeton = Room::where('building', 'PRINCETON')->where('room_status', 'RESERVED')->count();
            $rectification_rooms_princeton = Room::where('building', 'PRINCETON')->where('room_status', 'RECTIFICATION')->count();
    
            $occupied_rooms_wharton = Room::where('building', 'WHARTON')->where('room_status', 'OCCUPIED')->count();
            $vacant_rooms_wharton = Room::where('building', 'WHARTON')->where('room_status', 'VACANT')->count();
            $reserved_rooms_wharton = Room::where('building', 'WHARTON')->where('room_status', 'RESERVED')->count();
            $rectification_rooms_wharton = Room::where('building', 'WHARTON')->where('room_status', 'RECTIFICATION')->count();

            return view('dashboard', 
                    compact('rooms', 'bookings', 'owners', 
                            'occupied_rooms_harvard', 'vacant_rooms_harvard', 'reserved_rooms_harvard', 'rectification_rooms_harvard',
                            'occupied_rooms_princeton', 'vacant_rooms_princeton', 'reserved_rooms_princeton', 'rectification_rooms_princeton',
                            'occupied_rooms_wharton', 'vacant_rooms_wharton', 'reserved_rooms_wharton', 'rectification_rooms_wharton'
                            )
                        );
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
        }elseif(auth()->user()->role === 'manager'){
            
           $bookings = DB::table('bookings')
           ->join('residents', 'bookings.res_id_foreign', 'residents.res_id')
           ->join('rooms','bookings.room_id_foreign', 'rooms.room_id')
           ->where('requested_at','!=', NULL)
           ->get();

            return view('managers.dashboard', compact('bookings'));
        }elseif(auth()->user()->role === 'web admin'){
            $users = App\User::all();
            $sessions = DB::table('sessions')->whereNotNull('user_id')->get();

            return view('web_admin.dashboard', compact('users', 'sessions'));
        }elseif(auth()->user()->role === 'billing'){


            return view('billing_and_collection.dashboard');
        }

    }
       
});

Route::group(['middleware' => 'verified'], function(){
    Route::resources([
        'rooms' => 'RoomController',
        'residents' => 'ResidentController',
        'bookings' => 'BookingController',
        'payments' => 'PaymentController',
        'billings' => 'BillingController',
        'remittances' => 'RemittanceController',
        'users' => 'UserController',
    ]);

    Route::get('/search/payments{s?}', 'PaymentController@create')->where('s', '[\w\d]+');

    Route::get('/filter/payments{s?}', 'PaymentController@index')->where('s', '[\w\d]+');

    Route::get('/search/residents{s?}', 'ResidentController@index')->where('s', '[\w\d]+');
    
    Route::get('/search/users{s?}', 'UserController@index')->where('s', '[\w\d]+');

    Route::get('/active-sessions', function(){

         $sessions = DB::table('users')
                ->join('sessions','users.user_id', 'sessions.user_id')
                ->whereNotNull('sessions.user_id')
                ->orderBy('name')
                ->get();

        return view('web_admin.show-active-sessions', compact('sessions'));
    });

});


