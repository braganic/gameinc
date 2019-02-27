<?php
  require_once("funciones.php");

  if (estaLogueado()) {
      $nombreUsuario = traerNombreUsuario();
      $rutaImagen = "data/users/profile/" . buscarUsuarioPorEmail($_SESSION["usuarioLogueado"])["perfil"];
      $bienvenida = bienvenida();
  }

 ?>

 <nav class="nav-container">
     <div class="container-button-hamburgers">
       <button class="hamburger hamburger--collapse" type="button">
         <span class="hamburger-box">
           <span class="hamburger-inner"></span>
         </span>
        </button>
     </div>
     <div class="logo">
       <a href="index.php">GAME<span style="color:#FC1B1A; margin-left:2px">INC</span></a>
     </div>
     <div class="searchbar">
       <form action="index.html" method="post">
         <input type="text" name="" value="" id="searchtext" placeholder="Buscá miles de productos...">
         <button type="button" name="button" id="submit"><i class="fas fa-search"></i></button>
       </form>
     </div>
     <?php if (estaLogueado()) : ?>
         <div class="dropdown">
             <div class="user" >
               <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=$rutaImagen?>"/></a>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                 <a class="dropdown-item" href="perfil.php">Ver Perfil</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="logout.php">Logout</a>
               </div>
             </div>
             <a href="#" role="button" id="dropdownText" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$bienvenida?> <strong><?=$nombreUsuario?></strong></a>
           </div>
        </div>
     <?php else: ?>
         <div class="dropdown">
             <div class="user" >
               <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user" ></i></a>
               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                 <a class="dropdown-item" href="login.php">Login</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="register.php">Registro</a>
               </div>
             </div>
             <a href="#" role="button" id="dropdownText" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ingresar <strong>Cuenta&#9660</strong></a>
           </div>
        </div>
  <?php endif; ?>
       <div class="cart">
         <i class="fas fa-shopping-cart" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Ver Carrito</a>
        </div>
       </div>
     </div>
 </nav>
