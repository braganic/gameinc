<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class AdminController extends Controller
{
    public function add() {
    	return view("auth/registerAdmin");
    }

    public function store(Request $data) {
    	$this->validate($data, [
        'name' => ['required', 'string', 'max:255', 'min:4'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'avatar' => ['required', 'image'],
        'country' => ['required'],
        'terms' => ['required'],
        ]);

        $poster = $data["avatar"];
        $rutaDondeSeGuardaElArchivo = $poster->store("public");
        $nombreDelArchivo = basename($rutaDondeSeGuardaElArchivo);
        User::create([
              'name' => $data['name'],
              'email' => $data['email'],
              'password' => Hash::make($data['password']),
              'country' => $data['country'],
              'cities' => null,
              'avatar' => $nombreDelArchivo,
              'type' => 2
        ]);
    	return redirect("/");
    }
}
