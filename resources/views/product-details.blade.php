@extends('layouts.header')

{{--This is product -detail page--}}
@section('body')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							{{--  <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#bags1">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Bags
										</a>
									</h4>
								</div>
								<div id="bags1" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
										<li><a href="{{url('shop/laptop_bags')}}">Laptopbags </a></li>
											<li><a href="">Leatherbag </a></li>
											<li><a href="">handbag </a></li>
											<li><a href="">Purse</a></li>
											{{--  <li><a href="">ASICS </a></li>  
										</ul>
									</div>
								</div>
							</div>
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mats">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mats
										</a>
									</h4>
								</div>
								<div id="mats" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Yoga Mats</a></li>
											<li><a href="">Door Mats</a></li>
											<li><a href="">Floor Mats</a></li>
											<li><a href="">Blankets</a></li>
											{{--  <li><a href="">Versace</a></li>  
										</ul>
									</div>
								</div>
							</div>    --}}
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{url('shop/bags')}}">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{url('shop/mats')}}">Mats</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{url('shop/toys')}}">Toys</a></h4>
								</div>
							</div>
						
						</div><!--/category-products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product zoom" >
							<img src="{{asset('images/product-details/'.$details[0]->images)}}" alt="" />
								{{--  <h3>ZOOM</h3>  --}}
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								{{--  <img src="images/product-details/new.jpg" class="newarrival" alt="" />  --}}
								<h2>{{$details[0]->item_name}}</h2>
								{{--  <p></p>  --}}
								<img src="images/product-details/{{$details[0]->images}}" alt="" />
								<span>
								<span>Rs. {{$details[0]->price}}</span>
								<br>
									<label>Quantity:</label>
									<form  action="{{url ('/addToCart/'. $details[0]->item_id) }}" method="post"> 
										 {{ csrf_field() }}
									<input type="text" value="1" name="val"  id="cart"/><br>
									<button class="btn btn-primary "href=""><i class="fa fa-shopping-cart" style="color:#ffffff"></i>Add to Cart</li></button>
								</form>
								</span>
								<br>
								<p><b>Availability:</b>
								@if($details[0]->is_stock==0)
								Not in Stock
								@else
								In Stock
								@endif
								</p>
								<br>
								<p><b>Category :</b>{{$details[0]->category}}</p> 
								@if($details[0]->rating!=0)
								<p><b>Rating :</b>{{$details[0]->rating}}<span>★</span></p>  
								@endif
							</div>
						</div>	
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"  ><a  href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">NGO Profile</a></li>
								{{--  <li><a href="#tag" data-toggle="tab">Tag</a></li>  --}}
								<li class=""><a href="#reviews" data-toggle="tab">Reviews ({{count($review)}})</a></li>
							</ul>
						</div>
						<div class="tab-content">
							{{--  Product description  --}}
							<div class="tab-pane fade active in" id="details" style="margin-left:5px" >
								<p>{{$details[0]->description}}</p>
							</div>
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
								</div>	
							</div>
						 	<div class="tab-pane fade " id="reviews" >
								@if(!count($review)==0)
								<div class="col-sm-12">
									@foreach($review as $review)
										<ul>
										<li><a style="font-size: 10px" ><i class="fa fa-user"></i>{{$review->name}}</a></li>
											{{--  <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>  --}}
										<li><a style="font-size: 10px" ><i class="fa fa-calendar-o"></i>{{$review->date}}</a></li>
										<p style="font-size: 13px">{{$review->review}}</p>
										</ul>
										<hr>
									@endforeach
									
								</div>
								@else
								<p>No Customer has reviewed yet</p><br>
								@endif
								{{--  <form action="{{url('/review/'.$details[0]->item_id)}}" method="">  --}}
								<input type="submit" value="Write  review" id="reviewbtn" onclick="load_main_content()" class="btn btn-primary btn-sm"><br><br><br>
								<div id="form-content">
								</div>
											
							</div>
							<script type="text/javascript">
								function load_main_content()
								{
									$('#form-content').load('/review');
								}
							</script>
						
						</div>
					</div>{{--/category-tab--}}
									
				</div>
			</div>
			{{-- <div class="col-sm-12">{{--recommended_items
					@include('recommended')
				</div> --}}

		</div>
	</section>
	
	
  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
@stop
{{-- </body>
</html> --}}