@extends('layouts.header')
@section('body')
	<section id="cart_items">
		<div class="container">
				<div class="">
					<ol class="breadcrumb">
						<li><a href="{{url ('/')}}">Home</a></li>
                        <li><a href="{{url('/orders')}}">My orders</a></li>
                        <li class="active">Order Details</li>
                      
					</ol>
				</div><!--/breadcrums-->
							</div>
		</div>
	</section>
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h2>Order Details</h2>
				{{--  <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>  --}}
                
            </div>
			<div class="row">
				<div class="col-sm-6">
                        <h3>Shipping Details</h3>
					<div class="total_area">
                        <ul>
                        {{--  @if(!empty($val))  --}}
                            <li>Name <span>{{session('username')}}</span></li>
                            {{--  <li>Eco Tax <span>Rs.20</span></li>  --}}
                            <li>Shipping Address <span>{{$order[0]->address}}</span></li>
                            <li><b>Payment</b> <span>Cash on Delivery<span></li>
                    
                        </ul>    
                    </div>
				</div>
				<div class="col-sm-6">
                        <h3>Order Summary</h3>

					<div class="total_area">
						<ul>
                        {{--  @if(!empty($val))  --}}
                            <li>Cart Sub Total <span>Rs.{{$order[0]->price*$order[0]->qty}}</span></li>
                            {{--  <li>Eco Tax <span>Rs.20</span></li>  --}}
                            <li>Shipping Cost <span>Rs.{{$order[0]->shippingCost}}</span></li>
                            <li><b>Total</b> <span>Rs.{{$order[0]->totalcost}}</span></li>
						
						</ul>
							{{--  <a class="btn btn-default check_out" href="/checkout">Check Out</a>  --}}
					</div>
				</div>
            </div>
            <div class="row">
                    <h3>Products  Details</h3>
                    <div class="">
                            <div class="single-products col-sm-3">
                                    <div class="productinfo text-center">
                                        <img style="height:200px" src="../images/Products/{{$order[0]->images}}" alt="" />
                                                                    {{--  <a  href="{{url('product-details', [$item->item_id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping"></i>See details</a>  --}}
                                    </div>
                            </div>
                            <div class="col-sm-3">
                                <h3>{{$order[0]->item_name}}</h3>
                                <h3>RS. {{$order[0]->price}}</h3>
                                {{-- <input type="submit" value="Write  review" class="" id="reviewbtn" onclick="load_main_content()" class="btn btn-info btn-lg"><br><br><br> --}}
                            </div>
                            <div class="col-sm-6">
			     	 
                                    <div id="form-content">
                                    </div>
                                                         
                                <script type="text/javascript">
                                    function load_main_content()
                                    {
                                        $('#form-content').load('/review');
                                    }
                                </script>
                            </div>

                    </div>
            </div>
                
		</div>
	</section>
   @stop