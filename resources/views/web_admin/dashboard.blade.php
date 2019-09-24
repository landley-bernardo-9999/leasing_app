@extends('layouts.app')
@section('title', 'Dashboard' )
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Registered Users</h5>
                    <h1 class="card-text text-center">{{ $users->count() }}</h1>
                    <a href="/users" class="text-left">Open</a>
                </div>    
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Active Sessions</h5>
                    <h1 class="card-text text-center">{{ $sessions->count() }}</h1>
                    <a href="/active-sessions" class="text-center">Open</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
@endsection

