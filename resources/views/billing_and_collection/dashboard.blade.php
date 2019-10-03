@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
        <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"><a href="/billings/create">Create Billings</a> </h5>
                    <h1 class="card-text text-center"></h1>
                    
                    
                </div>    
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">View Billings</h5>
                    <h1 class="card-text text-center"></h1>
                    
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Reports and Statistics</h5>
                    <h1 class="card-text text-center"></h1>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
@endsection
