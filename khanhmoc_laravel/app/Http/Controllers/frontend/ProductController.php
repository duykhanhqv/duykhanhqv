<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Product;
use App\Models\RatingAndReview;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $related_product = Product::where('category_id', $product_detail->category_id)->paginate(4);
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
        $list_products = Product::where('fs_product.category_id', $category_id)->paginate(12);
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
    /**
     * listting product use ajax
     * author: khanhmoc
     *
     *
     */
    public function productsDetailAjax(Request $request)
    {
        $cart = session('cart');

        $product_detail = Product::where('id', $request->id)->first();
        $related_product = Product::where('category_id', $product_detail->category_id)->paginate(4);
        $data_render = [
            'product_detail' => $product_detail,
            'related_product' => $related_product,
        ];
        $return_HTML_Detail = view('frontend.ajax.detailproduct', $data_render)->render();
        $data = [
            'msg' => 'Detail product',
            'cart' => $cart,
            'returnHTML' => $return_HTML_Detail,
            'status' => 'success'
        ];
        return response()->json($data, 200);
    }
    /**
     * add rating and review
     * author: khanhmoc
     *
     *
     */
    public function postRatingReview(Request $request)
    {

        $request->validate([
            'star' => ['required', 'numeric'],
            'review' => ['required'],
        ], [
            'star.required' => 'Star already exists',
            'star.numeric' => 'Star not Invalid',
            'review.required' => 'Status already exists',
        ]);

        $product = RatingAndReview::where('product_id', $request->id)->where('user_id', Auth::user()->id)->get();
        $temp = count($product);
        if ($temp == 0) {
            $item = new RatingAndReview();
            $item->product_id = $request->id;
            $item->rating = $request->star + 1;
            $item->user_id = Auth::user()->id;
            $item->review = $request->review;
            $item->created_at = now();
            $item->updated_at = now();
            if ($item->save()) {
                return redirect()->route('f.detailProduct', $request->id)->with(['msg' => 'Rating success', 'status' => 'susses',]);
                # code...
            } else {
                return redirect()->route('f.detailProduct', $request->id)->with(['msg' => 'Rating error', 'status' => 'danger']);
            }
        } else {
            return redirect()->route('f.detailProduct', $request->id)->with(['msg' => 'You only rate 1 product 1 time', 'status' => 'danger']);
        }
    }
}