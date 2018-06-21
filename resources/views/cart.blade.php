@extends('layouts.header')
@section('body')
	<section id="cart_items">
		<div class="container">
				<div class="">
					<ol class="breadcrumb">
						<li><a href="{{url ('/')}}">Home</a></li>
					    {{-- <li><a href="{{url ('/product-details/{$id}')}}">Home</a></li> --}}
						<li class="active">Cart</li>
					</ol>
				</div><!--/breadcrums-->
				@if(!empty(session('email')))
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description"></td>
							<td class="image">Item</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
											
							  @if(!empty($data) && !empty($val))
							    	@foreach($data as $d)
								<tr>
								<td class="cart_total">
									<p class="cart_total_price"></p>
								</td>
								<td class="cart_description">
									<h4><a href="">{{$d->item_name}}</a></h4>
									<p>Product ID: {{$d->item_id}}</p>
								</td>
								<td class="cart_price">
									<p>Rs. {{$d->price}}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										
										<input class="cart_quantity_input" type="text" name="quantity" value="{{$d->qty}}" autocomplete="off" size="2" disabled>
										{{-- <a class="cart_quantity_down" href=""> - </a> --}}
										
									</div>
								</td>
								<td class="cart_total">
									
									 <p class="cart_total_price">Rs.{{$val[$d->item_id]}}</p>
									
									   {{-- <p class="cart_total_price">Please purchase some items</p> --}}
									

								</td>
								<td>
									<button type="button" class="btn btn-fefault cart" id=" {{$d->item_id}}">
										<a href="{{url ('cart/destroy/'. $d->item_id) }}" style="color:#ffffff">Delete</a></li>
									</button>
								</td>
							  </tr>
						            @endforeach
							    @else
							    <td class="cart_total">
									<p class="cart_total_price">Nothing to show</p>
								</td>
							    @endif
						@else
						       
									<div class="register-req">
										<p>Please Login to enhance your experience.</p>
									</div><!--/register-req-->
								
						@endif
					 
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
@if(!empty(session('email')))
	<section id="do_action">
		<div class="container">
			{{-- <div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> --}}
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							@if(!empty($val))
								<li>Cart Sub Total <span>Rs.{{$bill}}</span></li>
								<li>Eco Tax <span>Rs.20</span></li>
								<li>Shipping Cost <span>Free</span></li>
								<li>Total <span>Rs.{{$final_bill}}</span></li>
							@else
								<li>Cart Sub Total <span>0</span></li>
								<li>Eco Tax <span>Rs.20</span></li>
								<li>Shipping Cost <span>Free</span></li>
								<li>Total <span>0</span></li>
							@endif
						</ul>
							<a class="btn btn-default check_out" href="/checkout">Check Out</a>
					</div>
				</div>
			</div>
			@endif
		</div>
	</section><!--/#do_action-->
    {{-- <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script> --}}
@stop