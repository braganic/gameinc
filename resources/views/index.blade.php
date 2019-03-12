@extends('plantilla')

@section("titulo")
GAMEINC - Tu tienda de videojuegos
  @endsection

@section('principal')



        <section class="carousel">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="/storage/carrousel1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="/storage/carrousel2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="/storage/carrousel3.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </section>
        <section class="links-section">
          <div class="payments">
            <div class="icon">
              <i class="far fa-credit-card"></i>
            </div>
            <div class="desc">
              <p>MEDIOS DE PAGO</p>
              <a href="#">Ver promociones bancarias</a>
            </div>
          </div>
          <div class="shipping">
            <div class="icon">
              <i class="fas fa-truck"></i>
            </div>
            <div class="desc">
              <p>ENVÍOS A DOMICILIO A TODO EL PAÍS</p>
              <a href="#">Calculá el costo de envío</a>
            </div>
          </div>
          <div class="pickup">
            <div class="icon">
              <i class="fas fa-map-marked-alt"></i>
            </div>
            <div class="desc">
              <p>RETIRÁ GRATIS TU PEDIDO EN SUCURSAL</p>
              <a href="#">Ver mapa de nuestras sucursales</a>
            </div>
          </div>
        </section>
        <section class="main-categories">
          <div class="top-products">
            <div class="product-row">

              @foreach ($prodList as $product)
              <div class="product-container">
                <div class="cover">
                  <img src="/storage/{{$product->foto}}"" alt="" witdh="223" height="281">
                </div>
                <div class="price">
                  ${{$product->price}}
                </div>
                <div class="buynow">
                  <form method="get" action="/products/{{$product->id}}">
                    <input type="submit" name="buynow" value="COMPRAR AHORA">
                  </form>
                </div>
              </div>
              @endforeach


          </div>
          </div>


          <div class="special">
            <div class="special-img">
              <img src="/storage/nswitch.jpg" alt="">
            </div>
            <div class="special-img">
              <img src="/storage/funko.jpg" alt="">
            </div>
            <div class="special-img">
              <img src="/storage/labo.jpg" alt="">
            </div>
          </div>
          <div class="top-categories">
            <div class="category-img">
              <img src="/storage/notebooks.jpg" alt="">
            </div>
            <div class="category-img">
              <img src="/storage/edcolecciones.jpg" alt="">
            </div>
            <div class="category-img">
              <img src="/storage/binfantiles.jpg" alt="">
            </div>
          </div>
        </section>



@endsection
