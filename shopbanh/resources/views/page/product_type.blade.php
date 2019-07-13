@extends('layout')
@section('title'){{$productByTypes->first()->name}}
@endsection('title')
@section('content')
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{ route('home') }}">Home</a> / <span>Sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
						<li><a href="#">Typography</a></li>
						<li><a href="#">Buttons</a></li>
						<li><a href="#">Dividers</a></li>
						<li><a href="#">Columns</a></li>
						<li><a href="#">Icon box</a></li>
						<li><a href="#">Notifications</a></li>
						<li><a href="#">Progress bars and Skill meter</a></li>
						<li><a href="#">Tabs</a></li>
						<li><a href="#">Testimonial</a></li>
						<li><a href="#">Video</a></li>
						<li><a href="#">Social icons</a></li>
						<li><a href="#">Carousel sliders</a></li>
						<li><a href="#">Custom List</a></li>
						<li><a href="#">Image frames &amp; gallery</a></li>
						<li><a href="#">Google Maps</a></li>
						<li><a href="#">Accordion and Toggles</a></li>
						<li class="is-active"><a href="#">Custom callout box</a></li>
						<li><a href="#">Page section</a></li>
						<li><a href="#">Mini callout box</a></li>
						<li><a href="#">Content box</a></li>
						<li><a href="#">Computer sliders</a></li>
						<li><a href="#">Pricing &amp; Data tables</a></li>
						<li><a href="#">Process Builders</a></li>
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>New Products</h4>
						<div class="beta-products-details">
							<p class="pull-left">438 styles found</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($productByTypes as $productByType)
							<div class="col-sm-3">
								<div class="single-item">
									@if($productByType->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{ route('product',$productByType->id) }}"><img src="source/image/product/{{$productByType->image}}" alt="{{$productByType->name}}" title="{{ $productByType->name }}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$productByType->name}}</p>
										<p class="single-item-price">
											@if($productByType->promotion_price == 0)
											<span>{{ number_format($productByType->unit_price) }}đ</span>
											@else

											<span class="flash-del">{{ number_format($productByType->unit_price) }}đ</span>
											<span class="flash-sale">{{ number_format($productByType->promotion_price) }}đ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{ route('add-to-cart',$productByType->id) }}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{ route('product', $productByType->id) }}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>

							@if($loop->iteration % 4 == 0)
								<div class="space40">&nbsp;</div>
							@endif
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Top Products</h4>
						<div class="beta-products-details">
							<p class="pull-left">438 styles found</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{ route('product',$productByType->id) }}"><img src="source/assets/dest/images/products/1.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">Sample Woman Top</p>
										<p class="single-item-price">
											<span>$34.55</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="space40">&nbsp;</div>
						
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection('content')