<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function addToCart($product, $gty){
      if(session()->has("cart.{$product->id}")){
        session(["cart.{$product->id}.gty" => session("cart.{$product->id}.gty") + $gty]);
      }else{
        session(["cart.{$product->id}" => [
          'product_id' => $product->id,
          'title' => $product->title,
          'slug' => $product->slug,
          'price' => $product->price,
          'img' => $product->getImage(),
          'gty' => $gty,
        ]]);
      }
      if (session()->has('cart_gty')){
        session(['cart_gty' => session('cart_gty') + $gty]);
      }else{
        session(['cart_gty' => $gty]);
      }
      if(session()->has('cart_total')){
        session(['cart_total' => session('cart_total') + $gty * $product->price]);
      }else{
        session(['cart_total' => $gty * $product->price]);
      }
     }
  
  
  public function delItem($product_id)
  {
  
  if (!session()->has("cart.{$product_id}")) {
    return false;
  }
  
  $gty_minus = session("cart.{$product_id}.gty");
  $sum_minus = $gty_minus * session("cart.{$product_id}.price");
  
  session(['cart_gty' => session('cart_gty') - $gty_minus ]);
  session(['cart_total' => session('cart_total') - $sum_minus ]);
  session()->forget("cart.{$product_id}");
  return true;
}
}