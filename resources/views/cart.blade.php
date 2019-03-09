@extends('plantilla')

@section("titulo")
  Carrito
  @endsection

  @section("principal")
  <h1>Carrito</h1>
    @if ($cart->list() != [])
  <ul>
    @foreach ($cart->list() as $product)
      <li>
        <a href="/products/{{$product->id}}">
          {{$product->name}}
        </a>
      </li>
    @endforeach
  </ul>
  <form action="/cart" method="post">
    {{csrf_field()}}
    <button type="Submit" name="button">Finalizar compra</button>
  </form>
    @else
    <p>El carrito se encuentra vacío.</p>
    @endif
  @endsection
