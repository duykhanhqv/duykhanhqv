<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRoleController extends Controller
{
    //
    /**
     * get list user and role
     * author: khanhmoc
     *
     * 
     */
    public function list()
    {

        $list_user = Admin::orderBy('id', 'DESC')->paginate(10);
        $data = [
            'list_user' => $list_user,
        ];
        return view('admin.role.list', $data);
    }
    /**
     * update role for user
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $user = Admin::where('email', $request->email)->first();
        // dd($user);
        if (!$user) {
            return redirect()->route('s.role')->with(['msg' => 'None has user', 'status' => 'danger']);
        } else {
            $user->roles()->detach();
            if ($request->admin_role) {
                $user->roles()->attach(Roles::where('name', 'admin')->first());
            }
            if ($request->product_role) {
                $user->roles()->attach(Roles::where('name', 'product')->first());
            }
            if ($request->order_role) {
                $user->roles()->attach(Roles::where('name', 'order')->first());
            }
            return redirect()->back()->with(['msg' => 'Add role susses',  'status' => 'success']);
        }
    }
}
