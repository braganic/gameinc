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
        <th style="width:25%;" scope="col">Imagen</th>
        <th scope="col">Producto</th>
        <th scope="col">Precio</th>
        <th scope="col">Link</th>
      </tr>
    </thead>
    @foreach ($products as $product)
    <tr style="height:180px;">
      <td valign="middle" >
        <a href="/products/{{$product->id}}">
          <img src="/storage/{{$product->foto}}" alt="" height="180" width="140">
        </a>
      </td>
      <td valign="middle" style="height:180px;">
        <a href="/products/{{$product->id}}" style="font-size: 1.5rem;">
          {{$product->name}}
        </a>


      </td>
      <td valign="middle" style="height:180px;">
        <div class="">
          $ {{$product->price}}
        </div>
        </td>
        <td>
          <div class="">
            <a href="/products/{{$product->id}}" class="btn btn-danger">Ver detalle</a>
          </div></td>


    </tr>
@endforeach

</table>
</div>


@endsection
