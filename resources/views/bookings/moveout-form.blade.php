<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
@extends('layouts.app')
@section('title', 'Move Out Form')
@section('content')
<div class="container">
    <div class="row">
        <form id="move_out_form" action="/bookings/{{ $booking->booking_id }}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
        </form>
      <div class="col-md-12">
            <table class="table table-borderless">
        <h3>Move Out Form</h3>
        <hr>
        <br>
        <tr>
            <th>Actual Move out Date:</th>
            <td><input form="move_out_form" type="date" name="actual_check_out_date" class="form-control" value="{{ $booking->check_out_date }}" style="width:60%" required></td>
            <th>Reason for moving out:</th>
            <td>
                <select form="move_out_form" name="reason_for_moving_out" class="form-control" style="width:70%" required>
                    <option value="" selected>Select Reason</option>
                    <option value="CANCELLED">Cancelled</option>
                    <option value="DELINQUENT">Delinquent</option>
                    <option value="END OF CONTRACT">End of Contract</option>
                    <option value="FORCE MAJEURE">Force Majeure</option>
                    <option value="RUN AWAY">Run Away</option>
                    <option value="UNRULY">Unruly</option>
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
                <td><input form="move_out_form" type="text" class="form-control" style="width:50%" name="initial_water_reading" value="{{ $booking->final_water_reading }}" ></td>
                <td>Initial: </td>
                <td><input form="move_out_form" type="text" class="form-control" style="width:50%" name="initial_electric_reading" value="{{ $booking->final_electric_reading }}" ></td>
            </tr>
            <tr>
                <td>Final </td>
                <td><input form="move_out_form" type="text" class="form-control" style="width:50%" name="final_water_reading" value="{{ $booking->final_water_reading }}" ></td>
                <td>Final  </td>
                <td><input form="move_out_form" type="text" class="form-control" style="width:50%" name="final_electric_reading" value="{{ $booking->final_electric_reading }}" ></td>
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
      </div>
    </div>
    <br>
    <h3>Move out charges</h3>
    <hr>
        <div class="row">
            <a id="add_row" class="btn btn-default pull-left btn btn-primary"><i class="fas fa-plus"></i> Add Row</a><a id='delete_row' class="pull-right btn btn-default btn btn-danger"><i class="fas fa-minus"></i> Delete Row</a>
		<div class="col-md-12">
            <br>
			<table class = "table table-bordered table-hover" id="tab_logic">
				<thead>
					<tr >
						<th class="text-center">
							#
						</th>
						
						<th class="text-center">
							Item/Material
						</th>
						<th class="text-center">
							Quantity
                        </th>
                        <th class="text-center">
							Amount
                        </th>
                        <th class="text-center">
							Total
						</th>
					</tr>
				</thead>
				<tbody>
                        <input form="move_out_form" type="hidden" id="no_of_items" name="no_of_items" >
					<tr id='addr0'>
						<td>
						1
						</td>
						<td>
						<input form="move_out_form" type="text" name='item0' placeholder='Item/Material' class="form-control"/>
						</td>
						<td>
						<input onkeyup="computeTotal()" form="move_out_form" type="text" name='quantity0' id='quantity0' placeholder='Quantity' class="form-control"/>
                        </td>
                        <td>
						<input onkeyup="computeTotal()" form="move_out_form" type="text" name='amount0' id='amount0' placeholder='Amount' class="form-control"/>
                        </td>
                        <td>
						<input form="move_out_form" type="text" name='total0' id='total0' placeholder='Total' class="form-control" />
						</td>
					</tr>
                    <tr id='addr1'></tr>
                </tbody>
			</table>
		</div>
        </div>
        <p class="text-right" ><button form="move_out_form" type="submit" onclick="return confirm('Are you sure you want to perform this operation? ');" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i>&nbspCONFIRM MOVEOUT</button></p>
</div>
<br>
@endsection
<script type="text/javascript">
     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input form='move_out_form' name='item"+i+"' type='text' placeholder='Item/Material'  class='form-control input-md'></td><td><input onkeyup='computeTotal()' form='move_out_form'  name='quantity"+i+"' type='text' placeholder='Quantity'  class='form-control input-md'></td><td><input onkeyup='computeTotal()' form='move_out_form' name='amount"+i+"' type='text' placeholder='Amount'  class='form-control input-md'></td><td><input form='move_out_form' name='total"+i+"' type='text' placeholder='Total'  class='form-control input-md'></td>");
form="move_out_form"
      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
      document.getElementById('no_of_items').value = i;
  });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
         document.getElementById('no_of_items').value = i;
		 }
	 });

});

    //  function computeTotal(){
    // document.getElementById('total'+$i).value = parseFloat(document.getElementById('quantity'+$i).value) * parseFloat(document.getElementById('amount'+$i).value).toFixed(2);
    // }

</script>

