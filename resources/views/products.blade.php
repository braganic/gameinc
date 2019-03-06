@extends('plantilla')

@section("titulo")
  Productos
  @endsection

  @section("principal")
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
