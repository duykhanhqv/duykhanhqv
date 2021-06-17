@extends('frontend.master')
@section('content')
        <!-- pages-title-start -->
		<div class="pages-title section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="pages-title-text text-center">
							<h2>Product Grid View</h2>
							<ul class="text-left">
								<li><a href="index.html">Home </a></li>
								<li><span> // </span>Shop</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- pages-title-end -->
		<!-- product-grid-view content section start -->
		<section class="pages products-page section-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="sidebar left-sidebar">
							<div class="s-side-text">
								<div class="sidebar-title clearfix">
									<h4 class="floatleft">Categories</h4>
									<h5 class="floatright"><a href="#">All</a></h5>
								</div>
								<div class="categories left-right-p">
									<ul id="accordion" class="panel-group clearfix">
										<li class="panel">
											<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
												<div class="medium-a">
													Women
												</div>
											</div>
											<div class="panel-collapse collapse in" id="collapse1">
												<div class="normal-a">
													<a href="#">Men Bag</a>
													<a href="#">Shoes</a>
													<a href="#">Watch</a>
													<a href="#">T-shirt</a>
													<a href="#">shirt</a>
												</div>
											</div>
										</li>
										<li class="panel">
											<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">
												<div class="medium-a">
													Fashion
												</div>
											</div>
											<div class="paypal-dsc panel-collapse collapse" id="collapse2">
												<div class="normal-a">
													<a href="#">Men Bag</a>
													<a href="#">Shoes</a>
													<a href="#">Watch</a>
													<a href="#">T-shirt</a>
													<a href="#">shirt</a>
												</div>
											</div>
										</li>
										<li class="panel">
											<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse3">
												<div class="medium-a">
													Accessories
												</div>
											</div>
											<div class="paypal-dsc panel-collapse collapse" id="collapse3">
												<div class="normal-a">
													<a href="#">Men Bag</a>
													<a href="#">Shoes</a>
													<a href="#">Watch</a>
													<a href="#">T-shirt</a>
													<a href="#">shirt</a>
												</div>
											</div>
										</li>
										<li class="panel">
											<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse4">
												<div class="medium-a">
													Top Brands
												</div>
											</div>
											<div class="paypal-dsc panel-collapse collapse" id="collapse4">
												<div class="normal-a">
													<a href="#">Men Bag</a>
													<a href="#">Shoes</a>
													<a href="#">Watch</a>
													<a href="#">T-shirt</a>
													<a href="#">shirt</a>
												</div>
											</div>
										</li>
										<li class="panel">
											<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse5">
												<div class="medium-a">
													Jewelry
												</div>
											</div>
											<div class="paypal-dsc panel-collapse collapse" id="collapse5">
												<div class="normal-a">
													<a href="#">Men Bag</a>
													<a href="#">Shoes</a>
													<a href="#">Watch</a>
													<a href="#">T-shirt</a>
													<a href="#">shirt</a>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title">
									<h4>price</h4>
								</div>
								<div class="range-slider clearfix">
									<form action="#" method="get">
										<label><span>You range</span> <input type="text" id="amount" readonly /></label>
										<div id="slider-range"></div>
									</form>
								</div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title clearfix">
									<h4 class="floatleft">size</h4>
									<h5 class="floatright"><a href="#">All</a></h5>
								</div>
								<div class="size-select clearfix">
									<a href="#">m</a>
									<a href="#">s</a>
									<a href="#">l</a>
									<a href="#">sl</a>
									<a href="#">xl</a>
								</div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title clearfix">
									<h4 class="floatleft">color</h4>
									<h5 class="floatright"><a href="#">All</a></h5>
								</div>
								<div class="color-select clearfix">
									<span></span>
									<span></span>
									<span class="outline"></span>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title clearfix">
									<h4 class="floatleft">brands</h4>
									<h5 class="floatright"><a href="#">All</a></h5>
								</div>
								<div class="brands-select clearfix">
									<ul>
										<li>
											<a href="#">Offset</a>
											<a href="#">Ecko Untid</a>
											<a href="#">Addidas</a>
											<a href="#">Custo</a>
											<a href="#">Guccies</a>
										</li>
										<li>
											<a href="#">Unlimited</a>
											<a href="#">Shoes</a>
											<a href="#">Watch</a>
											<a href="#">Color Full</a>
											<a href="#">Best choice</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="s-side-text">
								<div class="banner clearfix">
									<a href="#"><img src="img/products/banner.jpg" alt="" /></a>
									<div class="banner-text">
										<h2>best</h2> <br />
										<h2 class="banner-brand">brand</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-9">
						<div class="right-products">
							<div class="row">
								<div class="col-xs-12">
									<div class="section-title clearfix">
										<ul>
											<li>
												<ul class="nav-view">
													<li class="active"><a data-toggle="tab" href="#grid"> <i class="mdi mdi-view-module"></i> </a></li>
													<li><a data-toggle="tab" href="#list"> <i class="mdi mdi-view-list"></i> </a></li>
												</ul>
											</li>
											<li class="sort-by floatright">
												Showing 1-9 of 89 Results
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="tab-content grid-content">
									<div class="tab-pane fade in active text-center" id="grid">
										@foreach ($list_products as $item)	
										<div class="col-xs-12 col-sm-6 col-md-4">
											<div class="single-product">
												<div class="product-img">
													<div class="pro-type">
														<span>new</span>
													</div>
													<a href="{{route('f.detailProduct',[$item->id])}}"><img  src="frontend/img/product/<?php foreach ($item->ProductImgs as $key) {
														echo($key->url);
													}?>" alt="frontend/img/product/<?php foreach ($item->ProductImgs as $key) {
                                                    echo($key->alt);
                                                }?>" /></a>
													<div class="actions-btn">
														<a href="#"><i class="mdi mdi-cart"></i></a>
														<a href="#" data-toggle="modal" data-target="#quick-view{{$item->id}}"><i class="mdi mdi-eye"></i></a>
														<a href="#"><i class="mdi mdi-heart"></i></a>
													</div>
												</div>
												<div class="product-dsc">
													<p><a href="{{route('f.detailProduct',[$item->id])}}">{{$item->name}}</a></p>
													<div class="ratting">
														<i class="mdi mdi-star"></i>
														<i class="mdi mdi-star"></i>
														<i class="mdi mdi-star"></i>
														<i class="mdi mdi-star-half"></i>
														<i class="mdi mdi-star-outline"></i>
													</div>
													<span>{{number_format($item->price)}}</span>
												</div>
											</div>
										</div>
										<!-- single product end -->
										@endforeach
									</div>
									<div class="tab-pane fade in" id="list">
										<div class="col-xs-12">
											@foreach ($list_products as $item)	
											<div class="single-list-view">
												<div class="row">
													<div class="col-xs-12 col-md-4">
														<div class="list-img">
															<div class="product-img">
																<div class="pro-type sell">
																	<span>sell</span>
																</div>
																<a href="{{route('f.detailProduct',[$item->id])}}"><img  width="270px" height="350px" src="frontend/img/product/<?php foreach ($item->ProductImgs as $key) {
																	echo($key->url);
																}?>" alt="frontend/img/product/<?php foreach ($item->ProductImgs as $key) {
														echo($key->alt);
													}?>" /></a>
															</div>
														</div>
													</div>
													<div class="col-xs-12 col-md-8">
														<div class="list-text">
															<h3><a href="{{route('f.detailProduct',[$item->id])}}">{{$item->name}}</a></h3>
															<span>Summer men’s fashion</span>
															<div class="ratting floatright">
																<p>( 27 Rating )</p>
																<i class="mdi mdi-star"></i>
																<i class="mdi mdi-star"></i>
																<i class="mdi mdi-star"></i>
																<i class="mdi mdi-star-half"></i>
																<i class="mdi mdi-star-outline"></i>
															</div>
															<h5><del></del>{{number_format($item->price)}}</h5>
															{{$item->desc}}															<div class="list-btn">
																<a href="#">add to cart</a>
																<a href="#">wishlist</a>
																<a href="#" data-toggle="modal" data-target="#quick-view">zoom</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- single product end -->
											@endforeach
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="pagnation-ul">
										<ul class="clearfix">
											<li><a href="#"><i class="mdi mdi-menu-left"></i></a></li>
											<li><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#">...</a></li>
											<li><a href="#">10</a></li>
											<li><a href="#"><i class="mdi mdi-menu-right"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- product-grid-view content section end -->
        <!-- quick view start -->
				@foreach ($list_products as $item)
				<div class="product-details quick-view modal animated zoomInUp" id="quick-view{{($item->id)}}">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="d-table">
									<div class="d-tablecell">
										<div class="modal-dialog">
											<div class="main-view modal-content">
												<div class="modal-footer" data-dismiss="modal">
													<span>x</span>
												</div>
												<div class="row">
													<div class="col-xs-12 col-sm-5 col-md-4">
														<div class="quick-image">
															<div class="single-quick-image text-center">
																<div class="list-img">
																	<div class="product-img tab-content">
																		<div class="simpleLens-container tab-pane fade in" id="q-sin-1">
																			<div class="pro-type">
																				<span>new</span>
																			</div>
																			<a class="simpleLens-image" data-lens-image="frontend/img/product/<?php foreach($item->ProductImgs as $key)
																				echo $key->url;
																			?>" href="#"><img src="frontend/img/product/<?php foreach($item->ProductImgs as $key)
																				echo $key->url;
																			?>" alt="<?php foreach($item->ProductImgs as $key)
																		echo $key->alt;
																	?>" class="simpleLens-big-image"></a>
																		</div>
																		<div class="simpleLens-container tab-pane active fade in" id="q-sin-2" >
																			<div class="pro-type sell">
																				<span>sell</span>
																			</div>
																			<a class="simpleLens-image" data-lens-image="frontend/img/product/<?php foreach($item->ProductImgs as $key)
																				echo $key->url;
																			?>" href="#"><img src="frontend/img/product/<?php foreach($item->ProductImgs as $key)
																				echo $key->url;
																			?>" alt="" class="simpleLens-big-image"></a>
																		</div>
																		<div class="simpleLens-container tab-pane fade in" id="q-sin-3">
																			<div class="pro-type">
																				<span>-15%</span>
																			</div>
																			<a class="simpleLens-image" data-lens-image="img/products/z3.jpg" href="#"><img src="img/products/z3.jpg" alt="" class="simpleLens-big-image"></a>
																		</div>
																		<div class="simpleLens-container tab-pane fade in" id="q-sin-4">
																			<div class="pro-type">
																				<span>new</span>
																			</div>
																			<a class="simpleLens-image" data-lens-image="img/products/z4.jpg" href="#"><img src="img/products/z4.jpg" alt="" class="simpleLens-big-image"></a>
																		</div>
																	</div>
																</div>
															</div>
															<div class="quick-thumb">
																<ul class="product-slider">
																	<li><a data-toggle="tab" href="#q-sin-1"> <img src="frontend/img/product/<?php foreach($item->ProductImgs as $key)
																		echo $key->url;
																	?>" alt="<?php foreach($item->ProductImgs as $key)
																		echo $key->alt;
																	?>" /> </a></li>
																	<li class="active"><a data-toggle="tab" href="#q-sin-2"> <img src="img/products/s2.jpg" alt="small image" /> </a></li>
																	<li><a data-toggle="tab" href="#q-sin-3"> <img src="img/products/s3.jpg" alt="small image" /> </a></li>
																	<li><a data-toggle="tab" href="#q-sin-4"> <img src="img/products/s4.jpg" alt="small image" /> </a></li>
																</ul>
															</div>
														</div>						
													</div>
													<div class="col-xs-12 col-sm-7 col-md-8">
														<div class="quick-right">
															<div class="list-text">
																<h3>{{($item->name)}}</h3>
																<span></span>
																<div class="ratting floatright">
																	<p>( 27 Rating )</p>
																	<i class="mdi mdi-star"></i>
																	<i class="mdi mdi-star"></i>
																	<i class="mdi mdi-star"></i>
																	<i class="mdi mdi-star-half"></i>
																	<i class="mdi mdi-star-outline"></i>
																</div>
																<h5><del>$79.30</del>{{number_format($item->price)}}</h5>
																{{$item->desc}}
																<div class="list-btn">
																	<a href="#">add to cart</a>
																	<a href="#">wishlist</a>
																	<a href="#" data-toggle="modal" data-target="#quick-view">zoom</a>
																</div>
																<div class="share-tag clearfix">
																	<ul class="blog-share floatleft">
																		<li><h5>share </h5></li>
																		<li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
																		<li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
																		<li><a href="#"><i class="mdi mdi-linkedin"></i></a></li>
																		<li><a href="#"><i class="mdi mdi-vimeo"></i></a></li>
																		<li><a href="#"><i class="mdi mdi-dribbble"></i></a></li>
																		<li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- quick view end -->
@endsection