<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * get page login and register
     * author: khanhmoc
     *
     * return form login, register
     */
    public function formLoginRegister()
    {
        $cart = session('cart');
        $data = [
            'msg' => '',
            'cart' => $cart,
        ];
        return view('frontend.system.register', $data);
    }
    /**
     * get page home
     * author: khanhmoc
     *
     * return object more type product
     */
    public function home()
    {
        $cart = session('cart');
        $feature_products = Product::orderByRaw('fs_product.view DESC')->paginate(8);
        $new_arrivals = Product::orderByRaw('fs_product.id DESC')->paginate(12);
        $best_seller_products = Product::orderByRaw('fs_product.qty DESC')->paginate(12);
        $data = [
            'feature_products' => $feature_products,
            'new_arrivals' => $new_arrivals,
            'best_seller_products' => $best_seller_products,
            'msg' => '',
            'cart' => $cart,
        ];
        return view('frontend.system.home', $data);
    }
    /**
     * register user custummer buy product
     * author: khanhmoc
     *
     * 
     */
    public function postRegister(Request $request)
    {
        $input = $request->all();
        if ($input['password'] === $input['password_confirm']) {
            $input['password'] = bcrypt($input['password']);
            $item = User::create();
            $item->name = $input['name'];
            $item->email = $input['email'];
            $item->address = $input['address'];
            $item->password = $input['password'];
            $item->mobile = $input['mobile'];
            $item->created_at = now();
            if ($item->save()) {
                return view('f.formLoginRegister');
            }
        }
        return view('f.formLoginRegister');
    }
    /**
     * custummer login buy product
     * author: khanhmoc
     *
     * 
     */
    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            return view('f.home');
        }
        return view('f.loginRegister');
    }
}
