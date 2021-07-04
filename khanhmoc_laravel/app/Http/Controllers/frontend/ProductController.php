<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Product;
use App\Models\RatingAndReview;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    /**
     * detail product
     * author: khanhmoc
     *
     *
     */
    public function detailProduct($product_id)
    {
        $cart = session('cart');

        $product_detail = Product::where('id', $product_id)->first();
        // dd($product);
        // foreach ($product->user as $order) {
        //     dd($order->review);
        // }
        $related_product = Product::where('category_id', $product_detail->category_id)->paginate(4);
        // $ratings=RatingAndReview::where('product_id', $product_id);
        $user = User::get();
        $data = [
            'product_detail' => $product_detail,
            'related_product' => $related_product,
            'msg' => '',
            'cart' => $cart,
            'user' => $user,

        ];
        return view('frontend.system.detailproduct', $data);
    }
    /**
     * list ting product
     * author: khanhmoc
     *
     *
     */
    public function listtingProducts($category_id)
    {
        $cart = session('cart');
        $list_products = Product::where('fs_product.id', 2)->first();
        // dd($li)
        $departments = Department::get();
        $data = [
            'list_products' => $list_products,
            'departments' => $departments,
            'cart' => $cart,
            'category_id' => $category_id

        ];
        // dd($data);
        return view('frontend.system.listingproduct', $data);
    }
    /**
     * listting product use ajax
     * author: khanhmoc
     *
     *
     */
    public function listtingProductsAjax(Request $request)
    {
        $cart = session('cart');
        $list_products = Product::where('fs_product.category_id', $request->id)->paginate(12);
        $departments = Department::get();
        $data_render = [
            'list_products' => $list_products,
            'departments' => $departments,
            'category_id' => $request->id,
        ];
        $return_HTML_Product = view('frontend.ajax.listingproduct', $data_render)->render();
        $data = [
            'msg' => 'return Page listing',
            'htmllisting' => $return_HTML_Product,
            'status' => 'success',

        ];
        return response()->json($data, 200);
    }
    /**
     * switch list product show product 
     * author: khanhmoc
     *
     *
     */
    public function productsListAjax(Request $request)
    {
        $list_products = Product::where('fs_product.category_id', $request->id)->paginate(12);
        $data_render = [
            'list_products' => $list_products,
        ];
        $return_HTML_list = view('frontend.ajax.listproduct', $data_render)->render();
        $data = [
            'msg' => 'listing product',
            'htmllist' => $return_HTML_list,
            'status' => 'success',
            'category_id' => $request->id,
        ];
        return response()->json($data, 200);
    }
    /**
     * switch gird product show product 
     * author: khanhmoc
     *
     *
     */
    public function productsGirdAjax(Request $request)
    {
        $list_products = Product::where('fs_product.category_id', $request->id)->paginate(12);
        $data_render = [
            'list_products' => $list_products,
        ];
        $return_HTML_gird = view('frontend.ajax.girdproduct', $data_render)->render();
        $data = [
            'msg' => 'gird product',
            'htmlgird' => $return_HTML_gird,
            'status' => 'success',
            'category_id' => $request->id,
        ];
        return response()->json($data, 200);
    }
    /**
     * quick view product
     * author: khanhmoc
     *
     *
     */
    public function productsQuickView(Request $request)
    {
        $cart = session('cart');
        $product_detail = Product::where('id', $request->id)->first();
        // dd($product_detail->id);
        $data_render = [
            'product_detail' => $product_detail
        ];
        $return_HTML = view('frontend.ajax.quickview', $data_render)->render();
        $data = [
            'returnHTML' => $return_HTML,
            'msg' => 'success',
            'status' => 'success'
        ];
        return response()->json($data, 200);
    }
}
