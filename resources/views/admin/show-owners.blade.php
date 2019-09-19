@extends('layouts.app')
@section('title', 'Owners')
@section('content')
<div class="container">
    <h4>Owners</h4>
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
                <td>{{ $owner->name }}</td>
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
