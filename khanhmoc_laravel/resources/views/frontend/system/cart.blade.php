@extends('frontend.master')
@section('content')
<!-- pages-title-start -->
<div class="pages-title section-padding" id="cart">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h2>Cart</h2>
					<ul class="text-left">
						<li><a href="index.html">@lang('Home') </a></li>
						<li><span> // </span>@lang('Cart')</li>
						<li><span> // </span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pages-title-end -->
<!-- cart content section start -->
<section class="pages cart-page section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="table-responsive padding60">
					<table class="wishlist-table text-center">
						<thead>
							<tr>
								<th>@lang('Product')</th>
								<th>@lang('Price')</th>
								<th>@lang('Quantity')</th>
								<th>@lang('Total Price')</th>
								<th>@lang('Remove')</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                                    $sub_total =0;
                                    if($cart==null){
										echo 'Cart null';
									}
									else{
                                    ?>
							@foreach ($cart as $item)
							<form action="{{route('f.updateCart')}}" method="post" enctype="multipart/form-data">
							<tr>
								<td class="td-img text-left">
									<a href="#"><img src="frontend/img/product/<?php foreach($item['product_img'] as $key){
                                                echo $key->url;
                                            }?>" alt="<?php foreach($item['product_img'] as $key){
                                                echo $key->alt;
                                            }?>" /></a>
									<div class="items-dsc">
										<h5><a href="{{route('f.detailProduct',[$item['id']])}}">{{$item['name']}}</a>
										</h5>
									</div>
								</td>
								<td>{{number_format($item['price'])}}</td>
								<td>
									<div class="plus-minus">
										{{-- <a href="{{route('f.updateQtyDown',[$item['id']])}}" class="dec qtybutton">-</a> --}}
										<a data-href="{{route('f.downProductInCartAjax')}}"  data-id={{$item['id']}} class="downProductInCart">-</a>

										<input type="text" value="{{number_format($item['qty_order'])}}"
											name="product[{{$item['id']}}]" id="qty_order" class="plus-minus-box">
										{{-- <a href="{{route('f.updateQtyUp',[$item['id']])}}" class="inc qtybutton">+</a> --}}
										<a data-href="{{route('f.upProductInCartAjax')}}"  data-id={{$item['id']}} class="upProductInCart">+</a>

									</div>
								</td>
								<td>
									<strong>{{number_format($item['qty_order']*$item['price'])}}</strong>
								</td>
								{{-- <td><a href="{{route('f.remoteProductInCart',[$item['id']])}}"><i class="mdi mdi-close" title="Remove this product"></i></a></td> --}}
								<td><a class="remoteProductInCart" data-href="{{route('f.removeProductInCartAjax')}}" data-id={{$item['id']}}><i class="mdi mdi-close" title="Remove this product"></i></a></td>
							</tr>
							<?php 
                                    $temp=0;
                                    $temp=$item['qty_order']*$item['price'];
                                    $sub_total =$sub_total+$temp;
                                    ?>
							@endforeach
							@csrf
							{{-- <input type="submit" value="Update"> --}}
						</form>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row margin-top">
			<div class="col-sm-6">
				<div class="single-cart-form padding60">
					<div class="log-title">
						<h3><strong>@lang('coupon discount')</strong></h3>
					</div>
					<div class="cart-form-text custom-input">
						<p>@lang('Enter your coupon code if you have one!')</p>
						<form action="mail.php" method="post">
							<input type="text" name="subject" placeholder="Enter your code here..." />
							<div class="submit-text coupon">
								<button type="submit">@lang('apply coupon') </button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="single-cart-form padding60">
					<div class="log-title">
						<h3><strong>@lang('payment details')</strong></h3>
					</div>
					<div class="cart-form-text pay-details table-responsive">
						<table>
							<tbody>
								<tr>
									<th>@lang('Cart Subtotal')</th>
									<td>{{number_format($sub_total)}}</td>
								</tr>
								<tr>
									<th>@lang('including Vat')</th>
									<td>{{number_format($sub_total/10)}}</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th class="tfoot-padd">@lang('Order total')</th>
									<?php
                                            $vat=$sub_total/10;
                                            $order_total=$vat+$sub_total;
                                            ?>
									<td class="tfoot-padd">{{number_format($order_total)}}</td>
								</tr>
							</tfoot>
						</table>
						<div class="submit-text coupon">
							 <div class="submit-text coupon">
								<button type="submit"><a href="{{route('f.checkOut')}}">@lang('Check out')</a> </button>
							</div> </button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<!-- cart content section end -->
@endsection