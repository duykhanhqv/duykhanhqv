<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Product::paginate(10);
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

    /**
     * get list product top 10 view
     * author: khanhmoc
     * 
     */

    public function topView($limit)
    {
        return Product::orderBy('view', 'DESC')->limit($limit)->get();
    }
    /**
     * get list product top 10 view
     * author: khanhmoc
     * 
     */
    public function topPrice()
    {
        return Product::orderBy('price', 'DESC')->limit(10)->get();
    }
    /**
     * get list product top 10 view
     * author: khanhmoc
     * 
     */
    public function priceBetween(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from' => 'required|numeric',
            'to' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        return Product::whereBetween('price', [$request->from, $request->to])->limit(10)->get();
    }
}