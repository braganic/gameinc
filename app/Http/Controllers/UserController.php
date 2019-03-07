<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
  public function show() {
    $usuario = Auth::user();

    return view('/perfil', compact('usuario'));
  }
}
