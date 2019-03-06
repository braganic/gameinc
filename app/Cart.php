<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function add(Product $product) {
      $cart = session('cart');

      if ($cart) {
        $cart[] = $product;
      } else {
        $cart = [$product];
      }

      session(['cart' => $cart]);
    }

    public function list() {
      return session('cart');
    }

    public function contains(Product $product) {
      $cart = session('cart');

      if (!$cart) {
        return false;
      }
      foreach ($cart as $item) {
        if ($item->id == $product->id) {
          return true;
        }
      }
      return false;
    }

    public function clear() {
      session(['cart' => []]);
    }
}
