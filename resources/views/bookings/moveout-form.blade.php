<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@extends('layouts.app')
@section('title', 'Move Out Form')
@section('content')
<div class="container">
    <table class="table table-borderless">
        <h3>Move Out Form</h3>
        <hr>
        <br>
        <tr>
            <th>Actual Move out Date:</th>
            <td><input type="date" class="form-control" value="{{ $booking->check_out_date }}" style="width:60%"></td>
            <th>Reason for moving out:</th>
            <td>
                <select name="reason_for_moving_out" class="form-control" style="width:70%" required>
                    <option value="" selected>Select Reason</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="delinquent">Delinquent</option>
                    <option value="end_of_contract">End of Contract</option>
                    <option value="force_majeure">Force Majeure</option>
                    <option value="run_away">Run Away</option>
                    <option value="unruly">Unruly</option>
                </select>
            </td>
        </tr>
    </table>
    <br>

     <table class="table table-borderless">
                <h3>Utility Readings</h3>
                <hr>
            <tr>
                <th><label for="">Water</label></th>
                <th></th>
                <th><label for="">Electric</label></th>
                <th></th>
            </tr>
            
            <tr>
                <td>Initial:  </td>
                <td><input type="text" class="form-control" style="width:50%" name="initial_water_reading" value="{{ $booking->final_water_reading }}" ></td>
                <td>Initial: </td>
                <td><input type="text" class="form-control" style="width:50%" name="initial_electric_reading" value="{{ $booking->final_electric_reading }}" ></td>
            </tr>
            <tr>
                <td>Final </td>
                <td><input type="text" class="form-control" style="width:50%" name="final_water_reading" value="{{ $booking->final_water_reading }}" ></td>
                <td>Final  </td>
                <td><input type="text" class="form-control" style="width:50%" name="final_electric_reading" value="{{ $booking->final_electric_reading }}" ></td>
        </tr>
        </table>
        <br>
        
        <h3>Unpaid Amount and Security Deposit</h3>
        <hr>
        <ul>
            <li>
                 Unpaid Amount -
                @if($balance <= 0)
                All payments has been settled.
                @else
                 {{ number_format($balance,2) }} 
                @endif
            </li>
                @foreach ($sec_dep as $sec_dep)
            <li>{{ $sec_dep->desc.' - '.number_format($sec_dep->bil_amt,2) }}</li>        
                @endforeach
        </ul>
           
              
        <br>
            <div class="row">
                    <div class="control-group" id="fields">
                        <label class="control-label" for="field1">Mandatory Move Out Charges</label>
                            <form role="form" autocomplete="off">
                                <div class="entry input-group col-xs-3">
                                   
                                    <input type="text">
                                        <button class="btn btn-success btn-add" type="button">
                                            Add
                                        </button>
                                    
                                </div>
                                <br>
                            </form>
    
                    </div>
                </div>
@endsection
<script type="text/javascript">


$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('Remove');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});



</script>

