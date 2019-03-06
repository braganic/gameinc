@extends('plantilla')

@section("titulo")
  Productos
  @endsection

  @section("principal")
<h1>Productos</h1>
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
