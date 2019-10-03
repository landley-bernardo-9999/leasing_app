@extends('layouts.app')
@section('title', 'Rooms')
@section('content')
<div class="container text-center">
    <div class="row">
        <div class="col-md-3">
            <i class="fas fa-home fa-1x btn btn-success"></i>
                Occupied
        </div>      
        <div class="col-md-3">
            <i class="fas fa-home fa-1x btn btn-danger"></i>
                    Vacant
        </div>
        <div class="col-md-3">
            <i class="fas fa-home fa-1x btn btn-warning"></i>
                    Reserved
        </div>
         <div class="col-md-3">
            <i class="fas fa-home fa-1x btn btn-dark"></i>
                    Under Rectification 
        </div>
    </div> 
    <hr>
    <br>
    <div class="row">
            <h5>Harvard</h5>
              <div class="col-md-12">
                    <p>Lower Ground Floor</p>
                    <div class="row">
                        @foreach ($harvard_lower_ground_floor as $harvard_lower_ground_floor)
                        @if($harvard_lower_ground_floor->room_status === 'OCCUPIED')
                            <a href="/rooms/{{$harvard_lower_ground_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                                <i class="fas fa-home fa-2x"></i>
                                <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                    <p style="font-size: 11px">{{ substr($harvard_lower_ground_floor->building, 0, 1).'-'.$harvard_lower_ground_floor->room_no.' '.substr($harvard_lower_ground_floor->room_wing, 0, 1)}}</p>
                                </div>
                            </a>  
                        @elseif($harvard_lower_ground_floor->room_status === 'VACANT')
                            <a href="/rooms/{{$harvard_lower_ground_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                                <i class="fas fa-home fa-2x"></i>
                                <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                    <p style="font-size: 11px">{{ substr($harvard_lower_ground_floor->building, 0, 1).'-'.$harvard_lower_ground_floor->room_no.' '.substr($harvard_lower_ground_floor->room_wing, 0, 1)}}</p>
                                </div>
                            </a> 
                        @elseif($harvard_lower_ground_floor->room_status === 'RESERVED')
                            <a href="/rooms/{{$harvard_lower_ground_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                                <i class="fas fa-home fa-2x"></i>
                                <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                    <p style="font-size: 11px">{{ substr($harvard_lower_ground_floor->building, 0, 1).'-'.$harvard_lower_ground_floor->room_no.' '.substr($harvard_lower_ground_floor->room_wing, 0, 1)}}</p>
                                </div>
                            </a> 
                        @elseif($harvard_lower_ground_floor->room_status === 'RECTITICATION')
                            <a href="/rooms/{{$harvard_lower_ground_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                                <i class="fas fa-home fa-2x"></i>
                                <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                    <p style="font-size: 11px">{{ substr($harvard_lower_ground_floor->building, 0, 1).'-'.$harvard_lower_ground_floor->room_no.' '.substr($harvard_lower_ground_floor->room_wing, 0, 1)}}</p>
                                </div>
                            </a> 
                        @endif
                        <span style="visibility: hidden">||</span> 
                        @endforeach
                    </div>
                    <br>  
                    <p>Upper Ground Floor</p>
                    <div class="row">
                        @foreach ($harvard_upper_ground_floor as $harvard_upper_ground_floor)
                        @if($harvard_upper_ground_floor->room_status === 'OCCUPIED')
                            <a href="/rooms/{{$harvard_upper_ground_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                                <i class="fas fa-home fa-2x"></i>
                                <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                    <p style="font-size: 11px">{{ substr($harvard_upper_ground_floor->building, 0, 1).'-'.$harvard_upper_ground_floor->room_no.' '.substr($harvard_upper_ground_floor->room_wing, 0, 1)}}</p>
                                </div>
                            </a>  
                        @elseif($harvard_upper_ground_floor->room_status === 'VACANT')
                            <a href="/rooms/{{$harvard_upper_ground_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                                <i class="fas fa-home fa-2x"></i>
                                <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                    <p style="font-size: 11px">{{ substr($harvard_upper_ground_floor->building, 0, 1).'-'.$harvard_upper_ground_floor->room_no.' '.substr($harvard_upper_ground_floor->room_wing, 0, 1)}}</p>
                                </div>
                            </a> 
                        @elseif($harvard_upper_ground_floor->room_status === 'RESERVED')
                            <a href="/rooms/{{$harvard_upper_ground_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                                <i class="fas fa-home fa-2x"></i>
                                <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                    <p style="font-size: 11px">{{ substr($harvard_upper_ground_floor->building, 0, 1).'-'.$harvard_upper_ground_floor->room_no.' '.substr($harvard_upper_ground_floor->room_wing, 0, 1)}}</p>
                                </div>
                            </a> 
                        @elseif($harvard_upper_ground_floor->room_status === 'RECTITICATION')
                            <a href="/rooms/{{$harvard_upper_ground_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                                <i class="fas fa-home fa-2x"></i>
                                <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                    <p style="font-size: 11px">{{ substr($harvard_upper_ground_floor->building, 0, 1).'-'.$harvard_upper_ground_floor->room_no.' '.substr($harvard_upper_ground_floor->room_wing, 0, 1)}}</p>
                                </div>
                            </a> 
                        @endif
                        <span style="visibility: hidden">||</span> 
                        @endforeach
                    </div>
                    <br>  
                   <p>Ground Floor</p>
                <div class="row">
                    @foreach ($harvard_ground_floor as $harvard_ground_floor)
                    @if($harvard_ground_floor->room_status === 'OCCUPIED')
                        <a href="/rooms/{{$harvard_ground_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_ground_floor->building, 0, 1).'-'.$harvard_ground_floor->room_no.' '.substr($harvard_ground_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a>  
                    @elseif($harvard_ground_floor->room_status === 'VACANT')
                        <a href="/rooms/{{$harvard_ground_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_ground_floor->building, 0, 1).'-'.$harvard_ground_floor->room_no.' '.substr($harvard_ground_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_ground_floor->room_status === 'RESERVED')
                        <a href="/rooms/{{$harvard_ground_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_ground_floor->building, 0, 1).'-'.$harvard_ground_floor->room_no.' '.substr($harvard_ground_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_ground_floor->room_status === 'RECTITICATION')
                        <a href="/rooms/{{$harvard_ground_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_ground_floor->building, 0, 1).'-'.$harvard_ground_floor->room_no.' '.substr($harvard_ground_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @endif
                    <span style="visibility: hidden">||</span> 
                    @endforeach
                </div>
                <br>  
                <p>2nd Floor</p>
                <div class="row">
                    @foreach ($harvard_second_floor as $harvard_second_floor)
                    @if($harvard_second_floor->room_status === 'OCCUPIED')
                        <a href="/rooms/{{$harvard_second_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_second_floor->building, 0, 1).'-'.$harvard_second_floor->room_no.' '.substr($harvard_second_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a>  
                    @elseif($harvard_upper_ground_floor->room_status === 'VACANT')
                        <a href="/rooms/{{$harvard_second_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_second_floor->building, 0, 1).'-'.$harvard_second_floor->room_no.' '.substr($harvard_second_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_second_floor->room_status === 'RESERVED')
                        <a href="/rooms/{{$harvard_second_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_second_floor->building, 0, 1).'-'.$harvard_second_floor->room_no.' '.substr($harvard_second_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_second_floor->room_status === 'RECTITICATION')
                        <a href="/rooms/{{$harvard_second_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_second_floor->building, 0, 1).'-'.$harvard_second_floor->room_no.' '.substr($harvard_second_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @endif
                    <span style="visibility: hidden">||</span> 
                    @endforeach
                </div>
                <br>
                <p>3rd Floor</p>
                <div class="row">
                    @foreach ($harvard_third_floor as $harvard_third_floor)
                    @if($harvard_third_floor->room_status === 'OCCUPIED')
                        <a href="/rooms/{{$harvard_third_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_third_floor->building, 0, 1).'-'.$harvard_third_floor->room_no.' '.substr($harvard_third_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a>  
                    @elseif($harvard_third_floor->room_status === 'VACANT')
                        <a href="/rooms/{{$harvard_third_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_third_floor->building, 0, 1).'-'.$harvard_third_floor->room_no.' '.substr($harvard_third_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_third_floor->room_status === 'RESERVED')
                        <a href="/rooms/{{$harvard_third_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_third_floor->building, 0, 1).'-'.$harvard_third_floor->room_no.' '.substr($harvard_third_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_third_floor->room_status === 'RECTITICATION')
                        <a href="/rooms/{{$harvard_third_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_third_floor->building, 0, 1).'-'.$harvard_third_floor->room_no.' '.substr($harvard_third_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @endif
                    <span style="visibility: hidden">||</span> 
                    @endforeach
                </div>
                <br>
                <p>4th Floor</p>
                <div class="row">
                    @foreach ($harvard_fourth_floor as $harvard_fourth_floor)
                    @if($harvard_fourth_floor->room_status === 'OCCUPIED')
                        <a href="/rooms/{{$harvard_fourth_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_fourth_floor->building, 0, 1).'-'.$harvard_fourth_floor->room_no.' '.substr($harvard_fourth_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a>  
                    @elseif($harvard_fourth_floor->room_status === 'VACANT')
                        <a href="/rooms/{{$harvard_fourth_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_fourth_floor->building, 0, 1).'-'.$harvard_fourth_floor->room_no.' '.substr($harvard_fourth_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_fourth_floor->room_status === 'RESERVED')
                        <a href="/rooms/{{$harvard_fourth_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_fourth_floor->building, 0, 1).'-'.$harvard_fourth_floor->room_no.' '.substr($harvard_fourth_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_fourth_floor->room_status === 'RECTITICATION')
                        <a href="/rooms/{{$harvard_fourth_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_fourth_floor->building, 0, 1).'-'.$harvard_fourth_floor->room_no.' '.substr($harvard_fourth_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @endif
                    <span style="visibility: hidden">||</span> 
                    @endforeach
                </div>
                <br>
                <p>5th Floor</p>
                <div class="row">
                    @foreach ($harvard_fifth_floor as $harvard_fifth_floor)
                    @if($harvard_fifth_floor->room_status === 'OCCUPIED')
                        <a href="/rooms/{{$harvard_fifth_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_fifth_floor->building, 0, 1).'-'.$harvard_fifth_floor->room_no.' '.substr($harvard_fifth_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a>  
                    @elseif($harvard_fifth_floor->room_status === 'VACANT')
                        <a href="/rooms/{{$harvard_fifth_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_fifth_floor->building, 0, 1).'-'.$harvard_fifth_floor->room_no.' '.substr($harvard_fifth_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_fifth_floor->room_status === 'RESERVED')
                        <a href="/rooms/{{$harvard_fifth_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_fifth_floor->building, 0, 1).'-'.$harvard_fifth_floor->room_no.' '.substr($harvard_fifth_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_fifth_floor->room_status === 'RECTITICATION')
                        <a href="/rooms/{{$harvard_fifth_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_fifth_floor->building, 0, 1).'-'.$harvard_fifth_floor->room_no.' '.substr($harvard_fifth_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @endif
                    <span style="visibility: hidden">||</span> 
                    @endforeach
                </div>
                <br>
                <p>6th Floor</p>
                <div class="row">
                    @foreach ($harvard_sixth_floor as $harvard_sixth_floor)
                    @if($harvard_sixth_floor->room_status === 'OCCUPIED')
                        <a href="/rooms/{{$harvard_sixth_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_sixth_floor->building, 0, 1).'-'.$harvard_sixth_floor->room_no.' '.substr($harvard_sixth_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a>  
                    @elseif($harvard_sixth_floor->room_status === 'VACANT')
                        <a href="/rooms/{{$harvard_sixth_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_sixth_floor->building, 0, 1).'-'.$harvard_sixth_floor->room_no.' '.substr($harvard_sixth_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_sixth_floor->room_status === 'RESERVED')
                        <a href="/rooms/{{$harvard_sixth_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($harvard_sixth_floor->building, 0, 1).'-'.$harvard_sixth_floor->room_no.' '.substr($harvard_sixth_floor->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_sixth_floor->room_status === 'RECTITICATION')
                        <a href="/rooms/{{$harvard_sixth_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px"></p>
                            </div>
                        </a> 
                    @endif
                    <span style="visibility: hidden">||</span> 
                    @endforeach
                </div>
                <br>             
              </div>
    </div>
    <hr>
    <div class="row">
        <h5>Princeton</h5>
          <div class="col-md-12"> 
              <p>3rd Lower Basement</p>
                <div class="row">
                    @foreach ($princeton_third_basement as $princeton_third_basement)
                    @if($princeton_third_basement->room_status === 'OCCUPIED')
                        <a href="/rooms/{{$princeton_third_basement->room_id}}" class="btn btn-success" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($princeton_third_basement->building, 0, 1).'-'.$princeton_third_basement->room_no.' '.substr($princeton_third_basement->room_wing, 0, 1)}}</p>
                            </div>
                        </a>  
                    @elseif($princeton_third_basement->room_status === 'VACANT')
                        <a href="/rooms/{{$princeton_third_basement->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($princeton_third_basement->building, 0, 1).'-'.$princeton_third_basement->room_no.' '.substr($princeton_third_basement->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($princeton_third_basement->room_status === 'RESERVED')
                        <a href="/rooms/{{$princeton_third_basement->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($princeton_third_basement->building, 0, 1).'-'.$princeton_third_basement->room_no.' '.substr($princeton_third_basement->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_lower_ground_floor->princeton_second_basement === 'RECTITICATION')
                        <a href="/rooms/{{$princeton_second_basement->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($princeton_third_basement->building, 0, 1).'-'.$princeton_third_basement->room_no.' '.substr($princeton_third_basement->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @endif
                    <span style="visibility: hidden">||</span> 
                    @endforeach
                </div>
                <br> 
                <p>2nd Lower Basement</p>
                <div class="row">
                    @foreach ($princeton_second_basement as $princeton_second_basement)
                    @if($princeton_second_basement->room_status === 'OCCUPIED')
                        <a href="/rooms/{{$princeton_second_basement->room_id}}" class="btn btn-success" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($princeton_second_basement->building, 0, 1).'-'.$princeton_second_basement->room_no.' '.substr($princeton_second_basement->room_wing, 0, 1)}}</p>
                            </div>
                        </a>  
                    @elseif($princeton_second_basement->room_status === 'VACANT')
                        <a href="/rooms/{{$princeton_second_basement->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($princeton_second_basement->building, 0, 1).'-'.$princeton_second_basement->room_no.' '.substr($princeton_second_basement->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($princeton_second_basement->room_status === 'RESERVED')
                        <a href="/rooms/{{$princeton_second_basement->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($princeton_second_basement->building, 0, 1).'-'.$princeton_second_basement->room_no.' '.substr($princeton_second_basement->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @elseif($harvard_lower_ground_floor->princeton_second_basement === 'RECTITICATION')
                        <a href="/rooms/{{$princeton_second_basement->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                            <i class="fas fa-home fa-2x"></i>
                            <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                                <p style="font-size: 11px">{{ substr($princeton_second_basement->building, 0, 1).'-'.$princeton_second_basement->room_no.' '.substr($princeton_second_basement->room_wing, 0, 1)}}</p>
                            </div>
                        </a> 
                    @endif
                    <span style="visibility: hidden">||</span> 
                    @endforeach
                </div>
                <br> 
                <p>Lower Ground Floor</p>
            <div class="row">
                @foreach ($princeton_lower_ground_floor as $princeton_lower_ground_floor)
                @if($princeton_lower_ground_floor->room_status === 'OCCUPIED')
                    <a href="/rooms/{{$princeton_lower_ground_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_lower_ground_floor->building, 0, 1).'-'.$princeton_lower_ground_floor->room_no.' '.substr($princeton_lower_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a>  
                @elseif($princeton_lower_ground_floor->room_status === 'VACANT')
                    <a href="/rooms/{{$princeton_lower_ground_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_lower_ground_floor->building, 0, 1).'-'.$princeton_lower_ground_floor->room_no.' '.substr($princeton_lower_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_lower_ground_floor->room_status === 'RESERVED')
                    <a href="/rooms/{{$princeton_lower_ground_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_lower_ground_floor->building, 0, 1).'-'.$princeton_lower_ground_floor->room_no.' '.substr($princeton_lower_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_lower_ground_floor->room_status === 'RECTITICATION')
                    <a href="/rooms/{{$princeton_lower_ground_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_lower_ground_floor->building, 0, 1).'-'.$princeton_lower_ground_floor->room_no.' '.substr($princeton_lower_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @endif
                <span style="visibility: hidden">||</span> 
                @endforeach
            </div>
            <br>
            <p>Upper Ground Floor</p>
            <div class="row">
                @foreach ($princeton_upper_ground_floor as $princeton_upper_ground_floor)
                @if($princeton_upper_ground_floor->room_status === 'OCCUPIED')
                    <a href="/rooms/{{$princeton_upper_ground_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_upper_ground_floor->building, 0, 1).'-'.$princeton_upper_ground_floor->room_no.' '.substr($princeton_upper_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a>  
                @elseif($princeton_upper_ground_floor->room_status === 'VACANT')
                    <a href="/rooms/{{$princeton_upper_ground_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_upper_ground_floor->building, 0, 1).'-'.$princeton_upper_ground_floor->room_no.' '.substr($princeton_upper_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_upper_ground_floor->room_status === 'RESERVED')
                    <a href="/rooms/{{$princeton_upper_ground_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_upper_ground_floor->building, 0, 1).'-'.$princeton_upper_ground_floor->room_no.' '.substr($princeton_upper_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_upper_ground_floor->room_status === 'RECTITICATION')
                    <a href="/rooms/{{$princeton_upper_ground_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_upper_ground_floor->building, 0, 1).'-'.$princeton_upper_ground_floor->room_no.' '.substr($princeton_upper_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @endif
                <span style="visibility: hidden">||</span> 
                @endforeach
            </div>  
            <br>
               <p>Ground Floor</p>
            <div class="row">
                @foreach ($princeton_ground_floor as $princeton_ground_floor)
                @if($princeton_ground_floor->room_status === 'OCCUPIED')
                    <a href="/rooms/{{$princeton_ground_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_ground_floor->building, 0, 1).'-'.$princeton_ground_floor->room_no.' '.substr($princeton_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a>  
                @elseif($princeton_ground_floor->room_status === 'VACANT')
                    <a href="/rooms/{{$princeton_ground_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_ground_floor->building, 0, 1).'-'.$princeton_ground_floor->room_no.' '.substr($princeton_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_ground_floor->room_status === 'RESERVED')
                    <a href="/rooms/{{$princeton_ground_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_ground_floor->building, 0, 1).'-'.$princeton_ground_floor->room_no.' '.substr($princeton_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_ground_floor->room_status === 'RECTITICATION')
                    <a href="/rooms/{{$princeton_ground_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_ground_floor->building, 0, 1).'-'.$princeton_ground_floor->room_no.' '.substr($princeton_ground_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @endif
                <span style="visibility: hidden">||</span> 
                @endforeach
            </div>
            <br>
            <p>2nd Floor</p>
            <div class="row">
                @foreach ($princeton_second_floor as $princeton_second_floor)
                @if($princeton_second_floor->room_status === 'OCCUPIED')
                    <a href="/rooms/{{$princeton_second_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_second_floor->building, 0, 1).'-'.$princeton_second_floor->room_no.' '.substr($princeton_second_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a>  
                @elseif($princeton_second_floor->room_status === 'VACANT')
                    <a href="/rooms/{{$princeton_second_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_second_floor->building, 0, 1).'-'.$princeton_second_floor->room_no.' '.substr($princeton_second_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_second_floor->room_status === 'RESERVED')
                    <a href="/rooms/{{$princeton_second_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_second_floor->building, 0, 1).'-'.$princeton_second_floor->room_no.' '.substr($princeton_second_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_second_floor->room_status === 'RECTITICATION')
                    <a href="/rooms/{{$princeton_second_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_second_floor->building, 0, 1).'-'.$princeton_second_floor->room_no.' '.substr($princeton_second_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @endif
                <span style="visibility: hidden">||</span> 
                @endforeach
            </div>
            <br>
            <p>3rd Floor</p>
            <div class="row">
                @foreach ($princeton_third_floor as $princeton_third_floor)
                @if($princeton_second_floor->room_status === 'OCCUPIED')
                    <a href="/rooms/{{$princeton_third_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_third_floor->building, 0, 1).'-'.$princeton_third_floor->room_no.' '.substr($princeton_third_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a>  
                @elseif($princeton_third_floor->room_status === 'VACANT')
                    <a href="/rooms/{{$princeton_third_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_third_floor->building, 0, 1).'-'.$princeton_third_floor->room_no.' '.substr($princeton_third_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_third_floor->room_status === 'RESERVED')
                    <a href="/rooms/{{$princeton_third_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_third_floor->building, 0, 1).'-'.$princeton_third_floor->room_no.' '.substr($princeton_third_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_third_floor->room_status === 'RECTITICATION')
                    <a href="/rooms/{{$princeton_third_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_third_floor->building, 0, 1).'-'.$princeton_third_floor->room_no.' '.substr($princeton_third_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @endif
                <span style="visibility: hidden">||</span> 
                @endforeach
            </div>
            <br>  
            <p>4th Floor</p>
            <div class="row">
                @foreach ($princeton_fourth_floor as $princeton_fourth_floor)
                @if($princeton_fourth_floor->room_status === 'OCCUPIED')
                    <a href="/rooms/{{$princeton_fourth_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_fourth_floor->building, 0, 1).'-'.$princeton_fourth_floor->room_no.' '.substr($princeton_fourth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a>  
                @elseif($princeton_fourth_floor->room_status === 'VACANT')
                    <a href="/rooms/{{$princeton_fourth_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_fourth_floor->building, 0, 1).'-'.$princeton_fourth_floor->room_no.' '.substr($princeton_fourth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_fourth_floor->room_status === 'RESERVED')
                    <a href="/rooms/{{$princeton_fourth_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_fourth_floor->building, 0, 1).'-'.$princeton_fourth_floor->room_no.' '.substr($princeton_fourth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_fourth_floor->room_status === 'RECTITICATION')
                    <a href="/rooms/{{$princeton_fourth_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_fourth_floor->building, 0, 1).'-'.$princeton_fourth_floor->room_no.' '.substr($princeton_fourth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @endif
                <span style="visibility: hidden">||</span> 
                @endforeach
            </div>  
            <br>
            <p>5th Floor</p>
            <div class="row">
                @foreach ($princeton_fifth_floor as $princeton_fifth_floor)
                @if($princeton_fifth_floor->room_status === 'OCCUPIED')
                    <a href="/rooms/{{$princeton_fifth_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_fifth_floor->building, 0, 1).'-'.$princeton_fifth_floor->room_no.' '.substr($princeton_fifth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a>  
                @elseif($princeton_fifth_floor->room_status === 'VACANT')
                    <a href="/rooms/{{$princeton_fifth_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_fifth_floor->building, 0, 1).'-'.$princeton_fifth_floor->room_no.' '.substr($princeton_fifth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_fifth_floor->room_status === 'RESERVED')
                    <a href="/rooms/{{$princeton_fifth_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_fifth_floor->building, 0, 1).'-'.$princeton_fifth_floor->room_no.' '.substr($princeton_fifth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_fifth_floor->room_status === 'RECTITICATION')
                    <a href="/rooms/{{$princeton_fifth_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_fifth_floor->building, 0, 1).'-'.$princeton_fifth_floor->room_no.' '.substr($princeton_fifth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @endif
                <span style="visibility: hidden">||</span> 
                @endforeach
            </div>
            <br>
            <p>6th Floor</p>
            <div class="row">
                @foreach ($princeton_sixth_floor as $princeton_sixth_floor)
                @if($princeton_sixth_floor->room_status === 'OCCUPIED')
                    <a href="/rooms/{{$princeton_sixth_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_sixth_floor->building, 0, 1).'-'.$princeton_sixth_floor->room_no.' '.substr($princeton_sixth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a>  
                @elseif($princeton_sixth_floor->room_status === 'VACANT')
                    <a href="/rooms/{{$princeton_sixth_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_sixth_floor->building, 0, 1).'-'.$princeton_sixth_floor->room_no.' '.substr($princeton_sixth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_sixth_floor->room_status === 'RESERVED')
                    <a href="/rooms/{{$princeton_sixth_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_sixth_floor->building, 0, 1).'-'.$princeton_sixth_floor->room_no.' '.substr($princeton_sixth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @elseif($princeton_sixth_floor->room_status === 'RECTITICATION')
                    <a href="/rooms/{{$princeton_sixth_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                        <i class="fas fa-home fa-2x"></i>
                        <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                            <p style="font-size: 11px">{{ substr($princeton_sixth_floor->building, 0, 1).'-'.$princeton_sixth_floor->room_no.' '.substr($princeton_sixth_floor->room_wing, 0, 1)}}</p>
                        </div>
                    </a> 
                @endif
                <span style="visibility: hidden">||</span> 
                @endforeach
            </div>                           
            
          </div>
</div>
<hr>
<div class="row">
    <h5>Wharton</h5>
      <div class="col-md-12">
           <p>Ground Floor</p>
           <div class="row">
            @foreach ($wharton_ground_floor as $wharton_ground_floor)
            @if($wharton_ground_floor->room_status === 'OCCUPIED')
                <a href="/rooms/{{$wharton_ground_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_ground_floor->building, 0, 1).'-'.$wharton_ground_floor->room_no.' '.substr($wharton_ground_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a>  
            @elseif($wharton_ground_floor->room_status === 'VACANT')
                <a href="/rooms/{{$wharton_ground_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_ground_floor->building, 0, 1).'-'.$wharton_ground_floor->room_no.' '.substr($wharton_ground_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_ground_floor->room_status === 'RESERVED')
                <a href="/rooms/{{$wharton_ground_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_ground_floor->building, 0, 1).'-'.$wharton_ground_floor->room_no.' '.substr($wharton_ground_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_ground_floor->room_status === 'RECTITICATION')
                <a href="/rooms/{{$wharton_ground_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_ground_floor->building, 0, 1).'-'.$wharton_ground_floor->room_no.' '.substr($wharton_ground_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @endif
            <span style="visibility: hidden">||</span> 
            @endforeach
        </div>
        <br>
        <p>2nd Floor</p>
           <div class="row">
            @foreach ($wharton_second_floor as $wharton_second_floor)
            @if($wharton_second_floor->room_status === 'OCCUPIED')
                <a href="/rooms/{{$wharton_second_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_second_floor->building, 0, 1).'-'.$wharton_second_floor->room_no.' '.substr($wharton_second_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a>  
            @elseif($wharton_second_floor->room_status === 'VACANT')
                <a href="/rooms/{{$wharton_second_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_second_floor->building, 0, 1).'-'.$wharton_second_floor->room_no.' '.substr($wharton_second_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_second_floor->room_status === 'RESERVED')
                <a href="/rooms/{{$wharton_second_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_second_floor->building, 0, 1).'-'.$wharton_second_floor->room_no.' '.substr($wharton_second_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_second_floor->room_status === 'RECTITICATION')
                <a href="/rooms/{{$wharton_second_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_second_floor->building, 0, 1).'-'.$wharton_second_floor->room_no.' '.substr($wharton_second_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @endif
            <span style="visibility: hidden">||</span> 
            @endforeach
        </div>
        <br>
        <p>3rd Floor</p>
        <div class="row">
            @foreach ($wharton_third_floor as $wharton_third_floor)
            @if($wharton_third_floor->room_status === 'OCCUPIED')
                <a href="/rooms/{{$wharton_third_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_third_floor->building, 0, 1).'-'.$wharton_third_floor->room_no.' '.substr($wharton_third_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a>  
            @elseif($wharton_third_floor->room_status === 'VACANT')
                <a href="/rooms/{{$wharton_third_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_third_floor->building, 0, 1).'-'.$wharton_third_floor->room_no.' '.substr($wharton_third_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_third_floor->room_status === 'RESERVED')
                <a href="/rooms/{{$wharton_third_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_third_floor->building, 0, 1).'-'.$wharton_third_floor->room_no.' '.substr($wharton_third_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_third_floor->room_status === 'RECTITICATION')
                <a href="/rooms/{{$wharton_third_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_third_floor->building, 0, 1).'-'.$wharton_third_floor->room_no.' '.substr($wharton_third_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @endif
            <span style="visibility: hidden">||</span> 
            @endforeach
        </div>
        <br>
        <p>4th Floor</p>
        <div class="row">
            @foreach ($wharton_fourth_floor as $wharton_fourth_floor)
            @if($wharton_fourth_floor->room_status === 'OCCUPIED')
                <a href="/rooms/{{$wharton_fourth_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_fourth_floor->building, 0, 1).'-'.$wharton_fourth_floor->room_no.' '.substr($wharton_fourth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a>  
            @elseif($wharton_fourth_floor->room_status === 'VACANT')
                <a href="/rooms/{{$wharton_fourth_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_fourth_floor->building, 0, 1).'-'.$wharton_fourth_floor->room_no.' '.substr($wharton_fourth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_fourth_floor->room_status === 'RESERVED')
                <a href="/rooms/{{$wharton_fourth_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_fourth_floor->building, 0, 1).'-'.$wharton_fourth_floor->room_no.' '.substr($wharton_fourth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_fourth_floor->room_status === 'RECTITICATION')
                <a href="/rooms/{{$wharton_fourth_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_fourth_floor->building, 0, 1).'-'.$wharton_fourth_floor->room_no.' '.substr($wharton_fourth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @endif
            <span style="visibility: hidden">||</span> 
            @endforeach
        </div>
        <br>
        <p>5th Floor</p>
        <div class="row">
            @foreach ($wharton_fifth_floor as $wharton_fifth_floor)
            @if($wharton_fifth_floor->room_status === 'OCCUPIED')
                <a href="/rooms/{{$wharton_fifth_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_fifth_floor->building, 0, 1).'-'.$wharton_fifth_floor->room_no.' '.substr($wharton_fifth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a>  
            @elseif($wharton_fifth_floor->room_status === 'VACANT')
                <a href="/rooms/{{$wharton_fifth_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_fifth_floor->building, 0, 1).'-'.$wharton_fifth_floor->room_no.' '.substr($wharton_fifth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_fifth_floor->room_status === 'RESERVED')
                <a href="/rooms/{{$wharton_fifth_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_fifth_floor->building, 0, 1).'-'.$wharton_fifth_floor->room_no.' '.substr($wharton_fifth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_fifth_floor->room_status === 'RECTITICATION')
                <a href="/rooms/{{$wharton_fifth_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_fifth_floor->building, 0, 1).'-'.$wharton_fifth_floor->room_no.' '.substr($wharton_fifth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @endif
            <span style="visibility: hidden">||</span> 
            @endforeach
        </div>
        <br>
        <p>6th Floor</p>
        <div class="row">
            @foreach ($wharton_sixth_floor as $wharton_sixth_floor)
            @if($wharton_sixth_floor->room_status === 'OCCUPIED')
                <a href="/rooms/{{$wharton_sixth_floor->room_id}}" class="btn btn-success" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_sixth_floor->building, 0, 1).'-'.$wharton_sixth_floor->room_no.' '.substr($wharton_sixth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a>  
            @elseif($wharton_sixth_floor->room_status === 'VACANT')
                <a href="/rooms/{{$wharton_sixth_floor->room_id}}" class="btn btn-danger" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_sixth_floor->building, 0, 1).'-'.$wharton_sixth_floor->room_no.' '.substr($wharton_sixth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_sixth_floor->room_status === 'RESERVED')
                <a href="/rooms/{{$wharton_sixth_floor->room_id}}" class="btn btn-warning" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_sixth_floor->building, 0, 1).'-'.$wharton_sixth_floor->room_no.' '.substr($wharton_sixth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @elseif($wharton_sixth_floor->room_status === 'RECTITICATION')
                <a href="/rooms/{{$wharton_sixth_floor->room_id}}" class="btn btn-dark" oncontextmenu="return false">
                    <i class="fas fa-home fa-2x"></i>
                    <div style="display: flex; width: 30px; justify-content: space-around; margin-bottom:-60%">
                        <p style="font-size: 11px">{{ substr($wharton_sixth_floor->building, 0, 1).'-'.$wharton_sixth_floor->room_no.' '.substr($wharton_sixth_floor->room_wing, 0, 1)}}</p>
                    </div>
                </a> 
            @endif
            <span style="visibility: hidden">||</span> 
            @endforeach
        </div>
        </div>             
      </div>
</div>

</div>
@endsection


