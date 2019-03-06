@extends('plantilla')

@section("titulo")
  Carrito
  @endsection

  @section("principal")
  <h1>Carrito</h1>
  <ul>
    @foreach ($cart->list() as $product)
      <li>
        <a href="/products/{{$product->id}}">
          {{$product->name}}
        </a>
      </li>
    @endforeach
  </ul>
  @if ($cart)
  <form action="/cart" method="post">
    {{csrf_field()}}
    <button type="Submit" name="button">Finalizar compra</button>
  </form>
  @endif
  @endsection
