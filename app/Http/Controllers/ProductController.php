<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        // записываем в сессию
        // session([
        //     'cart'=>[
        //         1=>[
        //             'id'=>1,
        //             'title'=>'Product 1',
        //             'price'=>10,
        //             'gty'=>'2',
        //         ],

        //         3=>[
        //             'id'=>1,
        //             'title'=>'Product 3',
        //             'price'=>10,
        //             'gty'=>'3',
        //         ]
        //     ]
        // ]);
        // получение данных из сессии
        // dump (session('cart.1.title'));
        // dump (session('cart.3.price'));
        // записываем в сессию
        // session([
        //     'cart.2'=>[
        //             'id'=>2,
        //             'title'=>'Product 2',
        //             'price'=>10,
        //             'gty'=>'3',
        //     ]
        //     ]);
        //     dump(session('cart'));
            // проверка наличия в сессии элемента
            // dump(session()->has('cart.2.title'));

            // проход до сессии циклом
            // foreach(session('cart')as$item){
            //     dump($item['title'],$item['price']);
            // }
       $products=Product::with(['category','status'])->orderBy('id','asc')->paginate(16);

       return view('products.index',compact('products'));

    //    измеенение значения элемента
    // session(['cart.2.price'=>session('cart.2.price')+1]);
    // dump(session('cart'));

      // удаление элемента из сесии
    //  session()->forget('cart.1');
    //  dump(session('cart'));

    //  очистить сессию
    // session()->flush();
    // dump(session('cart'));

    }

    public function show($slug){
      $product=Product::query()->with(['category','status'])->where('slug',$slug)->firstOrFail();
      if (!$product->status) {
        return redirect()->back();
      }
      return view('products.show',compact('product'));
    }

    public function search(Request $request) {
      $request->validate([
        's' => 'nullable'
      ]);



      $products = Product::query()->where('title', 'LIKE', "%$request->s%")->paginate(10);
      return view('categories.show', ['products' => $products, 's' => $request->s]);
    }


    public function catalog()
    {
      return view('catalog');
    }
}
