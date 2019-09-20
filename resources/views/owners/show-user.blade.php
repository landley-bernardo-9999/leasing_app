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
                        <p class="text-right">
                      <a href="/users/{{ $user->user_id }}/edit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-key"></i> Change Password</a> <a href="/users/{{ $user->user_id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a></p>
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
                    <form method="POST" action="/users/{{ $user->user_id }}">
                      @method('delete')
                      {{ csrf_field() }}
                      <button type="submit" onclick="return confirm('Are you sure you want to perform this operation? ');" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
   
   <div class="row">
       <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="update_pass" action="/users/{{ $user->user_id }}" method="POST">
                @method('PUT')
                {{ csrf_field() }}
            </form>
        {{-- <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Current Password</label>
            <div class="col-sm-8">
              <input form="update_pass" name="current_pass" type="text" class="form-control" id="inputPassword" placeholder="" required>
              
            </div>
        </div> --}}
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">New Password</label>
            <div class="col-sm-8">
              <input form="update_pass" name="new_pass" type="text" class="form-control" id="inputPassword" placeholder="" required>
              <input form="update_pass" type="hidden" name="action" value="update_pass">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Confirm New Password</label>
            <div class="col-sm-8">
              <input form="update_pass" name="confirm_new_pass" type="text" class="form-control" id="inputPassword" placeholder="" required>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button form="update_pass" type="submit" class="btn btn-primary"  onclick="return confirm('Are you sure you want to perform this operation? ');">Save changes</button>
      </div>
    </div>
  </div>
</div>
   </div>
</div>
@endsection

