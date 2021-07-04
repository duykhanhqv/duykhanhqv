<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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

        return view('admin.system.home',);
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
        $request->validate([
            'password' => ['required', 'min:5', 'max:255',],
            'password_confirm' => ['required', 'min:5', 'max:255', 'same:password'],
            'email' => ['required'],
            'confirm' => ['required'],
            'name' => ['required', 'min:5', 'max:255']
        ], [
            'email.required' => 'Email not none',
            'name.min' => 'Name length must be between 5 and 255',
            'name.max' =>  'Name length must be between 5 and 255',
            'name.required' => 'Name already exists',
            'password.min' => 'Password length must be between 5 and 255',
            'password.max' =>  'Password length must be between 5 and 255',
            'password.required' => 'Password already exists',
            'password_confirm.min' => 'Password confirm length must be between 5 and 255',
            'password_confirm.max' =>  'Password confirm length must be between 5 and 255',
            'password_confirm.required' => 'Password confirm already exists',
            'password_confirm.same' => 'Password confirm right same password ',
            'confirm.required' => 'You need to agree to the terms before you can create an account'
        ]);
        $input = $request->all();
        if ($input['password'] === $input['password_confirm']) {
            $input['password'] = bcrypt($input['password']);
            $item = Admin::create();
            $item->name = $input['name'];
            $item->email = $input['email'];
            $item->password = $input['password'];
            $item->created_at = now();
            if ($item->save()) {
                return redirect()->route('s.login')->with(['msg' => 'Register success', 'status' => 'success']);
            }
        }
        return redirect()->route('s.register')->with(['msg' => 'Register error', 'status' => 'danger']);
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
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('s.admin')->with(['msg' => 'Login success', 'status' => 'success']);;
        }
        return redirect()->route('s.login')->with(['msg' => 'Login error', 'status' => 'danger']);
    }
    /**
     * get form change password
     * author: khanhmoc
     *
     * 
     */
    public function changePassword()
    {
        $user = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        $data = [
            'user' => $user
        ];
        return view('admin.system.changepassword', $data);
    }
    /**
     * change password 
     * author: khanhmoc
     *
     * 
     */
    public function postChangePassword(Request $request)
    {
        // dd($request->all());
        $credentials = [
            'email' => $request->email,
            'password' => $request->old_password,
        ];
        if (!Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('s.changePassword')->with(['msg' => 'Old password is not correct', 'status' => 'danger']);
        }
        $item = Admin::where('email', $request->email)->first();
        if (!$item) {
            return redirect()->route('s.changePassword')->with(['msg' => 'No has User', 'status' => 'danger']);
        }
        $request->validate([
            'password' => ['required', 'min:5', 'max:255',],
            'password_confirm' => ['required', 'min:5', 'max:255', 'same:password'],
        ], [
            'password.min' => 'Password length must be between 5 and 255',
            'password.max' =>  'Password length must be between 5 and 255',
            'password.required' => 'Password already exists',
            'password_confirm.min' => 'Password confirm length must be between 5 and 255',
            'password_confirm.max' =>  'Password confirm length must be between 5 and 255',
            'password_confirm.required' => 'Password confirm already exists',
            'password_confirm.same' => 'Password confirm right same password ',
        ]);
        $input = $request->all();
        if ($input['password'] === $input['password_confirm']) {
            $input['password'] = bcrypt($input['password']);
            $item->password = $input['password'];
            $item->updated_at = now();
            if ($item->save()) {
                return redirect()->route('s.changePassword')->with(['msg' => 'Update password success', 'status' => 'success']);
            }
        }
        return redirect()->route('s.changePassword')->with(['msg' => 'Update password error', 'status' => 'danger']);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('s.login')->with(['msg' => 'You logout susses', 'status' => 'warning']);
    }
}
