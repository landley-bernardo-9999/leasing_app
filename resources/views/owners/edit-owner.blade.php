@extends('layouts.app')
@section('title', $user->name )
@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                    <i class="far fa-edit"></i> Edit Account Information
               </div>   
               <form id="edit-user-form" action="/users/{{ $user->user_id }}" method="POST">
                @method('PUT')
                {{ csrf_field() }}
                </form>
               <div class="card-body">
                   <table class="table">
                        <p class="text-right" ><button form="edit-user-form" type="submit" onclick="return confirm('Are you sure you want to perform this operation? ');" class="btn btn-primary"><i class="fas fa-arrow-right"></i>&nbspSave</button></p>
                        <tr>
                            <th>Name:</th>
                            <td><input form="edit-user-form"  type="text" class="form-control" name="name" value="{{ $user->name }}" />
                                <input form="edit-user-form"  type="hidden" class="form-control" name="action" value="update_info" /></td>
                        </tr>
                         <tr>
                            <th>Username:</th>
                            <td><input form="edit-user-form"  type="text" class="form-control" name="username" value="{{ $user->username }}" /></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><input form="edit-user-form"  type="email" class="form-control" name="email" value="{{ $user->email }}" /></td>
                        </tr>
                        <tr>
                            <th>Mobile:</th>
                            <td><input form="edit-user-form"  type="text" class="form-control" name="mobile_number" value="{{ $user->mobile_number }}" /></td>
                        </tr>                       
                    </table>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

