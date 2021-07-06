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
    /*
     edit user    

    */
    public function edit($id)
    {
        //
        // dd($id);
        $item = Admin::where('id', $id)->first();
        if (!$item)
            return redirect()->route('s.roles')->with(['msg' => 'None Order in list', 'status' => 'danger']);
        $data = [
            'action' => route('s.updateInfoRole', $id),
            'item' => $item,
            'method' => 'PUT',
        ];
        return view('admin.role.form', $data);
    }
    /*
     edit user    
    */
    public function updateInfoRole(Request $request, $id)
    {
        //
        $item = Admin::where('id', $id)->first();
        if (!$item) {
            return redirect()->route('s.role')->with(['msg' => 'No has this User', 'status' => 'danger']);
        }
        $request->validate([
            'password' => ['required', 'min:5', 'max:255',],
            'email' => ['required'],
            'name' => ['required', 'min:5', 'max:255']
        ], [
            'email.required' => 'Email not none',
            'name.min' => 'Name length must be between 5 and 255',
            'name.max' =>  'Name length must be between 5 and 255',
            'name.required' => 'Name already exists',
            'password.min' => 'Password length must be between 5 and 255',
            'password.max' =>  'Password length must be between 5 and 255',
            'password.required' => 'Password already exists',
        ]);
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $item->password = $input['password'];
        $item->email = $input['email'];
        $item->updated_at = now();
        if ($item->save()) {
            return redirect()->route('s.role')->with(['msg' => 'Update success', 'status' => 'success']);
        }
        return redirect()->route('s.role')->with(['msg' => 'Update wordp error', 'status' => 'danger']);
    }
}