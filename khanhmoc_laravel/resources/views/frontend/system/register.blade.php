@extends('frontend.master')
@section('content')
<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>@lang('Register')</h2>
                    @if (session('msg'))
                    <div class="col-12 alert alert-{{session('status')}}">
                        {{session('msg')}}
                    </div>
                    @endif
                    <ul class="text-left">
                        <li><a href="index.html"> @lang('Home')</a></li>
                        <li><span> // </span>@lang('Register') {{$msg}} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- login content section start -->
<section class="pages login-page section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="main-input padding60">
                    <div class="log-title">
                        <h3><strong>@lang('registered customers')</strong></h3>
                    </div>
                    <div class="login-text">
                        <div class="custom-input">
                            <p>@lang('If you have an account with us, Please log in!')</p>
                            <form action="{{route('f.postLogin')}}" method="post">
                                <input type="text" name="email" placeholder="Email" />
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <input type="password" name="password" placeholder="Password" />
                                @error('password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <a class="forget" href="#">@lang('Forget your password?')</a>
                                @csrf
                                <input type="submit" value="Login" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="main-input padding60 new-customer">
                    <div class="log-title">
                        <h3><strong>@lang('new customers')</strong></h3>
                    </div>
                    <div class="custom-input">
                        <form action="{{route('f.postRegister')}}" method="POST">
                            <input type="text" name="name" placeholder="@lang('Name here..')" />
                            @error('name')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <input type="text" name="email" placeholder="@lang('Email Address').." />
                            @error('email')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <input type="text" name="mobile" placeholder="@lang('Phone Number')" />
                            @error('mobile')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <input type="text" name="address" placeholder="@lang('Address')" />
                            @error('address')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <input type="password" name="password" placeholder="@lang('Password')" />
                            @error('password')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <input type="password" name="password_confirm" placeholder="@lang('Password Confirm')" />
                            @error('password_confirm')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror

                            {{-- <label class="first-child">
                                <input type="radio" name="rememberme" value="forever">
                                Sign up for our newsletter!
                            </label> --}}
                            @csrf
                            <input type="submit" value="Submit" />


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login content section end -->
<!-- footer section start -->
<footer class="footer-two">
    <!-- brand logo area start -->
    <div class="brand-logo">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="barnd-bg">
                        <a href="#"><img src="frontend/img/brand/1.png" alt="Brand Logo" /></a>
                        <a href="#"><img src="frontend/img/brand/2.png" alt="Brand Logo" /></a>
                        <a href="#"><img src="frontend/img/brand/3.png" alt="Brand Logo" /></a>
                        <a href="#"><img src="frontend/img/brand/4.png" alt="Brand Logo" /></a>
                        <a href="#"><img src="frontend/img/brand/5.png" alt="Brand Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand logo section end -->
    <!-- social media section start -->
    <div class="social-media section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="newsletter newsletter2">
                        <h3>newsletter</h3>
                        <form action="mail.php" method="post">
                            <input type="text" name="email" placeholder="Enter your email..." />
                            <input type="submit" value="subscribe" />
                        </form>
                    </div>
                    <div class="social-icons">
                        <a href="#"><i class="mdi mdi-facebook"></i></a>
                        <a href="#"><i class="mdi mdi-twitter"></i></a>
                        <a href="#"><i class="mdi mdi-google-plus"></i></a>
                        <a href="#"><i class="mdi mdi-dribbble"></i></a>
                        <a href="#"><i class="mdi mdi-rss"></i></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-offset-1 col-md-5">
                    <div class="newsletter get-touch">
                        <h3>get in touch</h3>
                        <form action="mail.php" method="post">
                            <input type="text" name="name" placeholder="Enter your Name..." />
                            <input type="text" name="email" placeholder="Enter your email..." />
                            <textarea name="message" rows="2" placeholder="Enter your message...."></textarea>
                            <input type="submit" value="send your message" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- social media section end -->
    <!-- footer-top area start -->
    <div class="footer-top section-padding">
        <div class="footer-dsc">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>Contact us</h4>
                            </div>
                            <div class="footer-text">
                                <ul>
                                    <li>
                                        <i class="mdi mdi-map-marker"></i>
                                        <p>Flat no 01, House no 02, Vincent,</p>
                                        <p>Dhaka-1207, Bangladesh</p>
                                    </li>
                                    <li>
                                        <i class="mdi mdi-phone"></i>
                                        <p>(+880) 19453 821758</p>
                                        <p>(+880) 19453 813758</p>
                                    </li>
                                    <li>
                                        <i class="mdi mdi-email"></i>
                                        <p>info@mydomain.com</p>
                                        <p>username@email.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-2 wide-mobile">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>my account</h4>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="login.html"><i class="mdi mdi-menu-right"></i>My Account</a></li>
                                    <li><a href="wishlist.html"><i class="mdi mdi-menu-right"></i>My Wishlist</a></li>
                                    <li><a href="cart.html"><i class="mdi mdi-menu-right"></i>My Cart</a></li>
                                    <li><a href="login.html"><i class="mdi mdi-menu-right"></i>Sign In</a></li>
                                    <li><a href="checkout.html"><i class="mdi mdi-menu-right"></i>Check out</a></li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i>Track My Orde</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-2 wide-mobile">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>shipping</h4>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="contact.html"><i class="mdi mdi-menu-right"></i>New Products</a></li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i>Top Sellers</a></li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i>Manufactirers</a></li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i>Suppliers</a></li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i>Specials</a></li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i>Availability</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 r-margin-top wide-mobile">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>Information</h4>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="contact.html"><i class="mdi mdi-menu-right"></i>Return Exchange</a>
                                    </li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i>Fast Delivery</a></li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i>Online Shopping</a></li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i>Shipping Guide</a></li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i>Turm Of Use</a></li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i>Home Delivery</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 r-margin-top wide-mobile">
                        <div class="single-text">
                            <div class="footer-title">
                                <h4>instagram</h4>
                            </div>
                            <div class="clearfix instagram">
                                <ul>
                                    <li><a href="#"><img src="frontend/img/footer/in1.png" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="frontend/img/footer/in2.png" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="frontend/img/footer/in3.png" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="frontend/img/footer/in4.png" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="frontend/img/footer/in5.png" alt="Instagram" /></a></li>
                                    <li><a href="#"><img src="frontend/img/footer/in6.png" alt="Instagram" /></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-top area end -->
    <!-- footer-bottom area start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <p>&copy; Sellshop 2016. All Rights Reserved.</p>
                </div>
                <div class="col-xs-12 col-sm-6 text-right">
                    <a href="#"><img src="frontend/img/footer/payment.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom area end -->
</footer>
<!-- footer section end -->
@endsection