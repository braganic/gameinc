@extends('plantilla')
<?php
  $total = 0
 ?>


@section("titulo")
  Carrito
  @endsection

  @section("principal")
  <div class="container">
    <h1>Carrito</h1>
      @if ($cart->list() != [])
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
      @foreach ($cart->list() as $product)
      <?php  $total += $product->price; ?>
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
        <td>
          <form action="/removeFromCart/{{$product->id}}" method="post">
            {{csrf_field()}}
            <button type="Submit" name="button" class="btn btn-danger">X</button>
          </form>
        </td>
      </tr>
      @endforeach
      <tfoot style="border: 2px solid grey;">
        <tr>
          <td></td>
          <td scope="col" style="text-align: right; font-weight:bold">Total</td>
          <td scope="col" style="font-weight:bold;">${{$total}}</td>
          <td></td>
        </tr>
      </tfoot>
    </table>
    <form action="/cart" method="post">
      {{csrf_field()}}
      <button type="Submit" name="button" class="btn btn-success">Finalizar compra</button>
    </form>
    <br>
    <form action="/products" method="get">
      {{ csrf_field() }}
      <button type="submit" name="button2" class= "btn btn-danger"> Ver más productos</button>
    </form>
      @else
      <p>El carrito se encuentra vacío.</p>
      @endif
  </div>
  @endsection
