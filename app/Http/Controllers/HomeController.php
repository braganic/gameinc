<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $products = Product::all();
      $max = count($products)-1;
      $prodList = [];
      $randList = [];


      for ($i=0; count($prodList) <6 ; $i++) {
        $rand = rand(0,$max);
        if (!in_array($rand, $randList)) {
          $prodList[] = $products[$rand];
          $randList[] = $rand;
        }
      }
        return view('index', compact("prodList"));
    }
}
