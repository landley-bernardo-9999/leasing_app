@extends('layouts.app')
@if($room->room_status == 'VACANT')
    @section('title', 'Booking Form')
@else
    @section('title', $room->building.' '.$room->room_no.' '.$room->room_wing)
@endif
@section('content')
<div class="container">
            <form action="/bookings" method="POST">
                {{ csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title text-left"><b>CLIENT PERSONAL INFORMATION</b></h5>
                        
                            <div class="col-md-12">
                            <input type="hidden" name="room_size" id="room_size" value="{{ $room->room_size }}">
                            <input type="hidden" name="long_term_rent" id="long_term_rent" value="{{ $room->long_term_rent }}">
                            <input type="hidden" name="short_term_rent" id="short_term_rent" value="{{ $room->short_term_rent }}">
                            <input type="hidden" name="transient_rent" id="transient_rent" value="{{ $room->transient_rent }}">
                            <input type="hidden" name="own_id" id="own_id" value="{{ $room->own_id_foreign }}">
                            <input type="hidden" name="room_id" id="room_id" value="{{ $room->room_id }}">
                            <input type="hidden" name="building" id="building" value="{{ $room->building }}">
                            <p><span class="text-danger">*</span>Full Name</p>
                            <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name">
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <br>

                            <p><span class="text-danger">*</span>Mobile/Telephone Number</p>
                            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  required autocomplete="mobile">
                            <br>

                            <p><span class="text-danger">*</span>Email Address</p>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required autocomplete="email">
                            <br>

                            <p><span class="text-danger">*</span>Country</p>
                            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="PH" required autocomplete="country">
    
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            <h5 class="card-title text-left"><b>GUARDIAN INFORMATION</b></h5>
                                
                            <p><span class="text-danger">*</span>Full Name</p>
                            <input id="guardian_full_name" type="text" class="form-control @error('guardian_full_name') is-invalid @enderror" name="guardian_full_name" value="{{ old('guardian_full_name') }}"  required autocomplete="guardian_full_name">
    
                            @error('guardian_full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            <p><span class="text-danger">*</span>Relationship</p>
                            <input id="relationship" type="text" class="form-control @error('relationship') is-invalid @enderror" name="relationship" value="{{ old('relationship') }}" required autocomplete="relationship">
                            <small class="form-text text-muted">i.e. Parent/Sibling/Husband,etc.</small>
    
                            @error('relationship')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            <p><span class="text-danger">*</span>Mobile/Telephone Number</p>
                            <input id="guardian_mobile" type="text" class="form-control @error('guardian_mobile') is-invalid @enderror" name="guardian_mobile" value="{{ old('guardian_mobile') }}"  required autocomplete="guardian_mobile">
                            <small class="form-text text-muted">Please validate the Mobile/Telephone Number.</small>

                            @error('guardian_mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            <p>Email Address <span class="text-danger">(Optional)</span></p>
                            <input id="guardian_email" type="text" class="form-control @error('guardian_email') is-invalid @enderror" name="guardian_email" value="{{ old('guardian_email') }}"  autocomplete="guardian_email">
    
                            @error('guardian_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>        
                    </div>    
                
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-left"><b>{{$room->building.' '.$room->room_no.' '.$room->room_wing}}</b></h5>
                        <hr>
                        <table class="table table-borderless">    
                            <tr>
                                <td><span class="text-danger">*</span>Check-in</td>
                                <td>
                                    <input onkeyup="select_term()" id="check_in_date" type="date" class="form-control @error('check_in_date') is-invalid @enderror" name="check_in_date" value="{{ session('check_in_date') }}" required>
    
                                    @error('check_in_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><span class="text-danger">*</span>Check-out</td>
                                <td>
                                    <input onkeyup="select_term()" id="check_out_date" type="date" class="form-control @error('check_out_date') is-invalid @enderror" name="check_out_date" value="{{ session('check_out_date') }}" required >
    
                                    @error('check_out_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>
                         
                            <tr>
                                <td>Contract Duration</td>
                                <td> <input id="booking_term" name="booking_term" type="text" class="form-control" readonly></td>
                            </tr>
                            </table>
                            <hr>
                            <table class="table table-borderless">
                                 <tr>
                                    <td>Security Deposit</td>
                                    <td> <input onkeyup="select_term()"  id="sec_dep" name="sec_dep" type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Utilities Deposit</td>
                                    <td> <input onkeyup="select_term()"  id="util_dep" name="util_dep" value="2000" type="text" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td id="adv_rent_label">Advance Rent<small id="days_diff" class="form-text text-muted"> </small></td>
                                    <td> <input onkeyup="select_term()"  id="adv_rent" name="adv_rent" type="text" class="form-control"></td>
                                </tr>
                            </table>
                            <hr>
                            <table class="table table-borderless">
                                <tr>
                                    <td><h4>TOTAL</h4></td>
                                    <td id="total_amt" name="total_amt"> </td>
                                </tr>
                            </table>
                            <p class="text-right"> <button onclick="return confirm('Are you sure you want to perform this operation? ');" class="btn btn-primary" type="submit"><i class="fas fa-arrow-right"></i> &nbspCONFIRM BOOKING</button></p>
                    </div>    
                </div>
            </div>
        </div>
        </form>

</div>

<script>
    window.onload = function() {
        var check_in_date = document.getElementById('check_in_date').value;
        var check_out_date = document.getElementById('check_out_date').value;
        var building = document.getElementById('building').value;
        
        var booking = document.getElementById('adv_rent').value;

        var d1 = new Date(check_in_date);
        var d2 = new Date(check_out_date);
        var timeDiff = d2.getTime() - d1.getTime();
        var DaysDiff = timeDiff / (1000 * 3600 * 24);

    
        if(DaysDiff >= 180 ){
            document.getElementById('booking_term').value =   'LONG TERM' ;

            document.getElementById('adv_rent').value = document.getElementById('long_term_rent').value;
            document.getElementById('sec_dep').value = document.getElementById('long_term_rent').value;
            document.getElementById('util_dep').value = '2000';

        }
    
        if(DaysDiff < 180 && DaysDiff >=30){
            document.getElementById('booking_term').value =  'SHORT TERM' ;
           
            document.getElementById('adv_rent').value = document.getElementById('long_term_rent').value;
            document.getElementById('sec_dep').value = document.getElementById('long_term_rent').value;
            document.getElementById('util_dep').value = '2000';

        }
    
        if(DaysDiff < 30 ){
            document.getElementById('booking_term').value = 'TRANSIENT' ;

            document.getElementById('util_dep').value = '0';
            document.getElementById('sec_dep').value = '0';

            document.getElementById('adv_rent').value = document.getElementById('transient_rent').value * DaysDiff;
            document.getElementById('adv_rent_label').innerHTML = 'Transient Rent *' + DaysDiff;

        }
        
        document.getElementById('total_amt').innerHTML = (parseFloat(document.getElementById('sec_dep').value) +  parseFloat(document.getElementById('util_dep').value) +  parseFloat(document.getElementById('adv_rent').value)).toFixed(2);

        // if( (parseFloat(document.getElementById('sec_dep').value) +  parseFloat(document.getElementById('util_dep').value) +  parseFloat(document.getElementById('adv_rent').value)).toFixed(2) === 'NaN'){
        //     document.getElementById('total_amt').innerHTML = 'Oops! Something is wrong with the Input.'
        // }else{
           
        // }

    }

     function select_term(){  
        var check_in_date = document.getElementById('check_in_date').value;
        var check_out_date = document.getElementById('check_out_date').value;
        var building = document.getElementById('building').value;
        
        var booking = document.getElementById('adv_rent').value;

        var d1 = new Date(check_in_date);
        var d2 = new Date(check_out_date);
        var timeDiff = d2.getTime() - d1.getTime();
        var DaysDiff = timeDiff / (1000 * 3600 * 24);

    
        if(DaysDiff >= 180 ){
            document.getElementById('booking_term').value =   'LONG TERM' ;

            document.getElementById('adv_rent_label').innerHTML = 'Advance Rent';

            // document.getElementById('adv_rent').value = document.getElementById('long_term_rent').value;
            // document.getElementById('sec_dep').value = document.getElementById('long_term_rent').value;
            // document.getElementById('util_dep').value = '2000';

        }
    
        if(DaysDiff < 180 && DaysDiff >=30){
            document.getElementById('booking_term').value =  'SHORT TERM' ;
            document.getElementById('adv_rent_label').innerHTML = 'Advance Rent';

            // document.getElementById('adv_rent').value = document.getElementById('short_term_rent').value;
            // document.getElementById('sec_dep').value = document.getElementById('short_term_rent').value;
            // document.getElementById('util_dep').value = '2000';

        }
    
        if(DaysDiff < 30){
            document.getElementById('booking_term').value = 'TRANSIENT' ;

            document.getElementById('util_dep').value = '0';
            document.getElementById('sec_dep').value = '0';

            document.getElementById('adv_rent').value = document.getElementById('transient_rent').value * DaysDiff;
            document.getElementById('adv_rent_label').innerHTML = 'Transient Rent *' + DaysDiff;
        }

        document.getElementById('total_amt').innerHTML =  (parseFloat(document.getElementById('sec_dep').value) +  parseFloat(document.getElementById('util_dep').value) +  parseFloat(document.getElementById('adv_rent').value)).toFixed(2);

     }
        
    </script>
@endsection


