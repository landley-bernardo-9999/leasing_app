@extends('layouts.app')
@section('title', 'Registered Users')
@section('content')
<div class="container">
     <h4>Registered Users</h4>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Role</th>
            </tr>
            </thead>
            <?php $row_no = 1; ?>
            <tbody>
            @foreach ($users as $user)
        
            <tr>
                <th>{{ $row_no++ }}</th>
                <td><a href="/users/{{ $user->user_id }}">{{ $user->name }}</a></td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile_number }}</td>
                <td>{{ $user->role }}</td>
            </tr>
            
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
