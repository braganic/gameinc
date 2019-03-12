<?php
if (!session('css')) {
  session(['css' => 'styles.css']);
}

if (isset($_GET['changeCSS'])) {
  if (session('css') == 'styles.css') {
    session(['css' => 'styles2.css']);
  } else {
    session(['css' => 'styles.css']);
  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('titulo')</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Anton|Raleway:400,700|Roboto+Condensed:400,700|Roboto:400,700" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
   <link rel="shortcut icon" type="image/png" href="storage/favicon.ico"/>
   <link rel="stylesheet" href="/css/{{session('css')}}">
   <link rel="stylesheet" href="/css/@yield('css')">
  </head>
  <body>
    <nav class="nav-container">
     <div class="logo">
       <a href="/">GAME<span style="color:#FC1B1A; margin-left:2px">INC</span></a>
     </div>
     <div id="menu1"class="dropdown1">
         {{-- <div class="user" > --}}
           {{-- <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user" ></i></a> --}}
           <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
             <a class="dropdown-item" href="\products">Products</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="\">Home</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="\">About</a>

           {{-- </div> --}}
         </div>
         <a href="#" role="button" id="dropdownText" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>MENU&#9660</strong></a>
       </div>
     </div>
     <div class="searchbar">
       <form action="/search" method="get">
         {{csrf_field()}}
         <input type="text" name="search" value="" id="searchtext" placeholder="Buscá miles de productos...">
         <button type="submit" name="button" id="submit"><i class="fas fa-search"></i></button>
       </form>
     </div>
@if (Auth::check())

        <div class="dropdown2">
            <div class="user" >
              <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="storage/{{Auth::user()->avatar}}"/></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/perfil">Ver Perfil</a>
                <a class="dropdown-item" href="/?changeCSS=true">Cambiar tema</a>
                <div class="dropdown-divider"></div>


                <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>



                <!-- <form method="POST" action="/logout">
                  @csrf
                  <button class="dropdown-item" type="submit">Logout</button>
                </form> -->
              </div>
            </div>
            <a href="#" role="button" id="dropdownText" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hola <strong>{{explode(' ', trim(Auth::user()->name))[0]}}</strong></a>
          </div>
       </div>
@else

<div class="dropdown2">
    <div class="user" >
      <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user" ></i></a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="\login">Login</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="\register">Registro</a>
      </div>
    </div>
    <a href="#" role="button" id="dropdownText" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Cuenta&#9660</strong></a>
  </div>
</div>

       @endif

       <div class="cart">
         <i class="fas fa-shopping-cart" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="/cart">Ver Carrito</a>
        </div>
       </div>
     </div>
 </nav>
<main class="main">
   @yield('principal')
</main>


 <footer>
  <div class="footer-container">
    <div class="footer-column1">
      <div class="social-media">
      <label for=""> Seguinos en <a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-instagram"></i></a></label>
      </div>
    </div>
    <div class="footer-column2">
      <h3> NOSOTROS </h3>
       <ul>
         <li>Quienes Somos</li>
         <li>Contacto</li>
       </ul>
    </div>
    <div class="footer-column3">
      <h3> LEGALES </h3>
       <ul>
         <li>Ayuda</li>
         <li>Politica de Privacidad</li>
         <li>Terminos y condiciones</li>
       </ul>
    </div>
    <div class="footer-column4">
      <h3> COMPRA 100% SEGURA </h3>
       <ul>
        <li>Nuestro sitio posee toda la seguridad que necesitas para realizar tu compra</li>
        <li><i class="fas fa-check-circle"></i><i class="fas fa-user-check"></i></li>
      </ul>
    </div>
  </div>
  <div class="rights">
    <div class="logo">
      <a href="\">GAME<span style="color:#FC1B1A; margin-left:2px">INC</span></a>
    </div>
    <p> ©Todos los derechos reservados. </p>
  </div>
  <span class="background"></span>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="@yield('script')"></script>
  </body>
</html>
