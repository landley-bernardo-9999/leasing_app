@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>Condominium Corporation Updates</b>
                </div>
                <div class="card-body">
                    <ul>
                        <li>
                            The propose increase for the condominium has been concluded and the new condo dues will take effect on June 2019.
                        </li>
                         <li>
                           2nd General Assembly for North Cambridge Unit Owners was held June 01, 2019 on Princeton Ammenity Building. 
                        </li>
                        <li>
                           1st General Assembly for North Cambridge Unit Owners was held March 09, 2019 on Princeton Ammenity Building.
                        </li>    
                        <li>
                            Schedule for remittance is every 2nd week of the month. For inquiries and other concerns regarding remittance please get in touch with the Billing Department.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <b>My Rooms</b>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Room No</td>
                            <td>Status</td>
                        </tr>
                        @foreach ($rooms as $room)
                        <tr>
                            <td><a href="/rooms/{{ $room->room_id }}">{{ $room->room_no.' '.$room->room_wing }}</td>
                            <td>{{ $room->room_status }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>Directories</b>
                </div>
                <div class="card-body">
                    <table class="table">
                       <tr>
                           <th>PROPERTY MANAGEMENT OFFICE</th>
                           <th></th>
                       </tr>
                       <tr>
                           <td>ADMIN</td>
                           <td>0912-6976-504/(074)246-0548</td>
                       </tr>
                       <tr>
                           <td>TREASURY</td>
                           <td>0998-465-8645</td>
                       </tr>
                       <tr>
                           <td>BILLING</td>
                           <td>0955-702-0374</td>
                       </tr>
                        <tr>
                           <th>LEASING DEPARTMENT OFFICE</th>
                           <th></th>
                       </tr>
                       <tr>
                           <td>NORTH CAMBRIDGE ADMIN</td>
                           <td>0946-162-0033</td>
                       </tr>
                       <tr>
                           <td>COURTYARDS ADMIN</td>
                           <td>0996-138-0775</td>
                       </tr>
                       <tr>
                           <td>BILLING</td>
                           <td>0946-757-6159/0906-875-8142</td>
                       </tr>
                       <tr>
                           <th>EMERGENCY CONTACT NUMBER</th>
                       </tr>
                       <tr>
                           <td>BENGUET POLICE PROVINCIAL OFFICE</td>
                           <td>09985987780/074-442-2222</td>
                       </tr>
                       <tr>
                           <td>BAGUIO FIRE STATION</td>
                           <td>074-422-1131</td>
                       </tr>
                       <tr>
                           <td>EMERGENCY MEDICAL SERVICE</td>
                           <td>0925-493-4851/074-442-1911</td>
                       </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
