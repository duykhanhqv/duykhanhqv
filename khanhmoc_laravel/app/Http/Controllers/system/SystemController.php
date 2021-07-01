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
    /**
     * get form change password
     * author: khanhmoc
     *
     * 
     */
    public function changePassword()
    {
        return view('admin.system.changepassword');
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
        if (!Auth::attempt($credentials)) {
            return redirect()->route('s.admin')->with(['msg' => 'Old password is not correct', 'status' => 'danger']);
        }
        $item = User::where('email', $request->email)->where('active', 1)->first();
        if (!$item) {
            return redirect()->route('s.admin')->with(['msg' => 'No has User', 'status' => 'danger']);
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
                return redirect()->route('s.admin')->with(['msg' => 'Update password success', 'status' => 'success']);
            }
        }
        return redirect()->route('s.admin')->with(['msg' => 'Update password error', 'status' => 'danger']);
    }
}
