<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
        $product_detail = Product::where('id', $product_id)->first();
        $related_product = Product::where('category_id', $product_detail->category_id)->paginate(4);
        $data = [
            'product_detail' => $product_detail,
            'related_product' => $related_product,
            'msg' => ''
        ];
        return view('frontend.system.detailproduct', $data);
    }
}
