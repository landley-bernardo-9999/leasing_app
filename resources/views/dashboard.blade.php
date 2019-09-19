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
                    <a href="/bookings" class="text-left">Book</a>
                    <a href="/rooms" class="text-right">Manage</a>
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
                    <a href="/users" class="text-center">Open</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <h4>Dashboard</h4>
            <table class="table">
                    <tr>
                        <th></th>
                        <td>Occupied</td>
                        <td>Vacant</td>
                        <td>Reserved</td>
                        <td>Rectification</td>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>Harvard</td>
                        <td>{{ $occupied_rooms_harvard }}</td>
                        <td>{{ $vacant_rooms_harvard }}</td>
                        <td>{{ $reserved_rooms_harvard }}</td>
                        <td>{{ $rectification_rooms_harvard }}</td> 
                        <th>{{ $occupied_rooms_harvard + $vacant_rooms_harvard + $reserved_rooms_harvard + $rectification_rooms_harvard }}</th>
                    </tr>
                     <tr>
                        <td>Princeton</td>
                        <td>{{ $occupied_rooms_princeton }}</td>
                        <td>{{ $vacant_rooms_princeton }}</td>
                        <td>{{ $reserved_rooms_princeton }}</td>
                        <td>{{ $rectification_rooms_princeton }}</td>
                        <th>{{ $occupied_rooms_princeton + $vacant_rooms_princeton + $reserved_rooms_princeton + $rectification_rooms_princeton }}</th>
                    </tr>
                     <tr>
                        <td>Wharton</td>
                        <td>{{ $occupied_rooms_wharton }}</td>
                        <td>{{ $vacant_rooms_wharton }}</td>
                        <td>{{ $reserved_rooms_wharton }}</td>
                        <td>{{ $rectification_rooms_wharton }}</td>
                        <th>{{ $occupied_rooms_wharton + $vacant_rooms_wharton + $reserved_rooms_wharton + $rectification_rooms_wharton }}</th>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th>{{ $occupied_rooms_harvard + $occupied_rooms_princeton + $occupied_rooms_wharton }}</th>
                        <th>{{ $vacant_rooms_harvard + $vacant_rooms_princeton + $vacant_rooms_wharton }}</th>
                        <th>{{ $reserved_rooms_harvard + $reserved_rooms_princeton + $reserved_rooms_wharton }}</th>
                        <th>{{ $rectification_rooms_harvard + $rectification_rooms_princeton + $rectification_rooms_wharton }}</th>
                        <th>{{ $rooms->count() }}</th>
                    </tr>
                </table>
        </div>
    </div>
</div>
@endsection
