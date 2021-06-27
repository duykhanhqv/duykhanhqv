<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{
    /**
     * get dashboard
     * author: khanhmoc
     *
     * 
     */
    public function dashboard()
    {
        return view('admin.system.home');
    }
    /**
     * get form login
     * author: khanhmoc
     *
     * 
     */
    public function login()
    {
        return view('admin.system.login');
    }
    /**
     * get form register
     * author: khanhmoc
     *
     * 
     */
    public function register()
    {
        return view('admin.system.register');
    }
    /**
     * give input hassh pass save info user
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
            $item->password = $input['password'];
            $item->created_at = now();
            if ($item->save()) {
                return redirect()->route('s.login')->with($request->only('email', 'password'));
            }
        }
        return redirect()->route('s.register');
    }
    /**
     * check email password if true accept login
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
            return redirect()->route('s.admin');
        }
        return view('s.login');
    }
}
