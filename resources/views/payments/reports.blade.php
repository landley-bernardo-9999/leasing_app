@extends('layouts.app')
@section('title', 'Reports')
@section('content')
<div class="container">
   <div class="row">
        <h3>Daily Collection Report</h3>
    </div>
    <br>
    <div class="form-row">
        <form id="form1" action="/filter/payments" method="GET"></form>
            <input type="date" width="50%" class="form-control" name="pay_date" value="{{ Request::query('pay_date') }}" onchange="this.form.submit()" form="form1">
    </div>
    <br>
    <div class="row">
            <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Billing Date</th>
                        <th>Date Paid</th>
                        <th>Form of Payment</th>
                        <th>Date Deposited</th>
                        <th>Bank Name</th>
                        <th>Cheque No</th>
                        
                        <th>OR Number</th>
                        <th>AR Number</th>
                        <th>Amount Paid</th>
                    </tr>
                    </thead>
                    <?php $row_no = 1; ?>
                    
                    <tbody>
                    @foreach ($payments as $payment)
                    <tr>
                        <th>{{ $row_no++ }}</th>
                        <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($payment->updated_at)->format('d/m/Y') }}</td>
                        <td>{{ $payment->form_of_pay }}</td>
                        <td>{{ \Carbon\Carbon::parse($payment->date_dep)->format('d/m/Y') }}</td>
                        <td>{{ $payment->bank_name }}</td>
                        <td>{{ $payment->check_no }}</td>
                        
                        

                        <td>{{ $payment->or_number }}</td>
                        <td>{{ $payment->ar_number }}</td>
                        <td>{{ number_format($payment->amt_paid,2) }}</td>
                        
                
                        <td></td>
                    </tr>
                    
                    @endforeach
                    <tr>
                        <th>TOTAL</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>{{ number_format($payments->sum('amt_paid'),2) }}</th>

                    </tr>
                    </tbody>
                </table>
    </div>
</div>
@endsection
