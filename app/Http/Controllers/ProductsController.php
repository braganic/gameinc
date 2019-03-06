<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Category;

class ProductsController extends Controller
{
    public function directory() {
      $products = Product::paginate();
      $categories = Category::paginate();

      return view("products", compact("products", "categories"));
    }

    public function show($id) {
      $cart = new Cart();
      $product = Product::find($id);
      return view("product", compact("product", "cart"));
    }

    public function addToCart($id) {
      $cart = new Cart();
      $product = Product::find($id);
      $cart->add($product);

      return redirect('/cart');

    }

    public function viewCart() {
      $cart = new Cart();

      return view("cart");
    }

    public function finishCheckout() {
      $cart = new Cart();
      $products = $cart->list();

      foreach ($products as $product) {
        $product->stock = $product->stock - 1;
        $product->save();
      }
      $cart->clear();
      return view("success");
    }

    public function search(Request $req) {
      $search = $req["search"];

      $products = Product::where("name", "like", "%$search%")->get();

      return view('search', compact("products"));
    }

    public function category(Request $req) {
      $search = $req["category"];
      $category = Category::find($search);
      $products = Product::where("category_id", "like", "$category->id")->get();
      $categories = Category::paginate();

      return view('products', compact("products","categories"));
    }
}
