@extends('frontend.master')
@section('content')
<!-- slider-section-start -->
<div class="main-slider-one slider-area">
    <div id="wrapper">
        <div class="slider-wrapper">
            <div id="mainSlider" class="nivoSlider">
                <img src="frontend/img/slider/home1/1.jpg" alt="main slider" title="#htmlcaption" />
                <img src="frontend/img/slider/home1/2.jpg" alt="main slider" title="#htmlcaption2" />
            </div>
            <div id="htmlcaption" class="nivo-html-caption slider-caption">
                <div class="container">
                    <div class="slider-left slider-right">
                        <div class="slide-text animated bounceInRight">
                            <h3 class="bounceInDown">{{$msg}}</h3>
                            <h1>Men’s Fashion 2016</h1>
                            <span>Starting at $65.00. Don’t miss out!</span>
                        </div>
                        <div class="one-p animated bounceInLeft">
                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum".</p>
                        </div>
                        <div class="animated slider-btn fadeInUpBig">
                            <a class="shop-btn" href="shop.html">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                <div class="container">
                    <div class="slider-left slider-right">
                        <div class="slide-text animated bounceInRight">
                            <h3>new collection</h3>
                            <h1>Men’s Fashion 2016</h1>
                            <span>Starting at $65.00. Don’t miss out!</span>
                        </div>
                        <div class="one-p animated bounceInLeft">
                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum".</p>
                        </div>
                        <div class="animated slider-btn fadeInUpBig">
                            <a class="shop-btn" href="shop.html">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider section end -->
<!-- collection section start -->
<section class="collection-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="single-colect banner collect-one">
                    <a href="#"><img src="frontend/img/collect/1.jpg" alt="" /></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="colect-text ">
                    <h4><a href="#">Fashion Collection 2016</a></h4>
                    <h5>big sale of the men 2016 fashion <br /> Up To 23% Off!</h5>
                    <a href="#">Shop Now <i class="mdi mdi-arrow-right"></i></a>
                </div>
                <div class="collect-img banner margin single-colect">
                    <a href="#"><img src="frontend/img/collect/2.jpg" alt="" /></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="collect-img banner single-colect">
                    <a href="#"><img src="frontend/img/collect/3.jpg" alt="" /></a>
                    <h2>New Collection</h2>
                </div>
                <div class="colect-text ">
                    <h4><a href="#">Men’s Collection 2016</a></h4>
                    <p>There are many variations of passages of Lorem Ipsum avalabbut the majority have suffered alteration in some form.</p>
                    <a href="#">Shop Now <i class="mdi mdi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- collection section end -->
<!-- featured-products section start -->
<section class="single-products section-padding extra-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <ul class="load-list load-list-one">
                @foreach($feature_products->chunk(4) as $chunk)
                <li>
                    <div class="row text-center">
                        @foreach($chunk as $item)
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="single-product">
                                <div class="product-img">
                                    <div class="pro-type">
                                        <span>new</span>
                                    </div>
                                    <a href=""><img src="frontend/img/product/<?php foreach ($item->ProductImgs as $key) {
                                        echo($key->url);
                                    }?>" alt="<?php foreach ($item->ProductImgs as $key) {
                                        echo($key->alt);
                                    }?>" /></a>
                                    <div class="actions-btn">
                                        <a class="addToCart"  data-href="{{ route('f.addProductToCartAjax') }}" data-id="{{($item->id)}}" ><i class="mdi mdi-cart"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#quick-view{{$item->id}}"><i class="mdi mdi-eye"></i></a>
                                        <a href="#"><i class="mdi mdi-heart"></i></a>
                                    </div>
                                </div>
                                <div class="product-dsc">
                                    <p><a href="{{route('f.detailProduct',[$item->id])}}">{{$item->name}}</a></p>
                                    <span>{{number_format($item->price)}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- single product end -->
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<!-- featured-products section end -->

<!-- tab-products section start -->
<div class="tab-products single-products section-padding extra-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <div class="product-tab nav nav-tabs">
                        <ul>
                            <li class="active"><a data-toggle="tab" href="#arrival">New Arrival <span>/</span></a></li>
                            <li><a data-toggle="tab" href="#best">Best Seller</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center tab-content">
            <div class="tab-pane  fade in active" id="arrival">
                <div class="wrapper">
                    <ul class="load-list load-list-two">
                        @foreach($best_seller_products->chunk(4) as $chunk)
                        <li>
                            <div class="row text-center">
                                @foreach($chunk as $item)
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <div class="pro-type">
                                                <span>new</span>
                                            </div>
                                            <a href=""><img src="frontend/img/product/<?php foreach ($item->ProductImgs as $key) {
                                                echo($key->url);
                                            }?>" alt="<?php foreach ($item->ProductImgs as $key) {
                                                echo($key->alt);
                                            }?>" /></a>                                            <div class="actions-btn">
                                                <a href="{{route('f.addProductToCart',[$item->id])}}"><i class="mdi mdi-cart"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#quick-view{{$item->id}}"><i class="mdi mdi-eye"></i></a>
                                                <a href="#"><i class="mdi mdi-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-dsc">
                                            <p><a href="{{route('f.detailProduct',[$item->id])}}">{{$item->name}}</a></p>
                                            <span>{{number_format($item->price)}}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- single product end -->
                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <!-- arrival product end -->
           
            <!-- popular product end -->
            <div class="tab-pane fade" id="best">
                <div class="wrapper">
                    <ul class="load-list load-list-four">
                        @foreach($new_arrivals->chunk(4) as $chunk)
                        <li>
                            <div class="row text-center">
                                @foreach($chunk as $item)
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <div class="pro-type">
                                                <span>new</span>
                                            </div>
                                            <a href=""><img src="frontend/img/product/<?php foreach ($item->ProductImgs as $key) {
                                                echo($key->url);
                                            }?>" alt="<?php foreach ($item->ProductImgs as $key) {
                                                echo($key->alt);
                                            }?>" /></a>
                                            <div class="actions-btn">
                                                <a href="{{route('f.addProductToCart',[$item->id])}}"><i class="mdi mdi-cart"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#quick-view{{$item->id}}"><i class="mdi mdi-eye"></i></a>
                                                <a href="#"><i class="mdi mdi-heart"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-dsc">
                                            <p><a href="{{route('f.detailProduct',[$item->id])}}">{{$item->name}}</a></p>
                                            <span>{{number_format($item->price)}}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- single product end -->
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- popular product end -->
        </div>
    </div>
</div>
<!-- tab-products section end -->
<!-- service section start -->
<section class="service-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h2>Our Service</h2>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-4">
                <div class="service-text">
                    <i class="mdi mdi-truck"></i>
                    <h4>home delivery</h4>
                    <p>Contrary to popular belief, Lorem Ipsum is <br /> not simply random text.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-text">
                    <i class="mdi mdi-lock"></i>
                    <h4>PAYMENT SECURED</h4>
                    <p>Contrary to popular belief, Lorem Ipsum is <br /> not simply random text.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service-text">
                    <i class="mdi mdi-rotate-left"></i>
                    <h4>30 days money back</h4>
                    <p>Contrary to popular belief, Lorem Ipsum is <br /> not simply random text.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service section end -->
<!-- blog section start -->
<section class="latest-blog section-padding extra-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h2>Latest Blog</h2>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <ul class="load-list load-list-blog">
                <li>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="frontend/img/blog/1.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">Fashion style fine arts drawing</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 25, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="frontend/img/blog/2.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">women’s Fashion style 2016</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 15, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="frontend/img/blog/3.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">women’s winter Fashion style</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 22, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="frontend/img/blog/3.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">women’s winter Fashion style</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 22, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="frontend/img/blog/1.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">Fashion style fine arts drawing</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 25, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="l-blog-text">
                                <div class="banner"><a href="single-blog.html"><img src="frontend/img/blog/2.jpg" alt="" /></a></div>
                                <div class="s-blog-text">
                                    <h4><a href="single-blog.html">women’s Fashion style 2016</a></h4>
                                    <span>By : <a href="#">Rakib</a> | <a href="#">210 Like</a> | <a href="#">69 Comments</a></span>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour....</p>
                                </div>
                                <div class="date-read clearfix">
                                    <a href="#"><i class="mdi mdi-clock"></i> jun 15, 2016</a>
                                    <a href="single-blog.html">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- blog section end -->
        <!-- quick view start -->
        @foreach ($feature_products as $item)
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
                                                                    <a class="simpleLens-image" data-lens-image="frontend/img/products/z3.jpg" href="#"><img src="frontend/img/products/z3.jpg" alt="" class="simpleLens-big-image"></a>
                                                                </div>
                                                                <div class="simpleLens-container tab-pane fade in" id="q-sin-4">
                                                                    <div class="pro-type">
                                                                        <span>new</span>
                                                                    </div>
                                                                    <a class="simpleLens-image" data-lens-image="frontend/img/products/z4.jpg" href="#"><img src="frontend/img/products/z4.jpg" alt="" class="simpleLens-big-image"></a>
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
                                                            <li class="active"><a data-toggle="tab" href="#q-sin-2"> <img src="frontend/img/products/s2.jpg" alt="small image" /> </a></li>
                                                            <li><a data-toggle="tab" href="#q-sin-3"> <img src="frontend/img/products/s3.jpg" alt="small image" /> </a></li>
                                                            <li><a data-toggle="tab" href="#q-sin-4"> <img src="frontend/img/products/s4.jpg" alt="small image" /> </a></li>
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
                                                            <a class="add_to_cart" href="{{route('f.addProductToCart',[$item->id])}}">add to cart</a>
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