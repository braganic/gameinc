<?php
require_once("funciones.php");

	$errores = [];
	$nombreDefault = " ";

	if ( $_POST ) {

		$errores = validarLogin();

		if (count($errores) == 0) {
		 $_SESSION["usuariologueado"] = $_POST["nombre"];

			header("location:inicio.php");exit;
		}

		$nombreDefault = $_POST["nombre"];

	}

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
    <main class="main-login">
      <section class="main">
        <span class="background-login"></span>
        <div class="login-box">
          <div class="logo" id= "login-logo">
            <a class="logo-login" href="index.html">GAME<span style="color:#FC1B1A; margin-left:2px">INC</span></a>
          </div>
          <form class="" action="login.php" method="POST">
            <!--user name  -->
            <label for="nombre"></label>
            <?php if (isset($errores["nombre"])) :?>
              <input style= "border: 1px solid red ;" type="text" name="nombre" value=" " placeholder="Usuario"/>
              <p style= "color:red; font-size: 8px;">
                <?=$errores["nombre"]?>
              </p>
            <?php else : ?>
              <input type="text" name="nombre" value="<?=$nombreDefault?>" placeholder="Usuario"/>
            <?php endif ; ?>
            <!--password  -->
            <label for="password"></label>
            <?php if (isset($errores["password"])) :?>
             <input style="border: 1px solid red;" type="password" name="password" value="" placeholder="Contraseña"/>
               <p style="color:red ;font-size:8px;">
                  <?=$errores["password"]?>
                </p>
            <?php else : ?>
              <input type="password" name="password" value="" placeholder="Contraseña"/>
            <?php endif ; ?>

            <input class="log-boton"type="submit" value="LOGIN">
            <a class="text" href="#">Olvidaste tu contraseña?</a><br>
            <a class="text"href="register.php">Registrarme</a>

          </form>
        </div>
      </section>
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
