<?php
  require_once("funciones.php");
  $title = "Perfil";

  if (!estaLogueado()) {
  	header("location: index.php");exit;
  }

  $nombreUsuario = traerNombreUsuario();


 ?>

 <!DOCTYPE html>
 <html>
   <head>
 		<?php
 			require_once("components/head.php");
 			?>
   </head>
   <body>
     <header>
 			<?php
         require_once("components/header.php");
         ?>
     </header>
     <main class="main-perfil">
       <h1>Bienvenido a tu perfil, <?=$nombreUsuario?>.</h1>
     </main>
 		<?php
       require_once("components/footer.php");
 		 ?>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </body>
   </body>
 </html>
