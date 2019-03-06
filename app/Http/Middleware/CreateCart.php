<?php

namespace App\Http\Middleware;

use Closure;

class CreateCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $cart = new \App\Cart();
      \View::share('cart', $cart);
        return $next($request);
    }
}
