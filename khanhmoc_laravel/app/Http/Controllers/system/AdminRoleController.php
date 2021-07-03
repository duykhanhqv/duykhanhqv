<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

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
}
