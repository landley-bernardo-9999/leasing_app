@extends('layouts.app')
@section('title', 'Create Billing')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form id="create-billing" action="/billings" method="POST">
            {{ csrf_field() }}
            </form>
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                    <h5 class="card-title text-left"><b>Create Billing</b></h5>
                    <p class="text-right"> <button form="create-billing" onclick="return confirm('Are you sure you want to perform this operation? ');" class="btn btn-primary" type="submit"><i class="fas fa-arrow-right"></i> &nbspCREATE BILLING</button></p>
                    <hr>
                        <label for="" class="">Billing Date</label>    
                        <input id="billing_date" type="date" style="width: 20%" class="form-control" name="billing_date" value="{{ date('Y-m-d') }}" required>
                        <br>
                        <label for="" class="">Description</label>    
                        <select style="width: 20%"  name="" id="" class="form-control">
                            <option value="MONTHLY RENT">MONTHLY RENT</option>
                        </select>
                        <br>
                         <label for="">Harvard ({{ $harvard_bookings->count() }}) <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-caret-square-down"></i>
                              </a></label>
                        <div class="row collapse" id="collapseExample">
                            <div class="col-md-12">
                                <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Resident</th>
                                    <th>Room No</th>
                                    <th>Contract Period</th>
                                    <th>Amount</th>
                                </tr>
                                <?php $row_no = 1; ?>
                                @foreach ($harvard_bookings as $booking)   
                                <tr>
                                    <th>
                                        {{ $row_no++}}
                                        <input type="hidden" value="res_id_{{ $booking->res_id }}" id="{{ $booking->res_id }}">
                                    </th>
                                    <td>                                       
                                        <label class="" >{{ $booking->res_full_name }}</label>
                                    </td>
                                    <td>
                                        {{ substr($booking->building, 0, 1).'-'.$booking->room_no.' '.substr($booking->room_wing, 0, 1) }}
                                    </td>
                                    <td>
                                        {{ $booking->booking_term }}
                                    </td>
                                    <td>
                                        @if($booking->booking_term == 'LONG TERM')
                                            <input type="text" id="bil_amt_{{ $booking->res_id }}" class="form-control" style="width:50%" value="{{ $booking->long_term_rent }}">
                                        @elseif($booking->booking_term == 'SHORT TERM')
                                            <input type="text" id="bil_amt_{{ $booking->res_id }}" class="form-control" style="width:50%" value="{{ $booking->short_term_rent }}">
                                        @else
                                            <input type="text" id="bil_amt_{{ $booking->res_id }}" class="form-control" style="width:50%" value="{{ $booking->transient_rent }}">
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            </div>
                        </div>
                        <br>
                        <label for="">Princeton ({{ $princeton_bookings->count() }}) <a class="" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                <i class="fas fa-caret-square-down"></i>
                              </a></label>
                        <div class="row collapse" id="collapseExample2">
                            <div class="col-md-12">
                                <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Resident</th>
                                    <th>Room No</th>
                                    <th>Contract Period</th>
                                    <th>Amount</th>
                                </tr>
                                <?php $row_no = 1; ?>
                                @foreach ($princeton_bookings as $booking)   
                                <tr>
                                    <th>
                                        {{ $row_no++}}
                                        <input type="hidden" value="res_id_{{ $booking->res_id }}" id="{{ $booking->res_id }}">
                                    </th>
                                    <td>                                       
                                        <label class="" >{{ $booking->res_full_name }}</label>
                                    </td>
                                    <td>
                                        {{ substr($booking->building, 0, 1).'-'.$booking->room_no.' '.substr($booking->room_wing, 0, 1) }}
                                    </td>
                                    <td>
                                        {{ $booking->booking_term }}
                                    </td>
                                    <td>
                                        @if($booking->booking_term == 'LONG TERM')
                                            <input type="text" id="bil_amt_{{ $booking->res_id }}" class="form-control" style="width:50%" value="{{ $booking->long_term_rent }}">
                                        @elseif($booking->booking_term == 'SHORT TERM')
                                            <input type="text" id="bil_amt_{{ $booking->res_id }}" class="form-control" style="width:50%" value="{{ $booking->short_term_rent }}">
                                        @else
                                            <input type="text" id="bil_amt_{{ $booking->res_id }}" class="form-control" style="width:50%" value="{{ $booking->transient_rent }}">
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            </div>
                        </div>
                        <br>
                        <label for="">Wharton ({{ $wharton_bookings->count() }}) <a class="" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                                <i class="fas fa-caret-square-down"></i>
                              </a></label>
                        <div class="row collapse" id="collapseExample3">
                            <div class="col-md-12">
                                <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Resident</th>
                                    <th>Room No</th>
                                    <th>Contract Period</th>
                                    <th>Amount</th>
                                </tr>
                                <?php $row_no = 1; ?>
                                @foreach ($wharton_bookings as $booking)   
                                <tr>
                                    <th>
                                        {{ $row_no++}}
                                        <input type="hidden" value="res_id_{{ $booking->res_id }}" id="{{ $booking->res_id }}">
                                    </th>
                                    <td>                                       
                                        <label class="" >{{ $booking->res_full_name }}</label>
                                    </td>
                                    <td>
                                        {{ substr($booking->building, 0, 1).'-'.$booking->room_no.' '.substr($booking->room_wing, 0, 1) }}
                                    </td>
                                    <td>
                                        {{ $booking->booking_term }}
                                    </td>
                                    <td>
                                        @if($booking->booking_term == 'LONG TERM')
                                            <input type="text" id="bil_amt_{{ $booking->res_id }}" class="form-control" style="width:50%" value="{{ $booking->long_term_rent }}">
                                        @elseif($booking->booking_term == 'SHORT TERM')
                                            <input type="text" id="bil_amt_{{ $booking->res_id }}" class="form-control" style="width:50%" value="{{ $booking->short_term_rent }}">
                                        @else
                                            <input type="text" id="bil_amt_{{ $booking->res_id }}" class="form-control" style="width:50%" value="{{ $booking->transient_rent }}">
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
