@extends('plantilla')

@section("titulo")
  Busqueda
  @endsection

  @section("principal")
<h1>Resultados de la búsqueda:</h1>
<ul>
  @foreach ($products as $product)
    <li>
      <a href="/products/{{$product->id}}">
        {{$product->name}}
      </a>
    </li>
  @endforeach
</ul>
  @endsection
