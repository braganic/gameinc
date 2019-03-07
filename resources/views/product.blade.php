@extends('plantilla')

@section("titulo")
  {{$product->name}}
  @endsection

  @section("principal")
<h1>{{$product->name}}</h1>
<ul>
  <li>
    Precio: {{$product->price}}
  </li>
  <li>
    Stock: {{$product->stock}}
  </li>
  <li>
    Marca: {{$product->brand->name}}
  </li>
  <li>
    Categoria: {{$product->category->name}}
  </li>



</ul>
  Foto: <img src="/storage/{{$product->foto}}" alt="" style="width:200px;height:200px;">
  @if (!$cart->contains($product))
  <form action="/addToCart/{{$product->id}}" method="post">
    {{csrf_field()}}
    <button type="Submit" name="button">Añadir al carrito</button>
  </form>
  @endif
  @endsection
