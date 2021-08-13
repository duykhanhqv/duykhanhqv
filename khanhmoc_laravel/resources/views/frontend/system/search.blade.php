@extends('frontend.master')
@section('content')
<!-- pages-title-start -->
<div class="pages-title section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h2>Shop</h2>
					<ul class="text-left">
						<li><a href="index.html">@lang('Home') </a></li>
						<li><span> // </span>@lang('Shop')</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pages-title-end -->
<!-- shop content section start -->
<div class="pages products-page section-padding text-center">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="right-products">
					<div class="row">
						<div class="col-xs-12">
							<div class="section-title clearfix">
								<ul>
									<li>
										<ul class="nav-view">
											<li><a href="product-grid.html"> <i class="mdi mdi-view-module"></i> </a>
											</li>
											<li><a href="product-list.html"> <i class="mdi mdi-view-list"></i> </a></li>
										</ul>
									</li>
									<li class="sort-by floatright">
										@lang('Showing 1-12 of 89 Results')
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="grid-content">
							@foreach ($list_products as $item)
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="single-product">
									<div class="product-img">
										<div class="pro-type">
											<span>new</span>
										</div>
										<a href="{{route('f.detailProduct',[$item->id])}}"><img src="frontend/img/product/<?php foreach ($item->ProductImgs as $key) {
                                                    echo($key->url);
                                                }?>" alt="frontend/img/product/<?php foreach ($item->ProductImgs as $key) {
                                                echo($key->alt);
                                            }?>" /></a>
										<div class="actions-btn">
											<a class="addToCart" data-href="{{ route('f.addProductToCartAjax') }}"
												data-id="{{($item->id)}}"><i class="mdi mdi-cart"></i></a> <a href="#"
												data-toggle="modal" data-target="#quick-view{{$item->id}}"><i
													class="mdi mdi-eye"></i></a>
											<a href="#"><i class="mdi mdi-heart"></i></a>
										</div>
									</div>
									<div class="product-dsc">
										<p><a href="{{route('f.detailProduct',[$item->id])}}">{{$item->name}}</a>
										</p>
										<div class="ratting">
											@php
											$temp=0;
											$average=0;
											$star=0;
											$count=0;
											@endphp
											@foreach ($item->Rating as $key)
											@php
											$star=$star+$key->pivot->rating;
											$count+=1;
											@endphp
											@endforeach
											@if ($count==0)
											@else
											@php
											$average=floor($star/$count);
											@endphp
											@endif
											@if ($average==1)
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star-outline"></i>
											<i class="mdi mdi-star-outline"></i>
											<i class="mdi mdi-star-outline"></i>
											<i class="mdi mdi-star-outline"></i>
											@elseif ($average==2)
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star-outline"></i>
											<i class="mdi mdi-star-outline"></i>
											<i class="mdi mdi-star-outline"></i>
											@elseif ($average==3)
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star-outline"></i>
											<i class="mdi mdi-star-outline"></i>
											@elseif ($average==4)
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star-outline"></i>
											@elseif ($average==5)
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star"></i>
											<i class="mdi mdi-star"></i>
											@elseif ($average==0)
											<i class="mdi mdi-star-outline"></i>
											<i class="mdi mdi-star-outline"></i>
											<i class="mdi mdi-star-outline"></i>
											<i class="mdi mdi-star-outline"></i>
											<i class="mdi mdi-star-outline"></i>
											@endif
											@php
											@endphp
										</div>
										<span>{{number_format($item->price)}}</span>
									</div>
								</div>
							</div>
							<!-- single product end -->
							@endforeach


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
</div>
<!-- shop content section end -->
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
														<div class="simpleLens-container tab-pane active fade in"
															id="q-sin-2">
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
															<a class="simpleLens-image"
																data-lens-image="img/products/z3.jpg" href="#"><img
																	src="img/products/z3.jpg" alt=""
																	class="simpleLens-big-image"></a>
														</div>
														<div class="simpleLens-container tab-pane fade in" id="q-sin-4">
															<div class="pro-type">
																<span>new</span>
															</div>
															<a class="simpleLens-image"
																data-lens-image="img/products/z4.jpg" href="#"><img
																	src="img/products/z4.jpg" alt=""
																	class="simpleLens-big-image"></a>
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
													<li class="active"><a data-toggle="tab" href="#q-sin-2"> <img
																src="img/products/s2.jpg" alt="small image" /> </a></li>
													<li><a data-toggle="tab" href="#q-sin-3"> <img
																src="img/products/s3.jpg" alt="small image" /> </a></li>
													<li><a data-toggle="tab" href="#q-sin-4"> <img
																src="img/products/s4.jpg" alt="small image" /> </a></li>
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
													@php
													$temp=0;
													$average=0;
													$star=0;
													$count=0;
													@endphp
													@foreach ($item->Rating as $key)
													@php
													$star=$star+$key->pivot->rating;
													$count+=1;
													@endphp
													@endforeach
													@if ($count==0)
													@else
													@php
													$average=floor($star/$count);
													@endphp
													@endif
													<p>( {{$count}} @lang('Rating') )</p>

													@if ($average==1)
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star-outline"></i>
													<i class="mdi mdi-star-outline"></i>
													<i class="mdi mdi-star-outline"></i>
													<i class="mdi mdi-star-outline"></i>
													@elseif ($average==2)
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star-outline"></i>
													<i class="mdi mdi-star-outline"></i>
													<i class="mdi mdi-star-outline"></i>
													@elseif ($average==3)
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star-outline"></i>
													<i class="mdi mdi-star-outline"></i>
													@elseif ($average==4)
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star-outline"></i>
													@elseif ($average==5)
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													<i class="mdi mdi-star"></i>
													@elseif ($average==0)
													<i class="mdi mdi-star-outline"></i>
													<i class="mdi mdi-star-outline"></i>
													<i class="mdi mdi-star-outline"></i>
													<i class="mdi mdi-star-outline"></i>
													<i class="mdi mdi-star-outline"></i>
													@endif
													@php
													@endphp
												</div>
												<h5><del></del>{{number_format($item->price)}}</h5>
												<div>
													<?php echo $item->description ?>
													<br>
													<br>
													<br>
												</div>
												<div class="list-btn">
													<a class="addToCart"
														data-href="{{ route('f.addProductToCartAjax') }}"
														data-id="{{($item->id)}}">@lang('add to cart')</a>
													<a href="#">@lang('wishlist')</a>
													<a href="#" data-toggle="modal" data-target="#quick-view">zoom</a>
												</div>
												<div class="share-tag clearfix">
													<ul class="blog-share floatleft">
														<li>
															<h5>share </h5>
														</li>
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
<script src="{{ asset('frontend/bootstrap.min.js')}}"></script>

@endsection