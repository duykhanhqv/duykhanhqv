<!-- pages-title-start -->
<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>{{$product_detail->name}}</h2>
                    @if (session('msg'))
                    <div class="col-12 alert alert-{{session('status')}}">
                        {{session('msg')}}
                    </div>
                    @endif
                    <ul class="text-left">
                        <li><a href="index.html">@lang('Home') </a></li>
                        <li><span> // </span><a href="shop.html">@lang('shop') </a></li>
                        <li><span> // </span>{{$product_detail->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- product-details-section-start -->
<div class="product-details pages section-padding-top">
    <div class="container">
        <div class="row">
            <div class="single-list-view">
                <div class="col-xs-12 col-sm-5 col-md-4">
                    <div class="quick-image">
                        <div class="single-quick-image text-center">
                            <div class="list-img">
                                <div class="product-img tab-content">
                                    <div class="simpleLens-container tab-pane fade in" id="sin-1">
                                        <div class="pro-type">
                                            <span>new</span>
                                        </div>
                                        <a class="simpleLens-image" data-lens-image="img/products/z1.jpg" href="#"><img
                                                src="img/products/z1.jpg" alt="" class="simpleLens-big-image"></a>
                                    </div>
                                    <div class="simpleLens-container tab-pane active fade in" id="sin-2">
                                        <div class="pro-type sell">
                                            <span>sell</span>
                                        </div>
                                        <a class="simpleLens-image" data-lens-image="frontend/img/product/<?php foreach ($product_detail->ProductImgs as $key) {
                                                    echo($key->url);
                                                }?>" href="#"><img src="frontend/img/product/<?php foreach ($product_detail->ProductImgs as $key) {
                                            echo($key->url);
                                        }?>" alt="frontend/img/product/<?php foreach ($product_detail->ProductImgs as $key) {
                                            echo($key->alt);
                                        }?>" class="simpleLens-big-image"></a>
                                    </div>
                                    <div class="simpleLens-container tab-pane fade in" id="sin-3">
                                        <div class="pro-type">
                                            <span>-15%</span>
                                        </div>
                                        <a class="simpleLens-image" data-lens-image="img/products/z3.jpg" href="#"><img
                                                src="img/products/z3.jpg" alt="" class="simpleLens-big-image"></a>
                                    </div>
                                    <div class="simpleLens-container tab-pane fade in" id="sin-4">
                                        <div class="pro-type">
                                            <span>new</span>
                                        </div>
                                        <a class="simpleLens-image" data-lens-image="img/products/z4.jpg" href="#"><img
                                                src="img/products/z4.jpg" alt="" class="simpleLens-big-image"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="quick-thumb">
                            <ul class="product-slider">
                                <li><a data-toggle="tab" href="#sin-1"> <img src="" alt="quick view" /> </a></li>
                                <li class="active"><a data-toggle="tab" href="#sin-2"> <img src="img/products/s2.jpg"
                                            alt="small image" /> </a></li>
                                <li><a data-toggle="tab" href="#sin-3"> <img src="img/products/s3.jpg"
                                            alt="small image" /> </a></li>
                                <li><a data-toggle="tab" href="#sin-4"> <img src="img/products/s4.jpg"
                                            alt="small image" /> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-8">
                    <div class="quick-right">
                        <div class="list-text">
                            <h3>{{$product_detail->name}}</h3>
                            <span></span>
                            <div class="ratting floatright">
                                @php
                                $temp=0;
                                $average=0;
                                $star=0;
                                $count=0;
                                @endphp
                                @foreach ($product_detail->Rating as $key)
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
                            <h5><del></del> {{number_format($product_detail->price)}}</h5>
                            {{$product_detail->desc}}

                            <div class="all-choose">
                                <br>
                                <form action="{{route('f.addManyProductsToCart')}}" method="POST">
                                    <div class="s-shoose">
                                        <h5>@lang('qty')</h5>
                                        <div class="plus-minus">
                                            <input name="product_id" type="text" value="{{$product_detail->id}}"
                                                style="display:none" class="bar">
                                            <a class="dec qtybutton">-</a>
                                            <input type="text" value="01" name="qty" class="plus-minus-box">
                                            <a class="inc qtybutton">+</a>
                                        </div>
                                    </div>
                                    <div class="s-shoose">
                                        <div class="plus-minus">
                                            @csrf
                                            <input type="submit" value="add to cart">

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="list-btn">
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
        <!-- single-product item end -->
        <!-- reviews area start -->
        <div class="row">
            <div class="col-xs-12">
                <div class="reviews padding60 margin-top">
                    <ul class="reviews-tab clearfix">
                        <li><a data-toggle="tab" href="#moreinfo">@lang('more info')</a></li>
                        <li class="active"><a data-toggle="tab" href="#reviews">@lang('Reviews')</a></li>
                        <li><a data-toggle="tab" href="#tags">@lang('tags')</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="info-reviews moreinfo tab-pane fade in" id="moreinfo">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                                tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis
                                justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id
                                nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum
                                metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce
                                ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero
                                hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in
                                accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc.
                                Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant
                                morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi,
                                rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam
                                consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
                        </div>
                        <div class="info-reviews review-text tab-pane fade in active" id="reviews">

                            @foreach ($product_detail->Rating as $item)
                            <div class="about-author">
                                <div class="autohr-text">
                                    <img src="img/blog/author1.png" alt="" />
                                    <div class="author-des">
                                        <h4><a href="#">{{$item->name}}</a></h4>
                                        <span class="floatright ratting">
                                            @if ($item->pivot->rating==1)
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                            @elseif ($item->pivot->rating==2)
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                            @elseif ($item->pivot->rating==3)
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                            @elseif ($item->pivot->rating==4)
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                            @elseif ($item->pivot->rating==5)
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            @endif
                                        </span>
                                        <span>{{$item->pivot->created_at}}</span>
                                        <p>{{$item->pivot->review}}</p>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            @endforeach
                            <div class="your-rating log-title">
                                <h3>@lang('leave your review')</h3>
                                <h5>@lang('Your rating')</h5>
                                <div class="rating clearfix">
                                    <i class="fa fa-star fa-2x" data-index="0"></i>
                                    <i class="fa fa-star fa-2x" data-index="1"></i>
                                    <i class="fa fa-star fa-2x" data-index="2"></i>
                                    <i class="fa fa-star fa-2x" data-index="3"></i>
                                    <i class="fa fa-star fa-2x" data-index="4"></i>
                                </div>
                                <script>
                                    var ratedIndex = -1;
                        $(document).ready(function () {
                            resetStarColors();
                            if (localStorage.getItem('ratedIndex') != null) {
                                setStars(parseInt(localStorage.getItem('ratedIndex')));
                            }
                            $('.fa-star').on('click', function () {
                                ratedIndex = parseInt($(this).data('index'));
                                localStorage.setItem('ratedIndex', ratedIndex);
                                $('#star').val(localStorage.getItem('ratedIndex'));
                            });
                            $('.fa-star').mouseover(function () {
                                resetStarColors();
                                var currentIndex = parseInt($(this).data('index'));
                                setStars(currentIndex);
                            });
                            $('.fa-star').mouseleave(function () {
                                resetStarColors();
                                if (ratedIndex != -1)
                                    setStars(ratedIndex);
                            });
                        });
                        function setStars(max) {
                            for (var i=0; i <= max; i++)
                                $('.fa-star:eq('+i+')').css('color', 'red');
                        }
                        function resetStarColors() {
                            $('.fa-star').css('color', 'gray');
                        }
                                </script>
                            </div>
                            <div class="custom-input">
                                <form action="{{ route('f.postRatingReview')}}" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" id="star" name="star" value="">
                                    <input type="hidden" name="id" value="{{$product_detail->id}}">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="custom-mess">
                                                <textarea name="review" placeholder="Your Review" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="submit-text">
                                                @csrf
                                                <button type="submit">@lang('submit review')</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="info-reviews tags tab-pane fade in" id="tags">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                                tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis
                                justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id
                                nulla. Donec a neque libero. Pellentesque aliquet, semt mi, rutrum at sollicitudin
                                rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis
                                vehicula felis, a dapibus enim lorem nec augue.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- reviews area end -->
    </div>
</div>
<!-- product-details section end -->
<!-- related-products section start -->
<section class="single-products section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h2>@lang('related Products')</h2>
                </div>
            </div>
        </div>
        <div class="row text-center">
            @foreach ($related_product as $item)
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="single-product">
                    <div class="product-img">
                        <div class="pro-type">
                            <span>new</span>
                        </div>
                        <a href="#"><img src="frontend/img/product/<?php foreach($item->ProductImgs as $key)
                                echo $key->url;
                                ?>" alt="Product Title" /></a>
                        <div class="actions-btn">
                            <a href="#"><i class="mdi mdi-cart"></i></a>
                            <a href="#" data-toggle="modal" data-target="#quick-view{{$item->id}}"><i
                                    class="mdi mdi-eye"></i></a>
                            <a href="#"><i class="mdi mdi-heart"></i></a>
                        </div>
                    </div>
                    <div class="product-dsc">
                        <p><a href="{{route('f.detailProduct',[$item->id])}}">{{$item->name}}</a></p>
                        <span>{{number_format($item->price)}}</span>
                    </div>
                </div>
            </div>
            <!-- single product end -->
            @endforeach
        </div>
    </div>
</section>
<!-- related-products section end -->
<!-- quick view start -->
@foreach ($quick_view as $item)
<div class="product-details quick-view modal animated zoomInUp" id="quick-view{{$item->id}}">
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
                                                            <a class="simpleLens-image"
                                                                data-lens-image="img/products/z1.jpg" href="#"><img
                                                                    src="img/products/z1.jpg" alt=""
                                                                    class="simpleLens-big-image"></a>
                                                        </div>
                                                        <div class="simpleLens-container tab-pane active fade in"
                                                            id="q-sin-2">
                                                            <div class="pro-type sell">
                                                                <span>sell</span>
                                                            </div>
                                                            <a class="simpleLens-image"
                                                                data-lens-image="img/products/z2.jpg" href="#"><img src="frontend/img/product/<?php foreach ($product_detail->ProductImgs as $key) {
                                                                        echo($key->url);
                                                                    }?>" alt="frontend/img/product/<?php foreach ($product_detail->ProductImgs as $key) {
                                            echo($key->alt);
                                        }?>" class="simpleLens-big-image"></a>
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
                                                    <li><a data-toggle="tab" href="#q-sin-1"> <img
                                                                src="img/products/s1.jpg" alt="quick view" /> </a></li>
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
                                                <h3>{{$item->name}}</h3>
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
                                                    <p>( {{$count}} Rating )</p>
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
                                                <h5><del></del> {{number_format($item->price)}}</h5>
                                                <div>
                                                    <?php echo $item->desc ?>
                                                    <br>
                                                    <br>
                                                    <br>
                                                </div>

                                                <div class="list-btn">
                                                    <a href="#">add to cart</a>
                                                    <a href="#">wishlist</a>
                                                    <a href="#">zoom</a>
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
@endforeach