<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Category;
use App\Brand;

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
      if ($search == 'null') {
        $products = Product::all();
      } else {
        $products = Product::where("category_id", "like", "$category->id")->get();
      }

      $categories = Category::paginate();

      return view('products', compact("products","categories"));
    }

    public function delete(Request $form) {
      $idProduct = $form["idProduct"];
      $product = Product::find($idProduct);
      $product->delete();
      return redirect("/products");
    }

    public function create() {
      $categories = Category::all();
      $brands = Brand::all();
      return view('createProduct', compact("categories","brands"));
    }

    public function save(Request $data) {

      $poster = $data["foto"];
      $rutaDondeSeGuardaElArchivo = $poster->store("public");
      $nombreDelArchivo = basename($rutaDondeSeGuardaElArchivo);

      Product::create([
          'name' => $data['name'],
          'stock' => $data['stock'],
          'price' => $data['price'],
          'brand_id' => $data['brand_id'],
          'category_id' => $data['category_id'],
          'foto' => $nombreDelArchivo
      ]);

      return redirect('/products');


    }
}
