@extends('plantilla')

@section('principal')

  <main class="main">
        <section class="carousel">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="http://www.cdmarket.com.ar/Pubs/Sites/Default/Custom/venta-RDR2.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://www.cdmarket.com.ar/Pubs/Sites/Default/Custom/ps4-edl.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="http://www.cdmarket.com.ar/Pubs/Sites/Default/Custom/odissey-venta.jpg" alt="Third slide">
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
              <div class="product-container">
                <div class="cover">
                  <img src="pics/red2.jpg" alt="">
                  <img id="newitem" src="http://www.stickpng.com/assets/thumbs/5a5a8a2214d8c4188e0b08e4.png" alt="">
                </div>
                <div class="price">
                  $2399
                </div>
                <div class="buynow">
                  <input type="submit" name="buynow" value="COMPRAR AHORA">
                </div>
              </div>
              <div class="product-container">
                <div class="cover">
                  <img src="pics/fifa19.jpg" alt="">
                </div>
                <div class="price">
                  $1999
                </div>
                <div class="buynow">
                  <input type="submit" name="buynow" value="COMPRAR AHORA">
                </div>
              </div>
              <div class="product-container">
                <div class="cover">
                  <img src="pics/titan.jpg" alt="">
                </div>
                <div class="price">
                  $1499
                </div>
                <div class="buynow">
                  <input type="submit" name="buynow" value="COMPRAR AHORA">
                </div>
              </div>
            </div>
          <div class="product-row">
            <div class="product-container">
              <div class="cover">
                <img src="pics/acreed.jpg" alt="">
              </div>
              <div class="price">
                $2399
              </div>
              <div class="buynow">
                <input type="submit" name="buynow" value="COMPRAR AHORA">
              </div>
            </div>
            <div class="product-container">
              <div class="cover">
                <img src="pics/battlefield.jpg" alt="">
              </div>
              <div class="price">
                $2199
              </div>
              <div class="buynow">
                <input type="submit" name="buynow" value="COMPRAR AHORA">
              </div>
            </div>
            <div class="product-container">
              <div class="cover">
                <img src="pics/fallout.jpg" alt="">
              </div>
              <div class="price">
                $1199
              </div>
              <div class="buynow">
                <input type="submit" name="buynow" value="COMPRAR AHORA">
              </div>
            </div>
          </div>
          </div>


          <div class="special">
            <div class="special-img">
              <img src="pics/nswitch.jpg" alt="">
            </div>
            <div class="special-img">
              <img src="pics/funko.jpg" alt="">
            </div>
            <div class="special-img">
              <img src="pics/labo.jpg" alt="">
            </div>
          </div>
          <div class="top-categories">
            <div class="category-img">
              <img src="pics/notebooks.jpg" alt="">
            </div>
            <div class="category-img">
              <img src="pics/edcolecciones.jpg" alt="">
            </div>
            <div class="category-img">
              <img src="pics/binfantiles.jpg" alt="">
            </div>
          </div>
        </section>
        <span class="background"></span>
      </main>

@endsection
