@extends('layouts.app')
@section('title', 'Active Sessions')
@section('content')
<div class="container">
     <h4>Active Sessions</h4>
   
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>IP Address</th>
                <th>Role</th>
            </tr>
            </thead>
            <?php $row_no = 1; ?>
            <tbody>
            @foreach ($sessions as $session)
        
            <tr>
                <th>{{ $row_no++ }}</th>
                <td>{{ $session->name}}</a></td>
                <td>{{ $session->email }}</td>
                <td>{{ $session->mobile_number }}</td>
                <td>{{ $session->ip_address }}</td> 
                <td>{{ $session->role }}</td>
            </tr>
            
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
