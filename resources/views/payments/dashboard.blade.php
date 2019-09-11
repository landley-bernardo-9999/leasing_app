@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row">
         <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <a href="/payments/create"><h5 class="card-title text-center">Accept Payment</h5></a>
                    <h1 class="card-text text-center"><i class="fas fa-hand-holding-usd"></i></h1>
                  
                </div>    
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                        <a href="#"><h5 class="card-title text-center">Reports</h5></a>
                    <h1 class="card-text text-center"><i class="fas fa-chart-line"></i></h1>
                </div>    
            </div>
        </div>
    </div>
    <br>
    <div class="row">
         <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Memos and Reminders</h5>
                    <h1 class="card-text text-right"></h1>
                  
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
