@extends('layouts.app')
@section('title', 'Bookings')
@section('content')
<div class="container">
    <div class="row">
            <a href="#/" data-toggle="modal" data-target="#exampleModalLong">
                {{ $room->building.' '.$room->room_no.' '.$room->room_wing }}
            </a>
            @if(auth()->user()->role === 'admin')
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Contract</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php $row_no = 1; ?>
                    <tbody>
                    @foreach ($bookings as $booking)
                   
                    <tr>
                        <th>{{ $row_no++ }}</th>
                        <td>{{ $booking->res_full_name }}</td>
                        <td>{{ $booking->res_mobile }}</td>
                        <td>{{ $booking->booking_status }}</td>
                        <td>{{ $booking->booking_term }}</td>
                        <td>
                            <div class="input-group">
                                <a href="/bookings/{{ $booking->booking_id }}" class="btn btn-primary"><i class="far fa-eye"></i> View</a> <span style="visibility: hidden">|</span> 
                                <a href="/residents/{{ $booking->res_id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a> <span style="visibility: hidden">|</span> 
                                <form method="POST" action="/residents/{{ $booking->res_id_foreign }}">
                                    @method('delete')
                                    {{ csrf_field() }}
                                    <input type="hidden" name="room_id" id="room_id" value="{{ $room->room_id }}">
                                    <button type="submit" onclick="return confirm('Are you sure you want to perform this operation? ');" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    
                    @endforeach
                    </tbody>
                </table>
                
            @elseif(auth()->user()->role === 'owner')
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Check In- Check out</td>
                    <th>Status</th>
                    <th>Contract  </th>
                    <th>Move Out Reason</th>
                </tr>
                </thead>
                <?php $row_no = 1; ?>
                <tbody>
                @foreach ($bookings as $booking)
               
                <tr>
                    <td>{{ $row_no++ }}</td>
                    <td>Resident Name</td>
                    <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d/m/Y').' - '.\Carbon\Carbon::parse($booking->check_out_date)->format('d/m/Y')}} </td>
                    <td>{{ $booking->booking_status }}</td>
                    <td>{{ $booking->booking_term }}</td>
                    <td>
                      @if($booking->reason_for_moving_out == NULL)
                        NA
                      @else
                        {{ $booking->reason_for_moving_out }}
                      @endif
                    </td>
                    </td>
                </tr>
                
                @endforeach
                </tbody>
            </table>
            @endif
           
        </div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">ROOM INFORMATION</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                    <tr>
                      <th>Room No</th>
                      <td>{{$room->room_no.' '.$room->room_wing }}</td>
                    </tr>
                    <tr>
                      <th>Enrollment Date</th>
                      <td>{{ $room->enrollment_date }}</td>
                    </tr>
                    @foreach ($owner as $owner)
                    <tr>
                      <th>Owner</th>
                      <td>{{ $owner->name }}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <th>Floor No</th> 
                      <td>{{ $room->floor_no}}</td>
                    </tr>
                    <tr>
                      <th>Building</th> 
                      <td>{{ $room->building}}</td>
                    </tr>
                    <tr>
                      <th>Site</th> 
                      <td>{{ $room->site}}</td>
                    </tr>
                    <tr>
                      <th>Dimension</th> 
                      <td>{{ $room->room_size}} sqm</td>
                    </tr>
                    <tr>
                      <th>Type of bed</th> 
                      <td>{{ $room->type_of_bed}}</td>
                    </tr>
                    <tr>
                      <th>Status</th> 
                      <td>{{ $room->room_status}}</td>
                    </tr>
                    <tr>
                      <th>Long Term Rent</th> 
                      <td>{{ number_format($room->long_term_rent,2) }}</td>
                    </tr>
                    <tr>
                      <th>Short Term Rent</th> 
                      <td>{{ number_format($room->short_term_rent,2) }}</td>
                    </tr>
                    <tr>
                      <th>Transient (per day)</th> 
                      <td>{{ number_format($room->transient_rent,2) }}</td>
                    </tr>
                    <tr>
                      <th>Note</th> 
                      <td>{{ $room->room_description}}</td>
                    </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection
