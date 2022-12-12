<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use Car;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    public function add(Request $request){
      $request->validate([
         'product_id'=>'required|integer',
         'gty'=>'required|integer',
      ]);
      $data=$request->all();
      $product=Product::findOrFail($data['product_id']);
        $cart=new Cart();
        $cart->addToCart($product,$data['gty']);
        return view('cart.cart-modal');
    }

    public function show()
    {
      return view('cart.cart-modal');
    }

    public function delItem($product_id)
    {
      $cart = new Cart();
      $cart -> delItem($product_id);
      return view('cart.cart-modal');
    }

public function clear()
{
  session() -> forget('cart');
  session() -> forget('cart_gty');
  session() -> forget('cart_total');
  return view('cart.cart-modal');
}

public function checkout (Request $request)
{
  if ($request->method() == 'POST') {
    $request->validate([
      'email' => 'required',
    ]);
    $data = $request->all();

    DB::transaction(function () use ($data) {
      $order_data = array_merge([
        'gty' => session('cart_gty'),
        'total' => session('cart_total'),
      ], $data);
      $order = Order::create($order_data);
      $order->products()->createMany(session('cart'));
    });

    session()->forget('cart');
    session()->forget('cart_gty');
    session()->forget('cart_total');
    return redirect()->route('cart.checkout')->with('success', 'Заказ оформлен');
  }
  return view('cart.checkout');
}

}
