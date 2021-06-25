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
                        {{$item->desc}}		
                        													<div class="list-btn">
                            {{-- <a href="#">add to cart</a> --}}
                            <a class="addToCart" data-href="{{ route('f.addProductToCartAjax') }}"
                            data-id="{{($item->id)}}">add to cart</a>
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