<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class AdminDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments = Department::where('active', 1)->orderBy('id', 'DESC')->paginate(10);
        $data = [
            'departments' => $departments,
        ];
        return view('admin.department.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'action' => route('departments.store'),
            'method' => 'POST',
        ];
        return view('admin.department.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'status' => ['required', 'numeric']

        ], [
            'name.required' => 'Name department already exists',
            'name.min' => 'Name length must be between 5 and 255',
            'name.max' =>  'Name length must be between 5 and 255',
            'status.required' => 'Status already exists',
        ]);
        $item = Department::create();
        $item->name = $request->name;
        $item->created_at = now();
        $item->updated_at = now();
        $item->active = 1;
        $item->status = $request->status;
        if ($item->save()) {
            return redirect()->route('departments.index')->with(['msg' => 'Add success', 'status' => 'success']);
            # code...
        } else {
            return redirect()->route('departments.index')->with(['msg' => 'Add error', 'status' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $item = Department::where('id', $id)->where('active', 1)->first();
        if (!$item)
            return redirect()->route('departments.index')->with(['msg' => 'None Department in list', 'status' => 'danger']);
        $data = [
            'action' => route('departments.update', $id),
            'item' => $item,
            'method' => 'PUT',

        ];
        return view('admin.department.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $item = Department::where('id', $id)->where('active', 1)->first();
        if (!$item) {
            return redirect()->route('departments.index')->with(['msg' => 'No has Department', 'status' => 'danger']);
        }
        $request->validate([
            'name' => ['required', 'min:5', 'max:255'],
            'status' => ['required', 'numeric']
        ], [
            'name.required' => 'Name department already exists',
            'name.min' => 'Name length must be between 5 and 255',
            'name.max' =>  'Name length must be between 5 and 255',
            'status.required' => 'Status already exists',
            'status.numeric' => 'Status not Invalid '
        ]);
        $item->name = $request->name;
        $item->active = 1;
        $item->status = $request->status;
        if ($item->save()) {

            return redirect()->route('departments.index')->with(['msg' => 'Update success', 'status' => 'success']);
        } else {
            return redirect()->route('departments.index')->with(['msg' => 'Update error', 'status' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $item = Department::where('id', $id)->where('active', 1)->first();
        if (!$item)
            return redirect()->route('departments.index')->with(['msg' => 'None department in list', 'status' => 'danger']);
        $item->active = 0;
        if ($item->save()) {
            return redirect()->route('departments.index')->with(['msg' => 'Destroy success', 'status' => 'success']);
        } else {
            return redirect()->route('departments.index')->with(['msg' => 'Destroy error', 'status' => 'danger']);
        }
    }
}
