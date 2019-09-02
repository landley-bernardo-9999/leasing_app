@extends('layouts.app')
@section('title', 'Book')
@section('content')
<div class="container">
    <form action="/rooms" method="GET">
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-4">
            <label class="text-primary" for="">Site</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-city"></i></span>
                </div>
                 <select class="form-control" name="site" id="site">
                    <option value="nc" >North Cambridge</option>
                    <option value="cy" >Courtyards</option>
                    <option value="mr" >Marthas Rooms</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <label for="" class="text-primary">Building/Floor</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-store-alt"></i></span>
                </div>
                <select class="form-control" name="building" id="building" >
                    <option value="h">Harvard</option>
                    <option value="p">Princeton</option>
                    <option value="w">Wharton</option>
                </select>

                <select class="form-control" name="floor_no" id="floor_no">
                    <option value="G">Ground</option>
                    <option value="2">2nd Floor</option>
                </select>
            </div>
        </div>


        <div class="col-md-3">
            <label for="" class="text-primary">Type of Bed</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-users"></i></span>
                </div>
                <select class="form-control" name="type_of_bed" id="type_of_bed">
                    <option value="1SB">1 Single Bed</option>
                    <option value="2SB">2 Single Bed</option>
                </select>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-5">
            <label class="text-primary" for="">Check In Date-Check Out Date:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                </div>
               <input class="form-control" type="date" name="check_in_date" id="check_in_date">
               <input class="form-control" type="date" name="check_out_date" id="check_out_date">
            </div>        
        </div>      
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <button class="btn text-right" type="submit">Search</button>
        </div>
    </div>
</form>
</div>
@endsection
