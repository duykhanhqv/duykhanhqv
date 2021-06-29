<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
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
        $products = Product::where('status', '1')->orderBy('id', 'DESC')->paginate(10);
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
        dd($request->all());
        $item = Product::create();
        $item->category_id = $request->category;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->desc = $request->desc;
        $item->detail = $request->detail;
        $item->created_at = now();
        $item->qty = $request->qty;
        $item->note = $request->note;
        $item->sold = 0;
        $item->view = 0;
        $item->active = 1;
        $item->status = 1;
        if ($item->save()) {
            return redirect()->route('products.index');
        } else {
            return back();
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
    }
}
