@extends('layouts.app')
@section('title', 'View Booking')
@section('content')
<div class="container">
    @foreach ($booking as $booking)
        <div class="row">
            <div class="col-md-4">
               <table class="table-borderless">
                   <tr>
                       <th><h4>Resident Information</h4></th>
                   </tr>
                   <tr>
                       <th>Full Name</th>
                   </tr>
                   <tr>
                       <td>
                           {{ $booking->res_full_name }}
                       </td>
                   </tr>
                  <tr>
                       <th>Email Address</th>
                   </tr>
                   <tr>
                       <td>
                           {{ $booking->res_email }}
                       </td>
                   </tr>
                    <tr>
                       <th>Mobile Number</th>
                   </tr>
                   <tr>
                       <td>
                           {{ $booking->res_mobile }}
                       </td>
                   </tr>
                    <tr>
                       <th>Country</th>
                   </tr>
                   <tr>
                       <td>
                           {{ $booking->res_country }}
                       </td>
                   </tr>
               </table>
            </div>
            <div class="col-md-4">
               <table class="table-borderless">
                   <tr>
                       <th><h4>Booking Information</h4></th>
                   </tr>
                   <tr>
                       <th>Status</th>
                   </tr>
                   <tr>
                       <td>
                           {{ $booking->booking_status }}
                       </td>
                   </tr>
                   <tr>
                       <th>
                           Room No
                       </th>
                   </tr>
                   <tr>
                       <td>
                           {{ $booking->room_no.' '.$booking->room_wing }}
                       </td>
                   </tr>
                   <tr>
                       <th>Check In-Check Out</th>
                   </tr>
                   <tr>
                       <td>
                            {{ \Carbon\Carbon::parse($booking->check_in_date)->format('d/m/Y').' - '.\Carbon\Carbon::parse($booking->check_out_date)->format('d/m/Y')}} 
                       </td>
                   </tr>
                   <tr>
                       <th>Term</th>
                   </tr>
                   <tr>
                       <td>
                           {{ $booking->booking_term }}
                       </td>
                   </tr>
               </table>
            </div>
             <div class="col-md-4">
               <table class="table-borderless">
                   <tr>
                       <th><h4>Utilities Reading</h4></th>
                   </tr>
                   <tr>
                       <th>Move in</th>
                   </tr>
                   <tr>
                       <td>
                           Electric: {{ $booking->initial_electric_reading }}
                       </td>
                   </tr>
                   <tr>
                       <td>
                           Water: {{ $booking->initial_water_reading }}
                       </td>
                   </tr>
                   <tr>
                       <th>Move out</th>
                   </tr>
                   <tr>
                       <td>
                           Electric: {{ $booking->final_electric_reading }}
                       </td>
                   </tr>
                   <tr>
                       <td>
                           Water: {{ $booking->final_water_reading }}
                       </td>
                   </tr>
                 
               </table>
            </div>
        </div>
        <hr>
        <div class="row">
             <div class="col-md-12">
               <table class="table-borderless">
                   <tr>
                       <th><h4>Billing Information</h4></th>
                   </tr>
                   
               </table>
            </div>
        </div>
    @endforeach
</div>
@endsection