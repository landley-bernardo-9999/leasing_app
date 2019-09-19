@extends('layouts.app')
@section('title', 'Owners')
@section('content')
<div class="container">
     <h4>Owners</h4>
    <div class="input-group md-form form-sm form-1 pl-0">
            <div class="input-group-prepend">
              <span class="input-group-text purple lighten-3" id="basic-text1"><i class="fas fa-search text-white"
                  aria-hidden="true"></i></span>
            </div>
            <form id="search_owner_form" action="/search/users" method="GET"></form>
            <input class="form-control my-0 py-1" type="text" placeholder="Enter owner info..." aria-label="Search" name="owner_info" value="{{ session('owner_info') }}"  form="search_owner_form">
    </div>
    <br>
    <div class="row">
       <div class="col-md-12">
            @if($owners->count() == 0)
            <p class="text-danger text-center">No owners found.</p>
            @else
            <p class="text-primary text-center">{{ $owners->count() }} owner/s found.</p>
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
                <th>Email</th>
                <th>Mobile</th>
                <th>Room No</th>
                <th>Status</th>
            </tr>
            </thead>
            <?php $row_no = 1; ?>
            <tbody>
            @foreach ($owners as $owner)
        
            <tr>
                <th>{{ $row_no++ }}</th>
                <td><a href="/users/{{ $owner->user_id }}">{{ $owner->name }}</a></td>
                <td>{{ $owner->email }}</td>
                <td>{{ $owner->mobile_number }}</td>
                <td>{{ substr($owner->building, 0, 1).'-'.$owner->room_no.' '.substr($owner->room_wing, 0, 1) }}</td>
                <td>{{ $owner->room_status }}</td>
            
            </tr>
            
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
