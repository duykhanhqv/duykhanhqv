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
        $data = [
            'msg' => 'Khánh mốc',
            'cart' => $cart,
        ];
        return view('frontend.system.cart', $data);
    }
    /**
     * listting product use ajax
     * author: khanhmoc
     *
     *
     */
    public function getCartAjax()
    {
        $cart = session('cart');
        $data_render = [
            'cart' => $cart,
        ];
        $return_HTML_Cart = view('frontend.ajax.cart', $data_render)->render();
        $data = [
            'msg' => 'Cart',
            'cart' => $cart,
            'returnHTML' => $return_HTML_Cart,
            'status' => 'success'
        ];
        return response()->json($data, 200);
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
        if (!$product)
            return view('frontend.system.home');
        if (!Auth::guard('client')->check()) {
            $data = [
                'msg' => 'You need to login before making a purchase'
            ];
            return view('frontend.system.register', $data);
        }
        $cart = session('cart');
        if (isset($cart[$product->id])) {
            if ($product->qty >= ($cart[$product->id]['qty_order'] + 1)) {
                $cart[$product->id]['qty_order']++;
            } else {
                return view('frontend.system.register', ['msg' => 'Sold product']);
            }
        } else {
            if ($product->qty >= 1) {
                $cart[$product->id] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'qty_order' => 1,
                    'product_img' => $product->ProductImgs
                ];
            } else {
                return view('frontend.system.register', ['msg' => 'Sold product']);
            }
        }
        session(['cart' => $cart]);
        return redirect('/home');
    }
    /**
     * add many product to cart
     * author: khanhmoc
     *
     * 
     */

    public function addManyProductsToCart(Request $request)
    {
        $product = Product::where(['id' => $request->product_id])->first();
        $cart = session('cart');
        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty_order'] = $cart[$product->id]['qty_order'] + $request->qty;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty_order' => $request->qty,
                'product_img' => $product->ProductImgs
            ];
        }
        session(['cart' => $cart]);

        return redirect()->route('f.detailProduct', $product->id);
    }
    /**
     * add product update cart
     * author: khanhmoc
     *
     * 
     */
    public function updateCart(Request $request)
    {
        foreach ($request->product as $id => $qty) {
            $product = Product::where(['id' => $id])->first();
            if (!$product)
                return view('frontend.system.home');
            if (!Auth::guard('client')->check()) {
                $data = [
                    'msg' => 'You need to login before making a purchase'
                ];
                return view('frontend.system.register', $data);
            }
            $cart = session('cart');
            if (isset($cart[$product->id])) {
                if ($qty <= 0) {
                    unset($cart[$product->id]);
                } else {
                    $cart[$product->id]['qty_order'] = $qty;
                }
            } else {
                return view('frontend.system.register', ['msg' => 'No have product in cart']);
            }
            session(['cart' => $cart]);
        }
        return view('frontend.system.cart', [
            'msg' => 'Khánh mốc',
            'cart' => $cart,
        ]);
    }
    /**
     * add product to cart use Ajax
     * author: khanhmoc
     *
     * 
     */
    public function addProductToCartAjax(Request $request)
    {
        $product = Product::where(['id' => $request->id])->first();
        if (!$product)
            return view('frontend.system.home');
        if (!Auth::guard('client')->check()) {
            $data = [
                'msg' => 'You need to login before making a purchase',
                'status' => 'danger'
            ];
            return response()->json($data, 200);
        }
        $cart = session('cart');
        if ($product->qty < 1) {
            $data = [
                'msg' => 'Sản phẩm hết hàng',
                'status' => 'danger',
            ];
            return response()->json($data, 200);
        } else {;
            if (isset($cart[$product->id])) {
                $temp = $cart[$product->id]['qty_order'];
                $temp++;
                if ($product->qty < $temp) {
                    $data = [
                        'msg' => 'Sould Product',
                        'status' => 'danger'
                    ];
                    return response()->json($data, 200);
                }
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
            $data_render = [
                'cart' => $cart,
            ];
            $returnHTML = view('frontend.ajax.minicart', $data_render)->render();
            $data = [
                'msg' => 'Add success',
                'status' => 'success',
                'cart' => $cart,
                'html' => $returnHTML,
            ];
            return response()->json($data, 200);
        }
    }
    /**
     * remove product in cart
     * author: khanhmoc
     *
     * 
     */
    public function removeProductInCart($product_id)
    {
        $product = Product::where(['id' => $product_id])->first();
        if (!$product) {
            return view('frontend.system.home')->with(['msg' => 'Product template sold out']);
        } else {
            if (!Auth::guard('client')->check()) {
                $data = [
                    'msg' => 'You need to login before making a purchase'
                ];
                return view('frontend.system.register', $data);
            } else {
                $cart = session('cart');
                if (!isset($cart[$product->id])) {
                    $data = [
                        'msg' => 'No have Product in your cart'
                    ];
                    return back($data);
                } else {
                    unset($cart[$product->id]);
                    session(['cart' => $cart]);
                    $data = [
                        'msg' => 'Remove product susses',
                        'cart' => $cart,
                    ];
                    return back();
                }
            }
        }
    }
    /**
     * up product in cart
     * author: khanhmoc
     *
     * 
     */
    public function updateQtyUp($product_id)
    {
        $product = Product::where(['id' => $product_id])->first();
        if (!$product) {
            return view('frontend.system.home')->with(['msg' => 'Product template sold out']);
        } else {
            if (!Auth::guard('client')->check()) {
                $data = [
                    'msg' => 'You need to login before making a purchase'
                ];
                return view('frontend.system.register', $data);
            } else {
                $cart = session('cart');
                if (!isset($cart[$product->id])) {
                    $data = [
                        'msg' => 'No have Product in your cart'
                    ];
                    return back($data);
                } else {
                    $cart[$product->id]['qty_order']++;
                    session(['cart' => $cart]);
                    $data = [
                        'msg' => 'Up product susses',
                        'cart' => $cart,
                    ];
                    return back();
                }
            }
        }
    }
    /**
     * down product in cart
     * author: khanhmoc
     *
     * 
     */
    public function updateQtyDown($product_id)
    {
        $product = Product::where(['id' => $product_id])->first();
        if (!$product) {
            return view('frontend.system.home')->with(['msg' => 'Product template sold out']);
        } else {
            if (!Auth::guard('client')->check()) {
                $data = [
                    'msg' => 'You need to login before making a purchase'
                ];
                return view('frontend.system.register', $data);
            } else {
                $cart = session('cart');
                if (!isset($cart[$product->id])) {
                    $data = [
                        'msg' => 'No have Product in your cart'
                    ];
                    return view('frontend.system.cart', $data);
                } else {
                    $cart[$product->id]['qty_order']--;
                    if ($cart[$product->id]['qty_order'] <= 0) {
                        unset($cart[$product->id]);
                    }
                    session(['cart' => $cart]);
                    $data = [
                        'msg' => 'down product susses',
                        'cart' => $cart,
                    ];
                    return back();
                }
            }
        }
    }
    /**
     * remove product in cart
     * author: khanhmoc
     *
     * 
     */
    public function removeProductInCartAjax(Request $request)
    {
        $product = Product::where(['id' => $request->id])->first();
        if (!$product) {
            return view('frontend.system.home')->with(['msg' => 'Product template sold out']);
        } else {
            if (!Auth::guard('client')->check()) {
                $data = [
                    'msg' => 'You need to login before making a purchase'
                ];
                return view('frontend.system.register', $data);
            } else {
                $cart = session('cart');
                if (!isset($cart[$product->id])) {
                    $data_render = [
                        'cart' => $cart,
                    ];
                    $return_HTML_Cart = view('frontend.ajax.cart', $data_render)->render();
                    $data = [
                        'msg' => 'No have product in cart',
                        'cart' => $cart,
                        'htmlcart' => $return_HTML_Cart,
                        'status' => 'danger',
                    ];
                    return response()->json($data, 200);
                } else {
                    unset($cart[$product->id]);
                    session(['cart' => $cart]);
                    $data_render = [
                        'cart' => $cart,
                    ];
                    $return_HTML_Cart = view('frontend.ajax.cart', $data_render)->render();
                    $data = [
                        'msg' => 'Remove product susses',
                        'cart' => $cart,
                        'htmlcart' => $return_HTML_Cart,
                        'status' => 'success',
                    ];
                    return response()->json($data, 200);
                }
            }
        }
    }
    /**
     * up product in cart use ajax
     * author: khanhmoc
     *
     * 
     */
    public function upProductInCartAjax(Request $request)
    {
        $product = Product::where(['id' => $request->id])->first();
        if (!$product) {
            return view('frontend.system.home')->with(['msg' => 'Product template sold out']);
        } else {
            if (!Auth::guard('client')->check()) {
                $data = [
                    'msg' => 'You need to login before making a purchase'
                ];
                return view('frontend.system.register', $data);
            } else {
                $cart = session('cart');
                if (!isset($cart[$product->id])) {
                    $data_render = [
                        'cart' => $cart,
                    ];
                    $return_HTML_Cart = view('frontend.ajax.cart', $data_render)->render();
                    $data = [
                        'msg' => 'No have Product in your cart',
                        'cart' => $cart,
                        'htmlcart' => $return_HTML_Cart,
                        'status' => 'danger',
                    ];
                    return response()->json($data, 200);
                } else {
                    $cart[$product->id]['qty_order']++;
                    session(['cart' => $cart]);
                    $data_render = [
                        'cart' => $cart,
                    ];
                    $return_HTML_Cart = view('frontend.ajax.cart', $data_render)->render();
                    $data = [
                        'msg' => 'Up product success',
                        'cart' => $cart,
                        'htmlcart' => $return_HTML_Cart,
                        'status' => 'success',
                    ];
                    return response()->json($data, 200);
                }
            }
        }
    }
    /**
     * down product in cart use ajax
     * author: khanhmoc
     *
     * 
     */
    public function downProductInCartAjax(Request $request)
    {
        $product = Product::where(['id' => $request->id])->first();
        if (!$product) {
            return view('frontend.system.home')->with(['msg' => 'Product template sold out']);
        } else {
            if (!Auth::guard('client')->check()) {
                $data = [
                    'msg' => 'You need to login before making a purchase'
                ];
                return view('frontend.system.register', $data);
            } else {
                $cart = session('cart');
                if (!isset($cart[$product->id])) {
                    $data_render = [
                        'cart' => $cart,
                    ];
                    $return_HTML_Cart = view('frontend.ajax.cart', $data_render)->render();
                    $data = [
                        'msg' => 'No have Product in your cart',
                        'cart' => $cart,
                        'htmlcart' => $return_HTML_Cart,
                        'status' => 'danger',
                    ];
                    return response()->json($data, 200);
                } else {
                    $cart[$product->id]['qty_order']--;
                    if ($cart[$product->id]['qty_order'] <= 0) {
                        unset($cart[$product->id]);
                        $data_render = [
                            'cart' => $cart,
                        ];
                        $return_HTML_Cart = view('frontend.ajax.cart', $data_render)->render();
                        $data = [
                            'msg' => 'Remove product success',
                            'cart' => $cart,
                            'htmlcart' => $return_HTML_Cart,
                            'status' => 'danger',
                        ];
                        return response()->json($data, 200);
                    }
                    session(['cart' => $cart]);
                    $data_render = [
                        'cart' => $cart,
                    ];
                    $return_HTML_Cart = view('frontend.ajax.cart', $data_render)->render();
                    $data = [
                        'msg' => 'down product success',
                        'cart' => $cart,
                        'htmlcart' => $return_HTML_Cart,
                        'status' => 'success',
                    ];
                    return response()->json($data, 200);
                }
            }
        }
    }
}