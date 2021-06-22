<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * get cart
     * author: khanhmoc
     *
     * return array cart
     */
    public function getCart()
    {
        $cart = session('cart');
        dd($cart);
        $data = [
            'msg' => 'Khánh mốc',
            'carts' => $cart,
        ];
        return view('frontend.system.cart', $data);
    }
    /**
     * add product to cart
     * author: khanhmoc
     *
     * 
     */
    public function addProductToCart($id)
    {
        $product = Product::where(['id' => $id])->first();
        // dd($product);
        if (!$product)
            return view('frontend.system.home');
        // dd(!Auth::check());
        if (!Auth::check()) {
            $data = [
                'msg' => 'You need to login before making a purchase'
            ];
            return view('frontend.system.register', $data);
        }
        $cart = session('cart');
        if (isset($giohang[$product->id])) {
            $cart[$product->id]['qty_order']++;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty_order' => 1,
                'product_img' => $product->ProductImgs
            ];
        }
        session(['cart' => $cart]);
        return redirect('/home');
    }
    public function addManyProductsToCart(Request $request)
    {
        foreach ($request->product as $id => $qty) {
            $product = Product::where(['id' => $id])->first();
            if (!$product)
                return view('frontend.system.home');
            if (!Auth::check()) {
                $data = [
                    'msg' => 'You need to login before making a purchase'
                ];
                return view('frontend.system.register', $data);
            }
            $cart = session('cart');
            if (isset($cart[$product->id])) {
                $cart[$product->id]['qty_order'] = $cart[$product->id]['qty_order'] + $qty;
            } else {
                $cart[$product->id] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'qty_order' => $qty,
                    'product_img' => $product->ProductImgs
                ];
            }
            session(['cart' => $cart]);
        }
        return redirect('/home');
    }
}
