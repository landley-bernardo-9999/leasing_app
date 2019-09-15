@extends('layouts.app')
@section('title', 'Edit Booking')
@section('content')
@foreach ($booking as $booking)
<form id="form1" action="/residents/{{ $booking->res_id }}" method="POST">
    @method('put')
    {{ csrf_field() }}
</form>
<div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Resident Information</h4>
               <table class="table-borderless">
                   <tr>
                       <th>Full Name</th>
                   </tr>
                   <tr>
                       <td>
                           <input form="form1" type="text" name="res_full_name" class="form-control" value="{{ $booking->res_full_name }}">
                       </td>
                   </tr>
                  <tr>
                       <th>Email Address</th>
                   </tr>
                   <tr>
                       <td>
                            <input form="form1" type="text" name="res_email" class="form-control" value="{{ $booking->res_email }}">
                       </td>
                   </tr>
                    <tr>
                       <th>Mobile Number</th>
                   </tr>
                   <tr>
                       <td>
                            <input form="form1" type="text" name="res_mobile" class="form-control" value="{{ $booking->res_mobile }}">
                       </td>
                   </tr>
                    <tr>
                       <th>Country</th>
                   </tr>
                   <tr>
                       <td>
                            <input form="form1" type="text" name="res_country" class="form-control" value="{{ $booking->res_country }}">
                       </td>
                   </tr>
               </table>
            </div>
             <div class="col-md-4">
                <h4>Guardian Information</h4>
                <table class="table-borderless">
                    <tr>
                        <th>Full Name</th>    
                    </tr>
                    <tr>
                        <td>
                            <input form="form1" type="text" name="guardian_full_name" class="form-control" value="{{ $booking->guardian_full_name }}">
                        </td>    
                    </tr>   
                    <tr>
                        <th>Relationship</th>    
                    </tr>
                    <tr>
                        <td>
                            <input form="form1" type="text" name="relationship" class="form-control" value="{{ $booking->relationship }}">
                        </td>    
                    </tr>  
                    <tr>
                        <th>Mobile</th>    
                    </tr>
                    <tr>
                        <td>
                            <input form="form1" type="text" name="guardian_mobile" class="form-control" value="{{ $booking->guardian_mobile }}">
                        </td>    
                    </tr>  
                    <tr>
                        <th>Email</th>    
                    </tr>
                    <tr>
                        <td>
                            <input form="form1" type="text" name="guardian_email" class="form-control" value="{{ $booking->guardian_email }}">
                        </td>    
                    </tr>      
                </table>
            </div>
            <div class="col-md-4">
                <h4>Utilities Reading</h4>
                    <table class="table-borderless">
                        <tr>
                            <th>Move in</th>
                        </tr>
                        <tr>
                            <td>
                                Electric: <input form="form1" name="initial_electric_reading" type="text" class="form-control" value="{{ $booking->initial_electric_reading }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Water: <input form="form1" name="initial_water_reading"  type="text" class="form-control" value="{{ $booking->initial_water_reading }}">
                            </td>
                        </tr>
                        <tr>
                            <th>Move out</th>
                        </tr>
                        <tr>
                            <td>
                                Electric: <input form="form1" name="final_electric_reading"  type="text" class="form-control" value="{{ $booking->final_electric_reading }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Water: <input form="form1" name="final_water_reading"  type="text" class="form-control" value="{{ $booking->final_water_reading }}">
                            </td>
                        </tr>    
                    </table>
            </div>
        </div>  
        <a href="/rooms/{{ $booking->room_id }}" class="btn btn-warning" ><i class="fas fa-arrow-left"></i> Back</a>
        <button form="form1" onclick="return confirm('Are you sure you want to perform this operation? ');" class="btn btn-primary" type="submit" form="form2"><i class="fas fa-arrow-right"></i> Save</button>
</div>
@endforeach
@endsection
