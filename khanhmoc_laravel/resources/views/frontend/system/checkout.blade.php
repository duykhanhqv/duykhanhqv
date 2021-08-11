@extends('frontend.master')
@section('content')
<!-- pages-title-start -->
<div class="pages-title section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h2>@lang('Checkout')</h2>
					<ul class="text-left">
						<li><a href="index.html">@lang('Home') </a></li>
						<li><span> // </span>@lang('Checkout')</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pages-title-end -->
<!-- Checkout content section start -->
<section class="pages checkout section-padding">
	<form action="{{ route('f.createBill')}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="main-input single-cart-form padding60">
						<div class="log-title">
							<h3><strong>@lang('billing details and shipping')</strong></h3>
						</div>
						<div class="custom-input">
							<form action="mail.php" method="post">
								<input type="text" name="name_ship" placeholder="@lang('Your name').." />
								@error('name_ship')
								<div class="text-danger">
									{{$message}}
								</div>
								@enderror
								<input type="text" name="mobile_ship" placeholder="@lang('Phone here')" />
								@error('mobile_ship')
								<div class="text-danger">
									{{$message}}
								</div>
								@enderror
								<input type="text" name="email_ship" placeholder="@lang('email')" />
								@error('email_ship')
								<div class="text-danger">
									{{$message}}
								</div>
								@enderror
								<div class="custom-mess">
									<textarea rows="2" placeholder="@lang('Your address here')"
										name="address_ship"></textarea>
									@error('address_ship')
									<div class="text-danger">
										{{$message}}
									</div>
									@enderror
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="main-input single-cart-form padding60">
						<div class="log-title">
							<h3><strong>@lang('ship to different address')</strong></h3>
						</div>
						<div class="cart-form-text pay-details table-responsive">
							<table>
								<thead>
									<tr>
										<th>@lang('Product')</th>
										<td>@lang('Total')</td>
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
									<tr>
										<th>{{$item['name']}} x {{$item['qty_order']}}</th>
										<td>{{number_format($item['price']*$item['qty_order'])}}</td>
									</tr>
									<?php 
										$temp=0;
										$temp=$item['qty_order']*$item['price'];
										$sub_total =$sub_total+$temp;
										?>
									@endforeach
									<?php }?>


									<tr>
										<th>@lang('Cart Subtotal')</th>
										<td>{{number_format($sub_total)}}</td>
									</tr>
									<tr>
										<th>@lang('Shipping and Handing')</th>
										<td>0</td>
									</tr>

									<tr>
										<th>Vat</th>
										<td>{{number_format($sub_total/10)}}</td>
									</tr>
									<?php
										$vat=$sub_total/10;
										$order_total=$vat+$sub_total;
										?>
								</tbody>
								<tfoot>
									<tr>
										<th>@lang('Order total')</th>
										<td>{{number_format($order_total)}}</td>
									</tr>
									<tr>

										<td>
											<div class="submit-text" color="green">
												<input type="submit" value="@lang('Place order')">
											</div>
										</td>

									</tr>
								</tfoot>

							</table>
						</div>
					</div>
				</div>
			</div>
			{{-- <div class="row margin-top">
					<div class="col-xs-12 col-sm-6">
						<div class="padding60">
							<div class="log-title">
								<h3><strong>Our order</strong></h3>
							</div>
							<div class="cart-form-text pay-details table-responsive">
								<table>
									<thead>
										<tr>
											<th>Product</th>
											<td>Total</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>Men’s White Shirt  x 2</th>
											<td>$86.00</td>
										</tr>
										<tr>
											<th>Men’s Black Shirt  x 1</th>
											<td>$69.00</td>
										</tr>
										<tr>
											<th>Cart Subtotal</th>
											<td>$155.00</td>
										</tr>
										<tr>
											<th>Shipping and Handing</th>
											<td>$15.00</td>
										</tr>
										<tr>
											<th>Vat</th>
											<td>$00.00</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<th>Order total</th>
											<td>$325.00</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="padding60">
							<div class="log-title">
								<h3><strong>Payment method</strong></h3>
							</div>
							<div class="categories">
								<ul id="accordion" class="panel-group clearfix">
									<li class="panel">
										<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
											<div class="medium-a">
												direct bank transfer
											</div>
										</div>
										<div class="panel-collapse collapse in" id="collapse1">
											<div class="normal-a">
												<p>Lorem Ipsum is simply in dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
											</div>
										</div>
									</li>
									<li class="panel">
										<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">
											<div class="medium-a">
												cheque payment
											</div>
										</div>
										<div class="paypal-dsc panel-collapse collapse" id="collapse2">
											<div class="normal-a">
												<p>Lorem Ipsum is simply in dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
											</div>
										</div>
									</li>
									<li class="panel">
										<div data-toggle="collapse" data-parent="#accordion" data-target="#collapse3">
											<div class="medium-a">
												paypal
											</div>
										</div>
										<div class="paypal-dsc panel-collapse collapse" id="collapse3">
											<div class="normal-a">
												<p>Lorem Ipsum is simply in dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
											</div>
										</div>
									</li>
								</ul>
								<div class="submit-text">
									<a href="#">place order</a>
								</div>
							</div>
						</div>
					</div>
				</div> --}}
		</div>
	</form>
</section>
<!-- Checkout content section end -->
@endsection