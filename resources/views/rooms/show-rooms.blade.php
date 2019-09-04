@extends('layouts.app')
@section('title', 'Rooms')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <i class="fas fa-home fa-1x btn btn-success"></i>
                Occupied
        </div>      
        <div class="col-md-2">
            <i class="fas fa-home fa-1x btn btn-danger"></i>
                    Vacant
        </div>
        <div class="col-md-2">
            <i class="fas fa-home fa-1x btn btn-warning"></i>
                    Reserved
        </div>
         <div class="col-md-2">
            <i class="fas fa-home fa-1x btn btn-primary"></i>
                    Rectification 
        </div>
    </div> 
    <hr>
    <div class="row">
            <h1>Harvard</h1>
              <div class="col-md-12">
                    <p>{{ $rooms->count() }} units under leasing.</p>
                                @foreach ($rooms->chunk(17) as $chunk)
                <div class="row">
                    @foreach ($chunk as $room)
                    @if($room->room_status === 'OCCUPIED')
                        <a href="/rooms/{{$room->room_id}}" class="btn btn-success" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{$room->room_no}}</p>
                            </div>
                        </a>  
                    @elseif($room->room_status === 'VACANT')
                        <a href="/rooms/{{$room->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{$room->room_no}}</p>
                            </div>
                        </a> 
                    @elseif($room->room_status === 'RESERVED')
                        <a href="/rooms/{{$room->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{$room->room_no}}</p>
                            </div>
                        </a> 
                    @elseif($room->room_status === 'RECTITICATION')
                        <a href="/rooms/{{$room->room_id}}" class="btn btn-primary" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{$room->room_no}}</p>
                            </div>
                        </a> 
                    @endif
                    <span style="visibility: hidden">||</span> 
                    @endforeach
                </div>
                <br>
                @endforeach    
              </div>
    </div>
</div>
@endsection


