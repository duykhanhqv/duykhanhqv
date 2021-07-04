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
										@foreach ($departments as $item)
										<li class="panel">
											<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse{{$item->id}}">
												<div class="medium-a">
													{{$item->name}}
												</div>
											</div>
											<div class="paypal-dsc panel-collapse collapse" id="collapse{{$item->id}}">
												<div class="normal-a">
													@foreach ($item->Categorys as $item2)
													<a href="{{route('f.listProduct',[$item2->id])}}">{{$item2->name}}</a>
													@endforeach
													
												</div>
											</div>
										</li>	
										@endforeach
										
										
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
													<li class="active"><a class="productsGirdAjax" data-href="{{route('f.productsGirdAjax')}}" data-id="{{($category_id)}}"> <i class="mdi mdi-view-module"></i> </a></li>
													<li><a class="productsListAjax" data-href="{{route('f.productsListAjax')}}" data-id="{{($category_id)}}"> <i class="mdi mdi-view-list"></i> </a></li>
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
														<a class="addToCart" data-href="{{ route('f.addProductToCartAjax') }}"
														data-id="{{($item->id)}}"><i class="mdi mdi-cart"></i></a>														<a href="#" data-toggle="modal" data-target="#quick-view{{$item->id}}"><i class="mdi mdi-eye"></i></a>
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
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="pagnation-ul">
										<ul>
											{{-- {{ $list_products->from() }} --}}
										</ul>
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
																<h5><del></del>{{number_format($item->price)}}</h5>
																{{$item->desc}}
																<div class="list-btn">
																	<a  class="addToCart"
                                                    data-href="{{ route('f.addProductToCartAjax') }}"
                                                    data-id="{{($item->id)}}">add to cart</a>
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