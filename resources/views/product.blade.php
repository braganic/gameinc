@extends('plantilla')

@section("titulo")
  {{$product->name}}
  @endsection

@section("css")product.css
    @endsection

  @section("principal")
<div class="container">

  <div class="product-left">
    <img src="/storage/{{$product->foto}}" alt="">
  </div>
  <div class="product-right">
    <h2>{{$product->name}}</h2>
    <h3>
      $ {{$product->price}}
    </h3>
    <ul>

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

      @if (!$cart->contains($product))
      <form action="/addToCart/{{$product->id}}" method="post">
        {{csrf_field()}}
        <button type="Submit" name="button" class="btn btn-success">Añadir al carrito</button>
      </form>
  </div>
</div>



  @endif
  @endsection
