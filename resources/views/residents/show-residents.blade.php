@extends('layouts.app')
@section('title', 'Bookings')
@section('content')
<div class="container">
    <h4>Bookings</h4>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Room No</th>
            <th>Status</th>
            <th>Contact</th>
            <th></th>
        </tr>
        </thead>
        <?php $row_no = 1; ?>
        <tbody>
        @foreach ($residents as $resident)
       
        <tr>
            <th>{{ $row_no++ }}</th>
            <td>{{ $resident->res_full_name }}</td>
            <td>{{ $resident->res_mobile }}</td>
            <td>{{ $resident->room_no.' '.$resident->room_wing }}</td>
            <td>{{ $resident->booking_status }}</td>
            <td>{{ $resident->booking_term }}</td>
            <td>
                <div class="input-group">
                    <a href="/bookings/{{ $resident->booking_id }}" class="btn btn-primary"><i class="far fa-eye"></i> View</a> <span style="visibility: hidden">|</span> 
                    <a href="/residents/{{ $resident->res_id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a> <span style="visibility: hidden">|</span> 
                    <form method="POST" action="/residents/{{ $resident->res_id_foreign }}">
                        @method('delete')
                        {{ csrf_field() }}
                        <input type="hidden" name="room_id" id="room_id" value="{{ $resident->room_id }}">
                        <button type="submit" onclick="return confirm('Are you sure you want to perform this operation? ');" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        
        @endforeach
        </tbody>
    </table>
</div>
@endsection
