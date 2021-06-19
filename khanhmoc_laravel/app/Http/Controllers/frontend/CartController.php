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
        $carts = session('cart');
        $data = [
            'msg' => 'Khánh mốc',
            'carts' => $carts,
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
        $giohang = session('cart');
        if (isset($giohang[$product->id])) {
            $giohang[$product->id]['qty_order']++;
        } else {
            $giohang[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty_order' => 1,
                'product_img' => $product->ProductImgs
            ];
        }
        session(['cart' => $giohang]);
        return redirect('/home');
    }
    public function updateQtyDown(Request $request)
    {
        dd($request);
    }
    public function update(Request $request)
    {
        dd($request);
    }
}
