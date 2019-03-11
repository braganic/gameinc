@extends('plantilla')

@section("titulo")
  {{$usuario->name}}
  @endsection

  @section("principal")
<h1>Bienvenido a tu perfil, {{$usuario->name}}</h1>
<ul>
  <li>
    Tu email:{{$usuario->email}}
  </li>
  <li>
  {{$usuario->name}}
  </li>
  <li>
    {{$usuario->name}}
  </li>
  <li>
    {{$usuario->name}}
  </li>



</ul>
@endsection
