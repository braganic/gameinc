@extends('plantilla')

@section("titulo")
  Busqueda
@endsection

@section("principal")

<h1>Resultados de la búsqueda:</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Imagen</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  @foreach ($products as $product)
  <tr>
    <td>
      <a href="/products/{{$product->id}}">
        <img src="/storage/{{$product->foto}}" alt="" height="50" width="50">
      </a>
    </td>
    <td>
      <a href="/products/{{$product->id}}">
        {{$product->name}}
      </a>
    </td>
    <td>
        $ {{$product->price}}
    </td>
  </tr>
  @endforeach

@endsection
