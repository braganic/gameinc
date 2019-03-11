@extends('plantilla')

@section("titulo")
  Productos
  @endsection

  @section("principal")
  <div class="container">
    <h1>Productos</h1>
    <div class="container">
    <p>Filtro por categoría</p>
    <form action="/category" method="get">
      {{csrf_field()}}
      <select class="" name="category">
        @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
      <button type="submit" name="button">Aplicar</button>
    </form>
    </div>


    @foreach ($products as $product)

        <div class="card" style="width: 18rem; margin: 35px; display: inline-block;">
      <img class="card-img-top" src="/storage/{{$product->foto}}" alt="{{$product->name}}" width="223" height="281">
      <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">Precio: ${{$product->price}}</p>
        <a href="/products/{{$product->id}}" class="btn btn-danger">Ver detalle</a>
      </div>
    </div>
    @endforeach


    <!-- <ul>
      @foreach ($products as $product)
        <li>
          <a href="/products/{{$product->id}}">
            {{$product->name}}
          </a>
        </li>
      @endforeach
    </ul> -->


  </div>

  @endsection
