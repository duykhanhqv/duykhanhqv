<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    //
    public function formLoginRegister()
    {
        $data = [];
        return view('frontend.system.register', $data);
    }
    public function home()
    {
        $feature_products = Product::orderByRaw('fs_product.view DESC')->paginate(8);
        // dd($feature_products);
        $data = [
            'feature_products' => $feature_products
        ];
        return view('frontend.system.home', $data);
    }
    public function registerPost(Request $request)
    {
        $
        dd($request);
    }
}
