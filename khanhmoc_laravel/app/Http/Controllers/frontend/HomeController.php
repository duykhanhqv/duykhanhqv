<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
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
        $data = [
            'msg' => ''
        ];
        return view('frontend.system.register', $data);
    }
    /**
     * get page home
     * author: khanhmoc
     *
     * return object product 
     */
    public function home()
    {
        $feature_products = Product::orderByRaw('fs_product.view DESC')->paginate(8);
        $data = [
            'feature_products' => $feature_products,
            'msg' => '',
        ];
        return view('frontend.system.home', $data);
    }
    /**
     * create user
     * author: khanhmoc
     *
     * return object product 
     */
    public function registerPost(Request $request)
    {
        $item = User::create();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->address = $request->address;
        $item->password = bcrypt('$request->password');
        $item->mobile = $request->mobile;
        $item->created_at = now();
        if ($item->save()) {
            return view('frontend.system.register', ['msg' => 'Successful Registration']);
        } else {
            return view('frontend.system.register');
        }
    }
    /**
     * login
     * author: khanhmoc
     *
     *
     */
    public function loginPost(Request $request)
    {

        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($arr)) {
            return redirect()->route('f.home');
        } else {
            $data = [
                'msg' => 'login error',
            ];
            return view('frontend.system.register', $data);
        }
    }
}
