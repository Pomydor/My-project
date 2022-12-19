<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Товары';
        $products = Product::query()->paginate(10);
        return view('admin', compact('products', 'title'));
    }

    public function users()
    {
        $users = User::paginate(10);
        return view('users-table', compact('users'));
    }

    public function orders()
    {
        $orders = Order::paginate(10);
        return view('orders-table', compact('orders'));
    }

    public function showOrder(Order $order)
    {
        $order->with('products');
        $products = $order->products;
        return view('order-products', compact('order', 'products'));
    }

    public function deleteOrder(Order $order)
    {
        $order->products()->delete();
        $order->deleteOrFail();
        return redirect()->back();
    }

    public function changeHit(Product $product) {
        $product->updateOrFail([
            'hit' => !$product->hit
        ]);
        return redirect()->back();
    }

    public function changeSale(Product $product) {
        $product->updateOrFail([
            'sale' => !$product->sale
        ]);
        return redirect()->back();
    }
    public function changeDlc(Product $product) {
        $product->updateOrFail([
            'dlc' => !$product->dlc
        ]);
        return redirect()->back();
    }

    public function changeRole(User $user)
    {
        // Если админ попытается сам себя лишить прав администратора, то его вернет обратно
        if ($user->id == auth()->user()->id) {
            return redirect()->back();
        }
        $user->updateOrFail([
            'is_admin' => $user->is_admin
        ]);
        return redirect()->back();
    }

    public function cancelPost($id)
    {
        $Product = Product::findOrFail($id);
        $Product->status = false;
        $Product->save();
        return redirect()->back();
    }
    public function acceptPost(Request $request)
    {
        $Product = Product::findOrFail($request->id);
        $Product->status = true;
        $Product->save();
        return redirect('/admin');
    }
}
