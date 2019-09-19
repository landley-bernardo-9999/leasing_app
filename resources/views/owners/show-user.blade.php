@extends('layouts.app')
@section('title', $user->name )
@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                    <i class="fas fa-user-circle"></i>  User Account Information
               </div>   
               <div class="card-body">
                   <table class="table">
                        <p class="text-right"><a href="/users/{{ $user->user_id }}/edit" class="btn btn-danger"><i class="fas fa-key"></i> Change Password</a> <a href="/users/{{ $user->user_id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a></p>
                        <tr>
                            <th>Name:</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Role:</th>
                            <td>{{ $user->role }}</td>
                        </tr>
                         <tr>
                            <th>Username:</th>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Mobile:</th>
                            <td>{{ $user->mobile_number }}</td>
                        </tr>                       
                    </table>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

