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
                <select class="form-control" name="site" id="site" >
                    @foreach ($site as $row)
                    <option value="{{ $row->site }}">{{ $row->site }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-5">
            <label for="" class="text-primary">Building/Floor</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-store-alt"></i></span>
                </div>
                
               
                <select class="form-control" name="building" id="building" >
                    @foreach ($building as $row)
                    <option value="{{ $row->building }}">{{ $row->building }}</option>
                    @endforeach
                </select>
                

               <select class="form-control" name="floor_no" id="floor_no" >
                    @foreach ($floor_no as $row)
                    <option value="{{ $row->floor_no }}">{{ $row->floor_no }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-3">
            <label for="" class="text-primary">Type of Bed</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-bed"></i></span>
                </div>
               <select class="form-control" name="type_of_bed" id="type_of_bed" >
                    @foreach ($type_of_bed as $row)
                    <option value="{{ $row->type_of_bed }}">{{ $row->type_of_bed }}</option>
                    @endforeach
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
               <input class="form-control" type="hidden" name="booking" id="booking" value="true">
            </div>        
        </div>      
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <button class="btn text-right btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
        </div>
    </div>
</form>
</div>
@endsection
