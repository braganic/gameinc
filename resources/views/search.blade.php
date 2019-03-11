@extends('plantilla')

@section("titulo")
  Busqueda
  @endsection

@section("principal")
<div class="container">
  <h1>Resultados de la búsqueda:</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Imagen</th>
        <th scope="col">Producto</th>
      </tr>
    </thead>
    @foreach ($products as $product)
    <tr>
      <td>
        <a href="/products/{{$product->id}}">
          <img src="/storage/{{$product->foto}}" alt="" height="150" width="150">
        </a>
      </td>
      <td>
        <a href="/products/{{$product->id}}" style="font-size: 1.5rem;">
          {{$product->name}}
        </a>
        <div class="">
          $ {{$product->price}}
        </div>
        <div class="">
          <a href="/products/{{$product->id}}" class="btn btn-danger">Ver detalle</a>
        </div>
      </td>
    </tr>
@endforeach

</table>
</div>


@endsection
