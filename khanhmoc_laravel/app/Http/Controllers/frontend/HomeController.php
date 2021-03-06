<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Post;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeLanguage(Request $request)
    {
        App::setLocale($request->language);
        session()->put('language', $request->language);
        // return view('frontend.language');
        return redirect()->back();
    }
    public function lang()
    {
        return view('frontend.language');
    }
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
        $feature_products = Product::orderByRaw('fs_product.view DESC')->where('active', '!=', 0)->paginate(8);
        $new_arrivals = Product::orderByRaw('fs_product.id DESC')->where('active', '!=', 0)->paginate(12);
        $best_seller_products = Product::orderByRaw('fs_product.qty DESC')->where('active', '!=', 0)->paginate(12);
        $quick_view = Product::get();
        $data = [
            'feature_products' => $feature_products,
            'new_arrivals' => $new_arrivals,
            'best_seller_products' => $best_seller_products,
            'msg' => '',
            'cart' => $cart,
            'quick_view' => $quick_view,

        ];
        return view('frontend.system.home', $data);
    }


    /**
     * listting product use ajax
     * author: khanhmoc
     *
     *
     */
    public function homeAjax()
    {
        $cart = session('cart');
        $feature_products = Product::orderByRaw('fs_product.view DESC')->paginate(8);
        $new_arrivals = Product::orderByRaw('fs_product.id DESC')->paginate(12);
        $best_seller_products = Product::orderByRaw('fs_product.qty DESC')->paginate(12);
        $quick_view = Product::get();
        $data_render = [
            'feature_products' => $feature_products,
            'new_arrivals' => $new_arrivals,
            'best_seller_products' => $best_seller_products,
            'quick_view' => $quick_view,
        ];
        $return_HTML_Home = view('frontend.ajax.home', $data_render)->render();
        $data = [
            'msg' => 'Home',
            'cart' => $cart,
            'returnHTML' => $return_HTML_Home,
            'status' => 'success'
        ];
        return response()->json($data, 200);
    }
    /**
     * register user custummer buy product
     * author: khanhmoc
     *
     * 
     */
    public function postRegister(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:5', 'max:255',],
            'password_confirm' => ['required', 'min:5', 'max:255', 'same:password'],
            'name' => ['required'],
            'mobile' => ['required', 'numeric'],
            'email' => ['required'],
            'address' => ['required'],
        ], [
            'password.min' => 'Password length must be between 5 and 255',
            'password.max' =>  'Password length must be between 5 and 255',
            'password.required' => 'Password already exists',
            'password_confirm.min' => 'Password confirm length must be between 5 and 255',
            'password_confirm.max' =>  'Password confirm length must be between 5 and 255',
            'password_confirm.required' => 'Password confirm already exists',
            'password_confirm.same' => 'Password confirm right same password ',
            'name.required' => 'Name already exists',
            'mobile.required' => 'Mobile  already exists',
            'mobile.numeric' => 'Mobile not Invalid',
            'email.required' => 'Email already exists',
            'address' => 'Address already exists',
        ]);
        $item = User::where('email', $request->email)->first();
        if ($item) {
            return redirect()->route('f.formLoginRegister')->with(['msg' => 'This e-mail is already taken', 'status' => 'danger']);
        }
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
        $request->validate([
            'password' => ['required', 'min:5', 'max:255',],
            'email' => ['required'],

        ], [
            'password.min' => 'Password length must be between 5 and 255',
            'password.max' =>  'Password length must be between 5 and 255',
            'password.required' => 'Password already exists',
            'email.required' => 'Email already exists',
        ]);
        $item = User::where('email', $request->email)->first();
        if (!$item) {
            return redirect()->route('f.formLoginRegister')->with(['msg' => 'Email or password incorrect', 'status' => 'danger']);
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('client')->attempt($credentials)) {
            return redirect()->route('f.home')->with(['msg' => 'Login success', 'status' => 'success']);
        }
        return redirect()->route('f.formLoginRegister')->with(['msg' => 'Login error', 'status' => 'danger']);
    }

    /**
     * custummer logout
     * author: khanhmoc
     *
     * 
     */
    public function logout()
    {
        Auth::guard('client')->logout();
        return redirect()->route('f.formLoginRegister')->with(['msg' => 'You logout susses', 'status' => 'warning']);
    }
    /**
     * test translate lag
     * author: khanhmoc
     *
     * 
     */
    public function testtranslate()
    {
        $aa = Post::where('id', 1)->get();
        $data = [
            'msg' => '',
            'post' => $aa
        ];
        return view('frontend.test', $data);
    }
}