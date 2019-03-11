@extends('plantilla')

@section("titulo")
  {{$product->name}}
  @endsection

@section("css")product.css
    @endsection

  @section("principal")
<div class="container">

  <div class="product-left">
    <div class="img-container">

            <!-- Button trigger modal -->
      <a href="/" class="" data-toggle="modal" data-target="#exampleModal">
        <img src="/storage/{{$product->foto}}" alt="">
      </a>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <img src="/storage/{{$product->foto}}" alt="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>

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
