@extends('layouts.app')
@section('title', 'Booking Form')
@section('content')
<div class="container">
    <form action="/bookings" method="POST">
            {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7">
             <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-left">PERSONAL INFORMATION</h5>
                        <div class="col-md-12">
                        <input type="hidden" name="room_id" id="room_id" value="{{ $room->room_id }}" class="form-control">
                        <p>Full Name</p>
                        <input type="text" name="full_name" id="full_name" class="form-control">
                        <br>
                        <p>Email</p>
                        <input type="email" name="email" id="email" class="form-control">
                        <br>
                        <p>Phone Number</p>
                        <input type="text" name="mobile" id="mobile" class="form-control">
                        <br>
                        <p>Country</p>
                        <input type="text" name="country" id="country" class="form-control">
                        {{-- <select name="country" id="country" class="form-control">
                            <option value=""></option>
                        </select> --}}
                    </div>        
                </div>    
            </div>
        </div>
        <div class="col-md-5">
             <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-left">{{$room->building.' '.$room->room_no.' '.$room->room_wing}}</h5>
                    <br>
                    <table class="table table-borderless">
                        <tr>
                            <td>Check-in:</td>
                            <td><input type="date" name="check_in_date" id="check_in_date" class="form-control" value="{{ session('check_in_date') }}"></td>
                        </tr>
                        <tr>
                            <td>Check-out:</td>
                            <td><input type="date" name="check_out_date" id="check_out_date" class="form-control" value="{{ session('check_out_date') }}"></td>
                        </tr>
                        <tr>
                            <td>Number of Month/s:</td>
                            <td><input type="number" name="no_of_mon" id="no_of_mon" class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td>Booking Term:</td>
                            <td><input type="text" name="booking_term" id="booking_term" class="form-control" ></td>
                        </tr>
                         <tr>
                            <td>Total Amount:</td>
                            <td><input type="number" name="total_amt" id="total_amt" class="form-control" readonly></td>
                        </tr>
                    </table>
                </div>    
            </div>
        </div>
    </div>
    <br>
     <div class="row">
        <div class="col-md-12">
            <button class="btn text-right btn-primary" type="submit">Book</button>
        </div>
    </div>
    </form>
</div>
@endsection
