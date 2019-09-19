@extends('layouts.app')
@section('title', 'Bookings')
@section('content')
<div class="container">
    <h4>Bookings</h4>
    <div class="input-group md-form form-sm form-1 pl-0">
            <div class="input-group-prepend">
              <span class="input-group-text purple lighten-3" id="basic-text1"><i class="fas fa-search text-white"
                  aria-hidden="true"></i></span>
            </div>
            <form id="search_resident_form" action="/search/residents" method="GET"></form>
            <input class="form-control my-0 py-1" type="text" placeholder="Enter resident info..." aria-label="Search" name="resident_info" value="{{ session('resident_info') }}"  form="search_resident_form">
    </div>
    <br>
    <div class="row">
       <div class="col-md-12">
            @if($residents->count() == 0)
            <p class="text-danger text-center">No bookings found.</p>
            @else
            <p class="text-primary text-center">{{ $residents->count() }} booking/s found.</p>
            @endif
    </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
                    <td>{{ substr($resident->building, 0, 1).'-'.$resident->room_no.' '.substr($resident->room_wing, 0, 1) }}</td>
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
    </div>
</div>
@endsection
