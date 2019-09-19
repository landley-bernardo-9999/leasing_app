@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Rooms</h5>
                    <h1 class="card-text text-center">{{ $rooms->count() }}</h1>
                    <a href="/bookings" class="text-center">Book</a>
                    <a href="/rooms" class="text-center">Manage</a>
                </div>    
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Bookings</h5>
                    <h1 class="card-text text-center">{{ $bookings->count() }}</h1>
                    <a href="/residents" class="text-center">Open</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Owners</h5>
                    <h1 class="card-text text-center">{{ $owners->count() }}</h1>
                    <a href="/owners" class="text-center">Open</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <h4>Dashboard</h4>
        </div>
    </div>
</div>
@endsection
