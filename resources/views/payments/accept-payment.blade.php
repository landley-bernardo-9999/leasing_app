@extends('layouts.app')
@section('title', 'Accept Payment')
@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12">
            <div class="card mb-3" >
                <div class="card-header"><h5><i class="fas fa-credit-card"></i> Payment Information</h5></div>
                <div class="card-body">
                        <form id="form1" action="/search/payments/" method="GET" > </form>
                        <form id="form2" action="/payments" method="POST" >{{ csrf_field() }} </form>
                        
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="pay_date">Date</label>
                                <input type="date" class="form-control" id="pay_date" name="pay_date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" form="form2">
                                <br>
                                <label for="resident_name">Resident</label>
                                <select name="request_billings" id="request_billings" class="form-control" onchange="this.form.submit()" form="form1">
                                   @if($residents->count() === 1)
                                        @foreach ($residents as $resident)
                                            <option value="{{ $resident->booking_id }}" selected>{{ $resident->res_full_name.' - '.$resident->room_no.' '.$resident->room_wing }} </option>
                                            <input type="hidden" name="res_id" id="res_id" value="{{ $resident->res_id }}" form="form2">
                                        @endforeach
                                   @else
                                        <option value="">Select Resident...</option>
                                        @foreach ($residents as $resident)
                                            <option value="{{ $resident->booking_id }}">{{ $resident->res_full_name.' - '.$resident->room_no.' '.$resident->room_wing }} </option>
                                        @endforeach
                                   @endif
                                </select>
                    
                                @if($residents->count() === 1)
                                    <small id="" class="form-text text-muted"><a class="text-danger" href="/payments/create">Select another resident...</a></small>
                                @endif
                                
                                <br>          
                                
                                <label for="">Form of Payment</label>
                                <select name="form_of_pay" id="form_of_pay" class="form-control" form="form2" onchange="getNewVal(this);" required>
                                    <option value="">Select One</option>
                                    <option value="THRU CASH">Thru Cash</option>
                                    <option value="THRU BANK">Thru Bank</option>
                                    <option value="THRU CHEQUE">Thru Cheque</option>
                                </select>

                                <br>
                                <div id="amt_paid_div">
                                    <label for="amt_paid">Amount Paid</label>
                                    <input onkeyup="show_button()" type="text" class="form-control" id="amt_paid" name="amt_paid" value="" form="form2">
                                    <br>
                                </div>
                                
                                
                                <div id="or_no_div">
                                    <label for="or_number">Official Receipt Number</label>
                                    <input type="text" class="form-control" id="or_number" name="or_number" value="" form="form2">
                                    <br>
                    
                                <label for="ar_number">Acknowledgement Receipt Number</label>
                                <input type="text" class="form-control" id="ar_number" name="ar_number" value="" form="form2">
                                <br>
                              </div>

                                <div id="bank_name_div">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" name="bank_name" value="" form="form2">
                                    <br>
                                </div>

                               <div id="check_no_div">
                                <label for="check_no">Check Number</label>
                                <input type="text" class="form-control" id="check_no" name="check_no" value="" form="form2">
                                <br>
                               </div>

                              <div  id="date_dep_div">
                                <label for="date_dep">Date Deposited</label>
                                <input type="date" class="form-control" id="date_dep" name="date_dep" value="" form="form2">
                                <br>
                              </div>



                            </div>
                    
                            <div class="col-md-6">
                                     <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <b>Billing Information</b>
                                            <hr>
                                            @if($residents->count() === 1)
                                            <table class="table table-borderless">
                                                @foreach ($billings as $billing)
                                                <tr>
                                                    <td>{{ $billing->desc }}</th>
                                                    <td>{{ number_format($billing->bil_amt,2) }}</td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <th>TOTAL</th>
                                                    <th>{{ number_format($billings->sum('bil_amt'),2) }}</th>
                                                </tr>
                                                <tr>
                                                    <th>RUNNING BALANCE</th>
                                                    <th>123</th>
                                                </tr>
                                                <tr>
                                                    <td><button id="button" onclick="return confirm('Are you sure you want to perform this operation? ');" class="btn btn-primary" type="submit" form="form2"><i class="fas fa-arrow-right"></i> Submit</button></td>
                                                </tr>
                                                @else
                                                <p>Nothing to show.</p>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                       
                </div>
            </div>
       </div>
    </div>
</div>

<script>
     window.onload = function() {
        document.getElementById('amt_paid_div').style.visibility = 'hidden';
        document.getElementById('or_no_div').style.visibility = 'hidden';
        document.getElementById('bank_name_div').style.visibility = 'hidden';
        document.getElementById('check_no_div').style.visibility = 'hidden';
        document.getElementById('date_dep_div').style.visibility = 'hidden';
        document.getElementById('button').style.visibility = 'hidden';
     }

     function getNewVal(item){
         if(item.value=== 'THRU CASH'){
            document.getElementById('amt_paid_div').style.visibility = 'visible';
            document.getElementById('or_no_div').style.visibility = 'visible';
            document.getElementById('bank_name_div').style.visibility = 'hidden';
            document.getElementById('date_dep_div').style.visibility = 'hidden';
         }
         if(item.value=== 'THRU BANK'){
             document.getElementById('amt_paid_div').style.visibility = 'visible';
            document.getElementById('bank_name_div').style.visibility = 'visible';
            document.getElementById('date_dep_div').style.visibility = 'visible';
            document.getElementById('or_no_div').style.visibility = 'visible';
            document.getElementById('check_no_div').style.visibility = 'hidden';
        }
        if(item.value=== 'THRU CHEQUE'){
            document.getElementById('check_no_div').style.visibility = 'visible';
            document.getElementById('or_no_div').style.visibility = 'visible';
            document.getElementById('bank_name_div').style.visibility = 'hidden';
            document.getElementById('date_dep_div').style.visibility = 'hidden';
         }   
     }

     function show_button(){
         if(document.getElementById('amt_paid').value > 0){
            document.getElementById('button').style.visibility = 'visible';
         }
     }
</script>
@endsection
