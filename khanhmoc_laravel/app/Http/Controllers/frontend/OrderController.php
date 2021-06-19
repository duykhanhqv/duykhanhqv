<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // 
    /**
     * get checkout
     * author: khanhmoc
     *
     * return array cart
     */
    public static function getCheckOut()
    {
        $carts = session('cart');
        $data = [
            'msg' => 'Khánh mốc',
            'carts' => $carts,
        ];
        return view('frontend.system.checkout', $data);
    }
    /**
     * create bill write in data base
     * author: khanhmoc
     *
     * return 
     */
    public function createBill(Request $request)
    {
        $cart = session('cart');
        if (!$cart) {
            return redirect()->route('f.home')->with(['msg' => 'Giỏ hàng rỗng']);
        }
        $order = Order::create();
        $order->user_id = Auth::user()->id;
        $order->created_at = now();
        $order->name = $request->name_ship;
        $order->address = $request->address_ship;
        $order->email = $request->email_ship;
        $order->mobile = $request->mobile_ship;
        $order->status = 0;
        if ($order->save()) {
            foreach ($cart as $pid => $item) {
                OrderDetail::insert([
                    'order_id' => $order->id,
                    'product_id' => $pid,
                    'qty' => $item['qty_order'],
                    'price' => $item['price'],
                    'created_at' => now()
                ]);
                $product = Product::where('id', $pid)->first();
                Product::where('id', $pid)->update([
                    'qty' => $product->qty - $item['qty_order']
                ]);
            }
            session()->forget(['cart']);
            return view('frontend.system.register', ['msg' => 'order susses']);
        } else {
            return view('frontend.system.register', ['msg' => 'error']);
        }
    }
}
