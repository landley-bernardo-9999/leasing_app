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
                    <a href="/bookings" class="text-center">Open</a>
                </div>    
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Residents</h5>
                    <h1 class="card-text text-center">{{ $residents->count() }}</h1>
                    <a href="#" class="text-center">Open</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Owners</h5>
                    <h1 class="card-text text-center">{{ $owners->count() }}</h1>
                    <a href="#" class="text-center">Open</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
