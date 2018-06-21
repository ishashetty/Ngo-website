@extends('layouts.header')	
@section('body')
{{--  @section('shoppage')  --}}
	
	
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
									</div>  
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title"><a href="#">Toys</a></h4>
										</div>
									</div>
								
								</div><!--/category-products-->  --}}
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
							</div>
						{{--  <div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->  --}}
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
										<li><a href="{{url('shop/'.$category.'/0-500')}}"> <span class="pull-right"></span>Under Rs.500</a></li>
										<li> <a href="{{url('shop/'.$category.'/500-1000')}}"> <span class="pull-right"></span>Rs.500 to Rs. 1000</a></li>
										<li><a  href="{{url('shop/'.$category.'/1000-2000')}}"> <span class="pull-right"></span>Rs. 1000 to Rs. 2000</a></li>

								</ul>
								 {{--  <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>Rs 0</b> <b class="pull-right">$ 600</b>  --}}
								 {{--  <input type="text" placeholder="Rs.Min" id="min">  --}}
							</div>
						</div><!--/price-range-->
						
						
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">{{$category}}</h2>
						@if(!count($items)==0)
							@foreach($items as $item)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img style="height:200px" src="{{asset('images/Products/'.$item->images.'')}}" alt="" />
												<h2>RS.{{$item->price}}</h2>
												<p>{{$item->item_name}}</p>
												<a href="{{url('product-details', [$item->item_id]) }}" class="btn btn-default add-to-cart"><i class="fa "></i>See Details</a>
											</div>
											<div class="product-overlay productinfo text-center">
												<div class="overlay-content">
													<h2>RS.{{$item->price}}</h2>
													<p><a href="{{url('product-details', [$item->item_id]) }}" style="color:white">{{$item->item_name}}</a></p>
													<a href="{{url('product-details', [$item->item_id]) }}"class="btn btn-default add-to-cart"><i class="fa fa-shopping"></i>See details</a>
												</div>
											</div>
										</div>
									
									</div>
								</div>
							@endforeach
						@else
							<h1>No items found</h1>
						@endif
					</div style="position:fixed;bottom:0">
						{{$items->render()}}
					</div>
							{{--  <ul class="pagination">
								<li class="active"><a href="">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href="">&raquo;</a></li>
							</ul>  --}}
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
	
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
@stop