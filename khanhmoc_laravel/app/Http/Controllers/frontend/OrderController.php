<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $cart = session('cart');
        $data = [
            'msg' => '',
            'cart' => $cart,
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
        $request->validate([
            'name_ship' => ['required', 'min:5', 'max:255',],
            'mobile_ship' => ['required'],
            'address_ship' => ['required'],
            'email_ship' => ['required', 'email'],
        ], [
            'name_ship.min' => 'Name length must be between 5 and 255',
            'name_ship.max' =>  'Name length must be between 5 and 255',
            'name_ship.required' => 'Name already exists',
            'mobile_ship.required' => 'Mobile  already exists',
            'address_ship.required' => 'Address already exists',
            'email_ship' => 'Email already exists',
        ]);
        $cart = session('cart');
        if (!$cart) {
            return redirect()->route('f.home')->with(['msg' => 'Cart null']);
        }
        $order = Order::create();
        $order->user_id = Auth::guard('client')->user()->id;
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
            $mes_bill_to_customer = "M?? ????n h??ng: " . $order->id . "<br>" .
                "T??n kh??ch h??ng" . $order->name .  "<br>" .
                "S??? ??i???n tho???i nh???n h??ng " . $order->mobile . "<br>" .
                "?????a ch??? giao h??ng" . $order->address . "<br>";
            Mail::raw($mes_bill_to_customer, function ($message) use ($order, $mes_bill_to_customer) {
                $message->to($order->email, $order->name);
                $message->subject("C???m ??n b???n ???? ?????t h??ng t???i shop ????y l?? th??ng b??o order th??nh c??ng");
            });
            return redirect()->route('f.home')->with(['msg' => 'Order success', 'status' => 'success']);
        } else {
            return view('frontend.system.register', ['msg' => 'Order danger', 'status' => 'danger']);
        }
    }
}