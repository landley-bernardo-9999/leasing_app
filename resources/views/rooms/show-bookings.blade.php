@extends('layouts.app')
@section('title', 'Bookings')
@section('content')
<div class="container">
    <div class="row">
            <p>{{ $room->building.' '.$room->room_no.' '.$room->room_wing }}</p>
            @if(auth()->user()->role === 'admin')
                <table class="table">
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Status</td>
                        <td>Duration</td>
                        <td></td>
                    </tr>
                    <?php $row_no = 1; ?>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $row_no++ }}</td>
                        <td>{{ $booking->res_full_name }}</td>
                        <td>{{ $booking->res_email }}</td>
                        <td>{{ $booking->booking_status }}</td>
                        <td>{{ $booking->booking_term }}</td>
                        <td>
                            <div class="input-group">
                                <a href="/bookings/{{ $booking->booking_id }}" class="btn btn-primary">View</a> <span style="visibility: hidden">|</span> 
                                <a href="/bookings/{{ $booking->booking_id }}/edit" class="btn btn-warning">Edit</a> <span style="visibility: hidden">|</span> 
                                <form method="POST" action="/residents/{{ $booking->res_id_foreign }}">
                                    @method('delete')
                                    {{ csrf_field() }}
                                    <input type="hidden" name="room_id" id="room_id" value="{{ $room->room_id }}">
                                    <button type="submit" onclick="return confirm('Are you sure you want to perform this operation? ');" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                
            @elseif(auth()->user()->role === 'owner')
            <table class="table">
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Check In- Check out</td>
                        <td>Status</td>
                        <td>Duration</td>
                        <td>Move Out Reason</td>
                    </tr>
                    <?php $row_no = 1; ?>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $row_no++ }}</td>
                        <td>Resident Name</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d/m/Y').' - '.\Carbon\Carbon::parse($booking->check_out_date)->format('d/m/Y')}} </td>
                        <td>{{ $booking->booking_status }}</td>
                        <td>{{ $booking->booking_term }}</td>
                        <td>{{ $booking->reason_for_moving_out }}</td>
                    </tr>
                    @endforeach
                </table>
            @endif
           
        </div>
</div>
@endsection
