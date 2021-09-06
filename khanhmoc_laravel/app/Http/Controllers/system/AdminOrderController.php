<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::where('status', '!=', '-1')->orderBy('id', 'DESC')->paginate(10);
        $data = [
            'orders' => $orders
        ];
        return view('admin.order.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        $detail = OrderDetail::where('order_id', $id)->where('status', '!=', '0')->get();
        $data = [
            'action' => route('orders.update', $id),
            'method' => 'PUT',
            'detail' => $detail
        ];
        return view('admin.order.form', $data);
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
        $item = Order::where('id', $id)->first();
        if (!$item) {
            return redirect()->route('orders.index')->with(['msg' => 'No has this Order', 'status' => 'danger']);
        }
        $request->validate([
            'name_ship' => ['required', 'min:5', 'max:255',],
            'mobile_ship' => ['required'],
            'address_ship' => ['required'],
            'email_ship' => ['required', 'email'],
            'status' => ['required', 'numeric'],

        ], [
            'name_ship.min' => 'Name length must be between 5 and 255',
            'name_ship.max' =>  'Name length must be between 5 and 255',
            'name_ship.required' => 'Name already exists',
            'mobile_ship.required' => 'Mobile  already exists',
            'address_ship.required' => 'Address already exists',
            'email_ship' => 'Email already exists',
            'status.required' => 'Status already exists',
            'status.numeric' => 'Status not Invalid ',
        ]);
        $item->name = $request->name_ship;
        $item->mobile = $request->mobile_ship;
        $item->email = $request->email_ship;
        $item->address = $request->address_ship;
        $item->status = $request->status;
        if ($item->status == 4) {
            $id_product = OrderDetail::where('order_id', $request->order_id)->get();
            foreach ($id_product as $key) {
                // dd($key->product_id);
                $product = Product::where('id', $key->product_id)->first();
                $product->qty = $product->qty + $key->qty;
                $product->save();
            }
        }
        if ($item->save()) {
            return redirect()->route('orders.index')->with(['msg' => 'Update success', 'status' => 'success']);
        } else {
            return redirect()->route('orders.index')->with(['msg' => 'Update error', 'status' => 'danger']);
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
        $item = Order::where('id', $id)->first();
        if (!$item)
            return redirect()->route('orders.index')->with(['msg' => 'None order in list', 'status' => 'danger']);
        $item->status = -1;
        if ($item->save()) {
            return redirect()->route('orders.index')->with(['msg' => 'Destroy success', 'status' => 'success']);
        } else {
            return redirect()->route('orders.index')->with(['msg' => 'Destroy error', 'status' => 'danger']);
        }
    }
    /**
     * Display a listing order confirm of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderNew()
    {
        //


        $orders = Order::where('status', 0)->orderBy('id', 'DESC')->paginate(10);
        $data = [
            'orders' => $orders
        ];
        return view('admin.order.list', $data);
    }
    /**
     * Display a listing order confirm of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderConfirm()
    {
        //


        $orders = Order::where('status', 1)->orderBy('id', 'DESC')->paginate(10);
        $data = [
            'orders' => $orders
        ];
        return view('admin.order.list', $data);
    }
    /**
     * Display a listing order delivering of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderDelivering()
    {
        //
        $orders = Order::where('status', 2)->orderBy('id', 'DESC')->paginate(10);
        $data = [
            'orders' => $orders
        ];
        return view('admin.order.list', $data);
    }
    /**
     * Display a listing order delived of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderDelived()
    {
        //


        $orders = Order::where('status', 3)->orderBy('id', 'DESC')->paginate(10);
        $data = [
            'orders' => $orders
        ];
        return view('admin.order.list', $data);
    }
    /**
     * Display a listing order delived of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderCancel()
    {
        //
        $orders = Order::where('status', 4)->orderBy('id', 'DESC')->paginate(10);
        $data = [
            'orders' => $orders
        ];
        return view('admin.order.list', $data);
    }
    /**
     * Remove product in order
     *
     * @return \Illuminate\Http\Response
     */
    public function remove_product(Request $request)
    {
        //
        $item = OrderDetail::where('order_id', $request->order_id)->where('product_id', $request->product_id)->first();



        $item->status = 0;
        // dd($item->status);
        if (!$item)
            return redirect()->route('orders.edit', $request->order_id)->with(['msg' => 'None product in list', 'status' => 'danger']);
        $item->status = 0;
        if ($item->save()) {
            $product = Product::where('id',  $request->product_id)->first();
            $product->qty = $product->qty + $item->qty;
            if ($product->save()) {
                return redirect()->route('orders.edit', $request->order_id)->with(['msg' => 'Remove product success', 'status' => 'success']);
            }
        } else {
            return redirect()->route('orders.edit', $request->order_id)->with(['msg' => 'Remove product error', 'status' => 'danger']);
        }
    }
}