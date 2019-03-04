<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Tienda de videojuegos</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Anton|Raleway:400,700|Roboto+Condensed:400,700|Roboto:400,700" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
   <link rel="shortcut icon" type="image/png" href="pics/favicon.ico"/>
   <link rel="stylesheet" href="/css/styles.css">
  </head>
  <body>
    <nav class="nav-container">
     <div class="container-button-hamburgers">
       <button class="hamburger hamburger--collapse" type="button">
         <span class="hamburger-box">
           <span class="hamburger-inner"></span>
         </span>
        </button>
     </div>
     <div class="logo">
       <a href="\index">GAME<span style="color:#FC1B1A; margin-left:2px">INC</span></a>
     </div>
     <div class="searchbar">
       <form action="index.html" method="post">
         <input type="text" name="" value="" id="searchtext" placeholder="Buscá miles de productos...">
         <button type="button" name="button" id="submit"><i class="fas fa-search"></i></button>
       </form>
     </div>

         <div class="dropdown">
             <div class="user" >
               <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user" ></i></a>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                 <a class="dropdown-item" href="\login">Login</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="\register">Registro</a>
               </div>
             </div>
             <a href="#" role="button" id="dropdownText" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ingresar <strong>Cuenta&#9660</strong></a>
           </div>
        </div>

       <div class="cart">
         <i class="fas fa-shopping-cart" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Ver Carrito</a>
        </div>
       </div>
     </div>
 </nav>

 @yield('principal')

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
      <a href="\index">GAME<span style="color:#FC1B1A; margin-left:2px">INC</span></a>
    </div>
    <p> ©Todos los derechos reservados. </p>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('input[type="file"]').change(function(e){
          var fileName = e.target.files[0].name;
          var botonPerfil = document.getElementsByClassName('custom-file-upload')[0];
          botonPerfil.innerHTML = fileName;
          botonPerfil.style.border = "1px solid green";
      });
  });
</script>

  </body>
</html>
