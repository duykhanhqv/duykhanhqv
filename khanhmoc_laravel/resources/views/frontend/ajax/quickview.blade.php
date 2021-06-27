<!-- quick view start -->
/<div class="product-details quick-view modal animated zoomInUp" id="quick-view">
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
                                                            <a class="simpleLens-image" data-lens-image="frontend/img/product/<?php foreach($product_detail->ProductImgs as $key)
                                                                        echo $key->url;
                                                                    ?>" href="#"><img src="frontend/img/product/<?php foreach($product_detail->ProductImgs as $key)
                                                                        echo $key->url;
                                                                    ?>" alt="<?php foreach($product_detail->ProductImgs as $key)
                                                                echo $key->alt;
                                                            ?>" class="simpleLens-big-image"></a>
                                                        </div>
                                                        <div class="simpleLens-container tab-pane active fade in"
                                                            id="q-sin-2">
                                                            <div class="pro-type sell">
                                                                <span>sell</span>
                                                            </div>
                                                            <a class="simpleLens-image" data-lens-image="frontend/img/product/<?php foreach($product_detail->ProductImgs as $key)
                                                                        echo $key->url;
                                                                    ?>" href="#"><img src="frontend/img/product/<?php foreach($product_detail->ProductImgs as $key)
                                                                        echo $key->url;
                                                                    ?>" alt="" class="simpleLens-big-image"></a>
                                                        </div>
                                                        <div class="simpleLens-container tab-pane fade in" id="q-sin-3">
                                                            <div class="pro-type">
                                                                <span>-15%</span>
                                                            </div>
                                                            <a class="simpleLens-image"
                                                                data-lens-image="frontend/img/products/z3.jpg"
                                                                href="#"><img src="frontend/img/products/z3.jpg" alt=""
                                                                    class="simpleLens-big-image"></a>
                                                        </div>
                                                        <div class="simpleLens-container tab-pane fade in" id="q-sin-4">
                                                            <div class="pro-type">
                                                                <span>new</span>
                                                            </div>
                                                            <a class="simpleLens-image"
                                                                data-lens-image="frontend/img/products/z4.jpg"
                                                                href="#"><img src="frontend/img/products/z4.jpg" alt=""
                                                                    class="simpleLens-big-image"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="quick-thumb">
                                                <ul class="product-slider">
                                                    <li><a data-toggle="tab" href="#q-sin-1"> <img src="frontend/img/product/<?php foreach($product_detail->ProductImgs as $key)
                                                                echo $key->url;
                                                            ?>" alt="<?php foreach($product_detail->ProductImgs as $key)
                                                                echo $key->alt;
                                                            ?>" /> </a></li>
                                                    <li class="active"><a data-toggle="tab" href="#q-sin-2"> <img
                                                                src="frontend/img/products/s2.jpg" alt="small image" />
                                                        </a></li>
                                                    <li><a data-toggle="tab" href="#q-sin-3"> <img
                                                                src="frontend/img/products/s3.jpg" alt="small image" />
                                                        </a></li>
                                                    <li><a data-toggle="tab" href="#q-sin-4"> <img
                                                                src="frontend/img/products/s4.jpg" alt="small image" />
                                                        </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-7 col-md-8">
                                        <div class="quick-right">
                                            <div class="list-text">
                                                <h3>{{($product_detail->name)}}</h3>
                                                <span></span>
                                                <div class="ratting floatright">
                                                    <p>( 27 Rating )</p>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star-half"></i>
                                                    <i class="mdi mdi-star-outline"></i>
                                                </div>
                                                <h5><del>$79.30</del>{{number_format($product_detail->price)}}</h5>
                                                {{$product_detail->desc}}
                                                <div class="list-btn">
                                                    <a class="add_to_cart"
                                                        href="{{route('f.addProductToCart',[$product_detail->id])}}">add to
                                                        cart</a>
                                                    <a href="#">wishlist</a>
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
<!-- quick view end -->