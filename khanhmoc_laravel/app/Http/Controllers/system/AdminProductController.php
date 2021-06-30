<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImg;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * load list products 
         * author: khanhmoc
         * 
         */
        $products = Product::where('active', 1)->orderBy('id', 'DESC')->paginate(10);
        $data = [
            'products' => $products
        ];
        return view('admin.product.list', $data);
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
            'categorys' => Category::where('active', 1)->get(),
            'action' => route('products.store'),
            'method' => 'POST'

        ];
        return view('admin.product.form', $data);
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

        // dd($request->all());
        $item = Product::create();
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->desc = $request->desc;
        $item->detail = $request->detail;
        $item->created_at = now();
        $item->updated_at = now();
        $item->qty = $request->qty;
        $item->note = $request->note;
        $item->view = 0;
        $item->active = 1;
        $item->status = $request->status;
        if ($item->save()) {
            $item2 = ProductImg::create();
            $item2->product_id = $item->id;
            $item2->url = $request->url;
            $item2->alt = $request->name;
            $item2->order = 1;
            $item2->active = 1;
            if ($item2->save()) {
                return redirect()->route('products.index')->with(['msg' => 'Add success', 'status' => 'success']);
            }
            # code...
        } else {
            return redirect()->route('products.index')->with(['msg' => 'Add error', 'status' => 'danger']);
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
        $item = Product::where('id', $id)->where('active', 1)->first();
        if (!$item)
            return redirect()->route('products.index')->with(['msg' => 'None product in list', 'status' => 'danger']);
        $data = [
            'action' => route('products.update', $id),
            'categorys' => Category::where('active', '1')->get(),
            'item' => $item,
            'method' => 'PUT',

        ];
        return view('admin.product.form', $data);
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
        $item = Product::where('id', $id)->where('active', 1)->first();
        if (!$item) {
            return redirect()->route('products.index')->with(['msg' => 'No have product', 'status' => 'danger']);
        }
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->desc = $request->desc;
        $item->detail = $request->detail;
        $item->updated_at = now();
        $item->qty = $request->qty;
        $item->note = $request->note;
        $item->view = 0;
        $item->active = 1;
        $item->status = $request->status;
        if ($item->save()) {
            $item2 = ProductImg::where('product_id', $id)->first();
            $item2->url = $request->url;
            $item2->alt = $request->name;
            $item2->order = 1;
            $item2->active = 1;
            if ($item2->save()) {
                return redirect()->route('products.index')->with(['msg' => 'Update success', 'status' => 'success']);
            }
        } else {
            return redirect()->route('products.index')->with(['msg' => 'Update error', 'status' => 'danger']);
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
        $item = Product::where('id', $id)->where('active', 1)->first();
        if (!$item)
            return redirect()->route('products.index')->with(['msg' => 'None product in list', 'status' => 'danger']);
        $item->active = 0;
        if ($item->save()) {
            return redirect()->route('products.index')->with(['msg' => 'Destroy success', 'status' => 'success']);
        } else {
            return redirect()->route('products.index')->with(['msg' => 'Destroy error', 'status' => 'danger']);
        }
    }
}
