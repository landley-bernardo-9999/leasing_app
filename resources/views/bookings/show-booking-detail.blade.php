@extends('layouts.app')
@section('title', 'View Booking')
@section('content')
@foreach ($booking as $booking)
<div class="container">
    <div class="row">
        <div class="col-md-10">
            
        </div>
        <div class="col-md-2">
            @if($booking->requested_at == NULL)
            <form action="/bookings/{{ $booking->booking_id }}" method="post">
                @method('put')
                {{ csrf_field() }}
                <input type="hidden" name="action" id="action" value="requested">
                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to perform this operation? ');" type="submit"><i class="fas fa-sign-out-alt"></i> Request for moveout</button>
            </form>
            @elseif($booking->approved_at == NULL)
                <a title="Waiting for the manager's approval." class="btn btn-warning" href="#"><i class="fas fa-sign-out-alt"></i> Request has been sent.</a>
            @elseif($booking->requested_at != NULL && $booking->approved_at != NULL)
                @if($booking->booking_status == 'ACTIVE' )
                    <a class="btn btn-primary" href="/bookings/{{ $booking->booking_id }}/edit"><i class="fas fa-sign-out-alt"></i>  Move Out</a>
                @else
                    <a class="btn btn-dark" href="#/"><i class="fas fa-sign-out-alt"></i>  MOVING OUT</a>
                @endif
            @endif
        </div>
    </div>
    
    <hr>
    
        <div class="row">
            <div class="col-md-4">
                <h4>Resident Information</h4>
               <table class="table-borderless">
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
                <h4>Booking Information</h4>
               <table class="table-borderless">
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
                           {{ $booking->building.' '.$booking->room_no.' '.$booking->room_wing }}
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
                <h4>Guardian Information</h4>
                <table class="table-borderless">
                        @foreach ($guardian as $guardian)
                            <tr>
                                <th>Full Name</th>
                            <tr>
                                <td>{{ $guardian->guardian_full_name }}</td>
                            </tr>
                            <tr>
                                <th>Relationship</th>
                            <tr>
                                <td>{{ $guardian->relationship }}</td>
                            </tr>
                             <tr>
                                <th>Mobile</th>
                            <tr>
                                <td>{{ $guardian->guardian_mobile }}</td>
                            </tr>
                             <tr>
                                <th>Email</th>
                            <tr>
                                <td>{{ $guardian->guardian_email }}</td>
                            </tr>
                        @endforeach
        
        
                        </table>
        
            </div>
        </div>  
        <hr>
        <div class="row">
         <h4>Utilities Reading</h4>
            <div class="col-md-12">
               <table class="table-borderless">
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
                <h4>Billing Information</h4>
                <small id="" class="form-text ">Running Balance: {{ number_format( $billings->sum('bil_amt') - $payments->sum('amt_paid'), 2) }}</small>
            
               <table class="table table-striped table-borderless">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Billing Date</th>
                    <th>Description</th>
                    <th>Amount</td>
                </tr>
                </thead>
                <?php $row_no = 1; ?>
                <tbody>
                @foreach ($billings as $billing)
               
                <tr>
                    <th>{{ $row_no++ }}</th>
                    <td>{{ \Carbon\Carbon::parse($billing->created_at)->format('d/m/Y') }}</td>
                    <td>{{ $billing->desc }}</td>
                    <td>{{ number_format($billing->bil_amt,2) }}</td> 
                </tr>
                @endforeach
                {{-- <tr>
                    <th>TOTAL</th>
                    <td></td>
                    <td></td>
                    <th>{{ number_format($billings->sum('bil_amt'), 2) }}</th>
                </tr> --}}
                </tbody>
            </table>
            </div>
        </div>
    @endforeach
</div>
@endsection
