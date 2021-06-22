<header class="header-one header-two header-page">
    <div class="header-top-two">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <div class="middel-top">
                        <div class="left floatleft">
                            <p><i class="mdi mdi-clock"></i> Mon-Fri : 09:00-19:00</p>
                        </div>
                    </div>
                    <div class="middel-top clearfix">
                        <ul class="clearfix right floatright">
                            <li>
                                <a href="#"><i class="mdi mdi-account"></i></a>
                                <ul>
                                    <li><a href="{{route('f.formLoginRegister')}}">Login</a></li>
                                    <li><a href="{{route('f.formLoginRegister')}}">Registar</a></li>
                                    <li><a href="my-account.html">@if (Auth::check())
                                            {{Auth::user()->name}}
                                            @endif</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="mdi mdi-settings"></i></a>
                                <ul>
                                    <li><a href="my-account.html">My account</a></li>
                                    <li><a href="{{route('f.cart')}}">My cart</a></li>
                                    <li><a href="{{route('f.checkOut')}}">Checkout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="right floatright">
                            <form action="#" method="get">
                                <button type="submit"><i class="mdi mdi-magnify"></i></button>
                                <input type="text" placeholder="Search within these results..." />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-2">
                <div class="logo">
                    <a href="{{route('f.home')}}"><img src="frontend/img/logo2.png" alt="Sellshop" /></a>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="header-middel">
                    <div class="mainmenu">
                        <nav>
                            <ul>
                                <li><a href="{{route('f.home')}}">Home</a>
                                </li>
                                <li><a href="shop.html">Shop</a>
                                    <ul class="magamenu">
                                        <li class="banner">
                                        </li>
                                        @foreach ($list_departments->chunk(1) as $chuck)
                                        <li>
                                            @foreach ($chuck as $item)


                                            <h5>{{$item->name}}</h5>
                                            <ul>
                                                @foreach ($item->Categorys as $item2)

                                                <li><a
                                                        href="{{route('f.listProduct',[$item2->id])}}">{{$item2->name}}</a>
                                                </li>

                                                @endforeach

                                            </ul>
                                            @endforeach
                                        </li>
                                        @endforeach
                                        <li class="banner">
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="product-grid.html">Product Grid View</a></li>
                                        <li><a href="product-list.html">Product List View</a></li>
                                        <li><a href="single-product.html">Single Product</a></li>
                                        <li><a href="error-404.html">404 page</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-style-1.html">Blog Style One</a></li>
                                        <li><a href="blog-style-2.html">Blog Style Two</a></li>
                                        <li><a href="single-blog.html">Single Blog</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- mobile menu start -->
                    <div class="mobile-menu-area">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="index.html">Home</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Home version one</a></li>
                                            <li><a href="index-2.html">Home version two</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.html">Shop</a>
                                        <ul>
                                            <li>
                                                <h5>men’s wear</h5>
                                                <ul>
                                                    <li><a href="#">Shirts & Top</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shemwear</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                    <li><a href="#">Sweaters</a></li>
                                                    <li><a href="#">Jacket</a></li>
                                                    <li><a href="#">Men Watch</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <h5>women’s wear</h5>
                                                <ul>
                                                    <li><a href="#">Shirts & Tops</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Shemwear</a></li>
                                                    <li><a href="#">Jeans</a></li>
                                                    <li><a href="#">Sweaters</a></li>
                                                    <li><a href="#">Jacket</a></li>
                                                    <li><a href="#">Women Watch</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Pages</a>
                                        <ul>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="product-grid.html">Product Grid View</a></li>
                                            <li><a href="product-list.html">Product List View</a></li>
                                            <li><a href="single-product.html">Single Product</a></li>
                                            <li><a href="error-404.html">404 page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Blog</a>
                                        <ul>
                                            <li><a href="blog-style-1.html">Blog Style One</a></li>
                                            <li><a href="blog-style-2.html">Blog Style Two</a></li>
                                            <li><a href="single-blog.html">Single Blog</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="cart-itmes">
                    <a class="cart-itme-a" href="cart.html">
                        <i class="mdi mdi-cart"></i>
                        <?php $sub_total = 0; 
                        $count=count($cart);
                        $sub_total = 0;
                        if($cart==null){
                        }else{
                        foreach($cart as $item){
                            $sub_total=$item['price']*$item['qty_order'];
                            }
                        }
                        ?>
                        {{$count}} items : <strong>{{number_format($sub_total)}}</strong>
                    </a>
                    <div class="cartdrop">
                        <?php 
                        $sub_total = 0;
                        if($cart==null){ ?>
                        <?php
                        }
                        else{
                        ?>
                        @foreach ($cart as $item)
                        <div class="sin-itme clearfix">
                            <i class="mdi mdi-close"></i>
                            <a class="cart-img" href="cart.html"><img src="frontend/img/product/<?php foreach($item['product_img'] as $key){
                                echo $key->url;
                            }?>" alt="<?php foreach($item['product_img'] as $key){
                                                echo $key->alt;
                                            }?>" /></a>
                            <div class="menu-cart-text">
                                <a href="#">
                                    <h5>{{$item['name']}}</h5>
                                </a>
                                <span>quantity: {{$item['qty_order']}}</span>
                                <strong>{{number_format($item['price']*$item['qty_order'])}}</strong>
                            </div>
                        </div>
                        <?php $sub_total=$item['price']*$item['qty_order'] ?>
                        @endforeach
                        <?php }?>
                        <div class="total">
                            <span>total :<strong>{{number_format($sub_total)}}</strong></span>
                        </div>
                        <a class="goto" href="cart.html">go to cart</a>
                        <a class="out-menu" href="checkout.html">Check out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>