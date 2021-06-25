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
                    <a href="{{route('f.addProductToCart',[$item->id])}}"><i class="mdi mdi-cart"></i></a>
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