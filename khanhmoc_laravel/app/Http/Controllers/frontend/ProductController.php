<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Product;
use App\Models\ProductTranslation;
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
        $quick_view = Product::get();
        $views = session('views');
        if (isset($views[$product_detail->id])) {
        } else {
            $views[$product_detail->id] = [
                'id_user' => Auth::guard('client')->user()->id,
                'id_product' => $product_detail->id,
                'view' => 1
            ];
            session()->put(['views' => $views]);
            $item = Product::find($product_id);
            $item->view = $item->view + 1;
            $item->save();
        }
        $data = [
            'product_detail' => $product_detail,
            'related_product' => $related_product,
            'msg' => '',
            'cart' => $cart,
            'user' => $user,
            'quick_view' => $quick_view,


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
        $list_products = Product::where('fs_product.category_id', $category_id)->where('active', '!=', 0)->paginate(12);
        $departments = Department::get();
        $countResult = count(Product::where('fs_product.category_id', $category_id)->where('active', '!=', 0)->get());
        // dd($list_products->links());
        $data = [
            'list_products' => $list_products,
            'departments' => $departments,
            'cart' => $cart,
            'category_id' => $category_id,
            'countResult' => $countResult,

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
        $countResult = count(Product::where('fs_product.category_id', $request->id)->where('active', '!=', 0)->get());
        $data_render = [
            'list_products' => $list_products,
            'departments' => $departments,
            'category_id' => $request->id,
            'countResult' => $countResult,
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
        $quick_view = Product::get();
        $data_render = [
            'product_detail' => $product_detail
        ];
        $return_HTML = view('frontend.ajax.quickview', $data_render)->render();
        $data = [
            'returnHTML' => $return_HTML,
            'msg' => 'success',
            'status' => 'success',
            'quick_view' => $quick_view,

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
        $quick_view = Product::get();
        $views = session('views');
        if (isset($views[$product_detail->id])) {
        } else {
            $views[$product_detail->id] = [
                'id_user' => Auth::guard('client')->user()->id,
                'id_product' => $product_detail->id,
                'view' => 1
            ];
            session()->put(['views' => $views]);
            $item = Product::find($request->id);
            $item->view = $item->view + 1;
            $item->save();
        }
        $data_render = [
            'product_detail' => $product_detail,
            'related_product' => $related_product,
            'quick_view' => $quick_view,

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

        $product = RatingAndReview::where('product_id', $request->id)->where('user_id', Auth::guard('client')->user()->id)->get();
        $temp = count($product);
        if ($temp == 0) {
            $item = new RatingAndReview();
            $item->product_id = $request->id;
            $item->rating = $request->star + 1;
            $item->user_id = Auth::guard('client')->user()->id;
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
    /**
     * search product
     * author: khanhmoc
     *
     *
     */
    public function searchProduct(Request $request)
    {


        $cart = session('cart');
        $query = $request->keyword;
        $test = ProductTranslation::where('name', 'like', '%' . $query . '%')->orwhere('description', 'like', '%' . $query . '%')->paginate(12);
        $a = array();
        foreach ($test as $temp) {
            $a[] = $temp->product_id;
        }
        $search = Product::find($a);
        $departments = Department::get();
        $data = [
            'list_products' => $search,
            'departments' => $departments,
            'cart' => $cart,
            'search' => $query
        ];

        return view('frontend.system.search', $data);
    }
    /**
     * search product
     * author: khanhmoc
     *
     *
     */
    public function searchAutoComplement(Request $request)
    {
        $query = $request->keyword;
        $data = Product::where('name', 'like', '%' . $query . '%')->orwhere('desc', 'like', '%' . $query . '%')->where('active', 1)->where('status', 1)->where('qty', '>', '0')->get();
        return response()->json($data);
    }

    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $cart = session('cart');
            $list_products = Product::where('fs_product.category_id', $request->id)->where('active', '!=', 0)->paginate(12);
            $departments = Department::get();
            $countResult = count(Product::where('fs_product.category_id', $request->id)->where('active', '!=', 0)->get());
            // dd($list_products->links());
            $data = [
                'list_products' => $list_products,
                'departments' => $departments,
                'cart' => $cart,
                'category_id' => $request->id,
                'countResult' => $countResult,

            ];
            // $data = Product::where('fs_product.category_id', )->paginate(12);
            return view('frontend.system.listingproduct', compact('data'))->render();
        }
    }
    // public function productsListAjax(Request $request)
    // {
    //     $list_products = Product::where('fs_product.category_id', $request->id)->paginate(12);
    //     $data_render = [
    //         'list_products' => $list_products,
    //     ];
    //     $return_HTML_list = view('frontend.ajax.listproduct', $data_render)->render();
    //     $data = [
    //         'msg' => 'listing product',
    //         'htmllist' => $return_HTML_list,
    //         'status' => 'success',
    //         'category_id' => $request->id,
    //     ];
    //     return response()->json($data, 200);
    // }
}