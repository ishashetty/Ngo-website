@extends('layouts.header')
@section('body')
	<section id="cart_items">
		<div class="container">
			<div class="">
				<ol class="breadcrumb">
				  <li><a href="{{url ('/')}}">Home</a></li>
				  <li><a href="{{url ('cart')}}">Cart</a></li>

				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
            @if(empty(session('email')))
				<div class="register-req">
					<p>Please Login</p>
				</div><!--/register-req-->
            @else
			<div class="shopper-informations">
				 {{-- <div class="row"> --}}
					
				{{--	<div class="col-md-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								{{-- <p>{{$address}}</p>
								<form method="post" action="{{ action('CheckoutController@update')}}">
									  {{ csrf_field() }}
									<input type="text" placeholder="Email*" value="{{$data[0]->email}}" disabled>
									<input type="text" placeholder="First Name *" name="name" value="{{$data[0]->first_name}}" disabled>
									<input type="text" placeholder="Last Name *" name="lname" value="{{$data[0]->last_name}}" disabled>
									@if(empty($data[0]->address) && empty($data[0]->mobile_number) && empty($data[0]->pincode) && empty($stateVal) && empty($regionVal))
										<input type="text" placeholder="Address 1 *" name="add">
										<input type="text" placeholder="Mobile Phone" name="mobile">
									    <input type="text" placeholder="Zip / Postal Code *" name="zip">
									@else
										<input type="text" placeholder="Address 1 *" name="add" value="{{$data[0]->address}}" required/>
										<input type="text" placeholder="Mobile Phone" name="mobile" value="{{$data[0]->mobile_number}}" required/>
										<input type="text" placeholder="Zip / Postal Code *" name="zip" value="{{$data[0]->pincode}}" required/>
										<input type="text" placeholder="Region *" name="add" value="{{$stateVal}}" disabled/>
										<input type="text" placeholder="State *" name="add" value="{{$regionVal}}" disabled/>
										<br><br>
									@endif
									
									
									
							{{-- //	</form> 
							</div>
						</div>
					</div> --}}
					{{-- <div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label><br>
							<br>
							<button class="btn btn-primary"href="">Continue</button>
						</div>	
					</div>					 --}}
				{{-- </div> --}}
			{{-- </div> --}}
			{{-- </form> --}}
		<div class="second">
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						{{-- <th class="cart_menu" >
							BILL:
						</th> --}}
						{{-- <h1 class="cart_menu" >Bill</h1> --}}
					</thead>
					<tbody>
						<tr>
							
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>Rs.{{$bill}}</td>
									</tr>
									<tr>
										<td>Tax</td>
										<td>Rs.20</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										@if($bill >=500)
										<td>Rs.0</td>
										@else
										<td>Rs.50</td>
										@endif
										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>Rs.{{$final_bill}}</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Cash On Delivery</label>
					</span>
					     @if($final_bill!=0)
					        <a class="btn btn-primary" href="#sec">Continue</a>
					     @else
							<div class="register-req">
							  <p>Purchase something inorder to complete transaction</p>
						    </div><!--/register-req-->
				         @endif
				</div>
				@endif
				
		</div>
			<div class="shopper-informations" id="sec" style="position:relative;margin-top:5%;padding:10px">
				<div class="row">
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								{{-- <p>{{$address}}</p> --}}
								<form method="post" action="{{ action('CheckoutController@update')}}">
									  {{ csrf_field() }}
									<input type="text" placeholder="Email*" value="{{$data[0]->email}}" disabled>
									<input type="text" placeholder="First Name *" name="name" value="{{$data[0]->first_name}}" disabled>
									<input type="text" placeholder="Last Name *" name="lname" value="{{$data[0]->last_name}}" disabled>
									@if(empty($data[0]->address) && empty($data[0]->mobile_number) && empty($data[0]->pincode) && empty($stateVal) && empty($regionVal))
										<input type="text" placeholder="Address 1 *" name="add">
										<input type="text" placeholder="Mobile Phone" name="mobile">
									    <input type="text" placeholder="Zip / Postal Code *" name="zip">
									@else
										<input type="text" placeholder="Address 1 *" name="add" value="{{$data[0]->address}}" required/>
										<input type="text" placeholder="Mobile Phone" name="mobile" value="{{$data[0]->mobile_number}}" required/>
										<input type="text" placeholder="Zip / Postal Code *" name="zip" value="{{$data[0]->pincode}}" required/>
										<input type="text" placeholder="Region *" name="add" value="{{$stateVal}}" disabled/>
										<input type="text" placeholder="State *" name="add" value="{{$regionVal}}" disabled/>
										<br><br>
									@endif
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label><br>
							<button class="btn btn-primary butposition" syle="background-color:#ffffff" >Update Address</button>
						     &nbsp&nbsp&nbsp&nbsp
							<button class="btn btn-primary butposition" syle="background-color:#ffffff" ><a  href="{{url('send')}}" style="text-decoration:none;color:#ffffff;bottom:700px">Complete Transaction</a></button>
						    <br><br><br><br>
					    </div>	
					</div>	
					</form>				
				</div>
			</div>
	</div>
	</section> <!--/#cart_items-->




@stop
{{-- </body>
</html> --}}