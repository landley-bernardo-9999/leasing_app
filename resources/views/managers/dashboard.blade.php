@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
   <div class="row">
    <h3>Moveout Requests</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Room No</th>
            <th>Duration</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <?php $row_no = 1; ?>
        <tbody>
        @foreach ($bookings as $booking)
        <tr>
            <th>{{ $row_no++ }}</th>
            <td><a href="bookings/{{ $booking->booking_id }}">{{ $booking->res_full_name }}</a></td>
            <td>{{ substr($booking->building, 0, 1).'-'.$booking->room_no.' '.substr($booking->room_wing, 0, 1) }}</td>
            <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d/m/Y').' - '.\Carbon\Carbon::parse($booking->check_out_date)->format('d/m/Y')}} </td>
            <td>
               @if($booking->approved_at != NULL)
                    <a href="#/" class="btn btn-dark"><i class="fas fa-check-double"></i> Approved</a> @ {{ \Carbon\Carbon::parse($booking->approved_at)->format('d/m/Y') }}
                @else
                <form action="/bookings/{{ $booking->booking_id }}" method="post">
                    @method('put')
                    {{ csrf_field() }}
                    <input type="hidden" name="action" id="action" value="approved">
                    <button class="btn btn-success" onclick="return confirm('Are you sure you want to perform this operation? ');" type="submit"><i class="fas fa-check"></i>&nbspApprove</button>
                </form>
               @endif  
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
   </div>
</div>
@include('footer')
@endsection

