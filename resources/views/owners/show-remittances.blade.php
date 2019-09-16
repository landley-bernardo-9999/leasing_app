@extends('layouts.app')
@section('title', 'Remittances')
@section('content')
<div class="container">
    <div class="row">
         <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Room No</th>
                        <th>Billing Date</th>
                        <th>Date Deposited</th>
                        <th>Amount</th>                      
                    </tr>
                    </thead>
                    <?php $row_no = 1; ?>
                    <tbody>
                    @foreach ($remittances as $remittance)
                   
                    <tr>
                        <th>{{ $row_no++ }}</th>
                        <td>{{ $remittance->room_no.' '.$remittance->room_wing }}</td>
                        <td>{{ \Carbon\Carbon::parse($remittance->created_at)->format('d/m/Y') }}</td>
                        <td>
                            @if($remittance->date_dep == NULL)
                                PENDING
                            @else
                                {{ \Carbon\Carbon::parse($remittance->date_dep)->format('d/m/Y') }}
                            @endif
                        </td>
                        <th>{{ number_format($remittance->rem_amt,2) }}</th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
    </div>
</div>
@endsection
