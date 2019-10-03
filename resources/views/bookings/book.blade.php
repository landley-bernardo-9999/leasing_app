@extends('layouts.app')
@section('title', 'Filter Rooms')
@section('content')
<div class="container card p-3">
    <br><br>
    <form id="filter-rooms" action="/rooms" method="GET">
        {{ csrf_field() }}
    </form>
    <div class="row">
        <div class="col-md-4">
            <label class="" for=""><span class="text-danger">*</span> Site</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-city"></i></span>
                </div>
                <select form="filter-rooms" class="form-control" name="site" id="site" required>
                    @if(session('site') == NULL)
                    <option value=""><small id="" class="form-text text-muted">...</small></option>
                    @foreach ($site as $row)
                    <option value="{{ $row->site }}">{{ $row->site }}</option>
                    @endforeach
                    @else
                    <option value="{{ session('site') }}" selected>{{ session('site') }} </option>
                    <option value=""><small id="" class="form-text text-muted">...</small></option>
                    @foreach ($site as $row)
                    <option value="{{ $row->site }}">{{ $row->site }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="col-md-5">
            <label for="" class="">Building/Floor <span class="text-danger">(optional)</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-store-alt"></i></span>
                </div>
                
               
                <select form="filter-rooms" class="form-control" name="building" id="building" >
                    @if(session('building') == NULL)
                    <option value=""><small id="" class="form-text text-muted">...</small></option>
                    @foreach ($building as $row)
                    <option value="{{ $row->building }}">{{ $row->building }}</option>
                    @endforeach
                    @else
                    <option value="{{ session('building') }}"  selected>{{ session('building') }}</option>
                    <option value=""><small id="" class="form-text text-muted">...</small></option>
                    @foreach ($building as $row)
                    <option value="{{ $row->building }}">{{ $row->building }}</option>
                    @endforeach
                    @endif
                   
                </select>
                

               <select form="filter-rooms" class="form-control" name="floor_no" id="floor_no" >
                    <option value="{{ session('floor_no') }}"  selected>{{ session('floor_no') }} floor</option>
                    <option value=""><small id="" class="form-text text-muted">...</small></option>
                    @foreach ($floor_no as $row)
                    <option value="{{ $row->floor_no }}">{{ $row->floor_no }} floor</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-3">
            <label for="" class="">Type of Bed <span class="text-danger">(optional)</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-bed"></i></span>
                </div>
               <select form="filter-rooms" class="form-control" name="type_of_bed" id="type_of_bed" >
                    <option value="{{ session('type_of_bed') }}"  selected>{{ session('type_of_bed') }}</option>
                    <option value=""><small id="" class="form-text text-muted">...</small></option>
                    @foreach ($type_of_bed as $row)
                    <option value="{{ $row->type_of_bed }}">{{ $row->type_of_bed }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-5">
            <label class="" for="">Check In Date-Check Out Date <span class="text-danger">(optional)</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                </div>
               <input form="filter-rooms" class="form-control" type="date" name="check_in_date" id="check_in_date" value="{{ session('check_in_date') }}">
               <input form="filter-rooms" class="form-control" type="date" name="check_out_date" id="check_out_date" value="{{ session('check_out_date') }}">
               <input form="filter-rooms" class="form-control" type="hidden" name="booking" id="booking" value="true">
            </div>        
        </div>      
    </div>
    <br>
     <div class="row">
        <div class="col-md-12">
            <p class="text-right"><button form="filter-rooms" class="btn btn-primary" type="submit"><i class="fas fa-search"></i> &nbspFilter Rooms</button></p>
        </div>
    </div>
</div>

@endsection
