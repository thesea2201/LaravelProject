@extends('layout')
@section('title')Sea Sea Bakery
@endsection('title')
@section('content')
<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
			<div class="banner" >
				<ul>
					<!-- THE FIRST SLIDE -->
					@foreach($slides as $slide)
						<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
							<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$slide->image}}" data-src="source/image/slide/{{$slide->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$slide->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
							</div>
						</div>

					</li>
					@endforeach
					
						</li>
					</ul>
				</div>
			</div>

			<div class="tp-bannertimer"></div>
		</div>
	</div>
	<!--slider-->
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4>New Products</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{count($newProducts)}} styles found</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($newProducts as $newProduct)
							<div class="col-sm-3">
								<div class="single-item">
									@if($newProduct->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
									<div class="single-item-header">
										<a href="product.html"><img src="source/image/product/{{$newProduct->image}}" alt="{{$newProduct->name}}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$newProduct->name}}</p>
										<p class="single-item-price">
											@if($newProduct->promotion_price == 0)
											<span>{{$newProduct->unit_price}}đ</span>
											@else

											<span class="flash-del">{{$newProduct->unit_price}}đ</span>
											<span class="flash-sale">{{$newProduct->promotion_price}}đ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>

							@if($loop->iteration % 4 == 0)
								<div class="space40">&nbsp;</div>
							@endif
							@endforeach
						</div>
						<div class="row">{{$newProducts->links()}}</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sale Products</h4>
						<div class="beta-products-details">
							<p class="pull-left">{{count($promoProducts)}} styles found</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							@foreach($promoProducts as $promoProduct)
							<div class="col-sm-3">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									<div class="single-item-header">
										<a href="product.html"><img src="source/image/product/{{$promoProduct->image}}" alt="{{$promoProduct->name}}"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$promoProduct->name}}</p>
										<p class="single-item-price">
											<span class="flash-del">{{$promoProduct->unit_price}}đ</span>
											<span class="flash-sale">{{$promoProduct->promotion_price}}đ</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>

							@if($loop->iteration % 4 == 0)
								<div class="space40">&nbsp;</div>
							@endif
							@endforeach
						</div>
						<div class="row">{{$promoProducts->links()}}</div>						
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection('content')