<?php

require_once("funciones.php");

if (estaLogueado()) {
	header("location: index.php");exit;
}

	$title = "Registro";
	$errores = [];
	$errores["acepto"] = "";
	$nombreDefault = "";
	$emailDefault = "";


  if ( $_POST ) {
		$errores = validarRegistracion();
		//Si no hay errores en la registración
    if ( count($errores) == 0 ) {
			//Registro usuario
			$nuevoUsuario = armarUsuario();
			$guardar = guardarUsuario($nuevoUsuario);
			//Guardo la foto
			$ext = pathinfo($_FILES["perfil"]["name"], PATHINFO_EXTENSION);
			move_uploaded_file($_FILES["perfil"]["tmp_name"], "data/users/profile/" . trim($_POST["email"]) . "." . $ext);
			//Guardo en session
			$_SESSION["usuarioLogueado"] = $_POST["email"];
			//Redirijo
    	header("location: index.php");exit;
  	}

	  $nombreDefault = $_POST["nombre"];
	  $emailDefault = $_POST["email"];
	}

?>

<!DOCTYPE html>
<html>
<!-- hola -->
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
    <main class="mainregister">
      <section class="main-register">

      <form action="register.php" method="post" class="register" enctype="multipart/form-data">
          <div class="logo" id="form-logo">
            <a href="#">GAME<span style="color:#FC1B1A; margin-left:2px">INC</span></a>
          </div>

        	<div class="form-items">
             <?php if (isset($errores["nombre"])) : ?>
	   				  <input style="border: 1px solid red;" class="name" type="text" name="nombre" value="" placeholder="Nombre">
							<p style="color:orange;font-size:12px;">
								<?=$errores["nombre"]?>
							</p>
						<?php else : ?>
							<input class="name" type="text" name="nombre" value="<?=$nombreDefault?>" placeholder="Nombre">
							<p>&nbsp;</p>
						<?php endif; ?>
          </div>
          <div class="form-items">
            <?php if (isset($errores["email"])) : ?>
							<input id="register-email" style="border: 1px solid red;" type="email" name="email" value="" placeholder="Email">
							<p style="color:orange; font-size: 12px">
                <?=$errores["email"]?>
							</p>
            <?php else : ?>
							<input id="register-email"type="email" name="email" value="<?=$emailDefault?>" placeholder="Email">
							<p>&nbsp;</p>
						<?php endif; ?>
					</div>
          <div class="form-items">
             <?php if (isset($errores["password"])) : ?>
							<input id="register-password" style="border: 1px solid red;" type="password" name="password" value=""placeholder="Contraseña">
              <p style="color:orange; font-size: 12px">
                <?=$errores["password"]?>
							</p>
						<?php else : ?>
							<input id="register-password"type="password" name="password" value="" placeholder="Contraseña">
							<p>&nbsp;</p>
						<?php endif; ?>
					</div>
          <div class="form-items">
             <?php if (isset($errores["cpassword"])) : ?>
							<input style="border: 1px solid red;" type="password" name="cpassword" value=""placeholder="Repita su Contraseña">
							<p style="color:orange; font-size: 12px">
                <?=$errores["cpassword"]?>
							</p>
						<?php else : ?>
							<input type="password" name="cpassword" value=""placeholder="Repita su Contraseña">
							<p>&nbsp;</p>
            <?php endif; ?>
          </div>

					<div class="form-items-profile">
						<label for="file-upload" class="custom-file-upload" name="perfil" value="perfil">Subir foto de perfil</label>
						<input id="file-upload" type="file" name="perfil"/>
						<?php if (isset($errores["perfil"])) : ?>
						<p style="color:orange; font-size: 12px">
							<?=$errores["perfil"]?>
						</p>
					<?php else : ?>
						<p>&nbsp;</p>
					<?php endif; ?>
					</div>

					<div class="form-items gender">
						<!-- <label for="gender">Genero: &nbsp;</label> -->
						<input type="radio" name="gender" value="masculino" checked> Masculino
						<input type="radio" name="gender" value="femenino"> Femenino
					</div>
<br>
          <div class="form-items-agree">
              <label for="agree">Acepto los terminos y condiciones</label>
             <?php if (isset($_POST["acepto"])) : ?>
             	<input type="checkbox" name="acepto" value="" checked>
							<p></p>
						<?php else : ?>
							<input type="checkbox" name="acepto" value="">
							<p style="color: orange; font-size: 12px">
                <?=$errores["acepto"]?>
							</p>
						<?php endif; ?>
          </div>
              <input class="form-items"id="register-submit"type="submit" name="submit" value="REGISTRATE">
      </section>

      <span class="background-login"></span>
    </main>

    <?php
      require_once("components/footer.php");
		 ?>
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
  </body>
</html>
