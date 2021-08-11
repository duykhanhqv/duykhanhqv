<div class="cart-itmes" id="cart-mini">
    <a class="cart-itme-a" href="cart.html">
        <i class="mdi mdi-cart"></i>
        <?php 
        $count=0;
        $sub_total = 0; 
        $sub_items = 0;
        if($cart==null){
        }else{
        $count=count($cart);
        foreach($cart as $item){
            $temp=0;
            $temp2=0;
                $temp=$item['qty_order']*$item['price'];
                $temp2=$item['qty_order'];
                $sub_total =$sub_total+$temp;
                $sub_items=$sub_items+$temp2;

            }
        }
        ?>
        {{$sub_items}} @lang('sản phẩm') : <strong>{{number_format($sub_total)}}</strong>
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
                <span>@lang('quantity') {{$item['qty_order']}}</span>
                <strong>{{number_format($item['price']*$item['qty_order'])}}</strong>
            </div>
        </div>
        <?php $sub_total=$sub_total+$item['price']*$item['qty_order'] ?>
        @endforeach
        <?php }?>
        <div class="total">
            <span>@lang('total') :<strong>{{number_format($sub_total)}}</strong></span>
        </div>
        <a class="goto" href="{{route('f.cart')}}">@lang('go to cart')</a>
        <a class="out-menu" href="checkout.html">@lang('Check out')</a>
    </div>
</div>