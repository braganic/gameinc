<?php
session_start();

if (isset($_COOKIE["usuarioLogueado"]) && isset($_SESSION["usuarioLogueado"]) == false) {
  $_SESSION["usuarioLogueado"] = $_COOKIE["usuarioLogueado"];
}

function validarLogin() {
  $errores = [];

  if (estaVacio($_POST["email"])) {
    $errores["email"] = "Por favor complete su usuario";
  } else if (!existeElEmail($_POST["email"])) {
    $errores["email"] = "El usuario no existe. Registrate ";
  }

  if (estaVacio($_POST["password"])) {
    $errores["password"] = "Dejaste la contrasenia vacia";
  }

  if (empty($errores)) {
    $usuario = buscarUsuarioPorEmail($_POST["email"]);

    $hash = $usuario["password"];

    if (password_verify($_POST["password"], $hash) == false) {
      $errores["email"] = "El email y la contrasenia no verifican";
    }
  }

  return $errores;
}

function existeElEmail($email) {
	if (buscarUsuarioPorEmail($email) != null) {
		return true;
	} else {
		return false;
	}
}

function traerUsuarios() {

	$archivo = file_get_contents("usuarios.json");

	if ($archivo === "") {
		return [];
	}

	return json_decode($archivo, true);
}

function buscarUsuarioPorEmail($email) {
	$usuarios = traerUsuarios();

	foreach ($usuarios as $usuario) {
		if ($email == $usuario["email"]) {
			return $usuario;
		}
	}
	return null;
}

function traerNombreUsuario() {
  return explode(' ',trim(buscarUsuarioPorEmail($_SESSION["usuarioLogueado"])["nombre"]))[0];
}

function armarUsuario() {
	return [
		"id" => traerProximoId(),
		"nombre" => ucfirst($_POST["nombre"]),
		"email" => $_POST["email"],
		"password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
    "genero" => $_POST["gender"],
    "perfil" => $_POST["email"] . "." . pathinfo($_FILES["perfil"]["name"], PATHINFO_EXTENSION)
	];
}

function guardarUsuario($usuario) {
	$usuarios = traerUsuarios();

	$usuarios[] = $usuario;

	$json = json_encode($usuarios);

	file_put_contents("usuarios.json", $json);
}


function estaVacio($campo) {
  if ($campo == "") {
    return true;
  } else {
    return false;
  }
}

function esAlfabeticoYMinimoCaracteres($campo, $nombreCampo, $min) {
  $rex = '/^[a-zA-Z][a-zA-Z ]*$/';
  if (estaVacio($campo)) {
    return "Se dejo el $nombreCampo vacio";
  } else if (strlen($campo) < $min) {
    return "El $nombreCampo debe tener un minimo de $min caracteres";
  } else if (preg_match($rex, $campo) == 0) {
    return "El $nombreCampo debe ser alfabetico";
  } else {
    return null;
  }
}

function traerProximoId() {
  $usuarios = traerUsuarios();

  if ($usuarios == []) {
    return 1;
  }
  $ultimoUsuario = end($usuarios);
  return $ultimoUsuario["id"] + 1;
}



function validarRegistracion() {
  $errores = [];

  $errorEnNombre = esAlfabeticoYMinimoCaracteres($_POST["nombre"], "nombre", 3);
  if ($errorEnNombre != null) {
    $errores["nombre"] = $errorEnNombre;
  }

  if (estaVacio($_POST["password"])) {
    $errores["password"] = "No se introdujo ninguna contraseña";
  }
  if (estaVacio($_POST["cpassword"])) {
    $errores["cpassword"] = "Se dejo el campo confirmar contraseña vacio";
  }
  if (!estaVacio($_POST["password"]) && !estaVacio($_POST["cpassword"]) && $_POST["password"] != $_POST["cpassword"]) {
    $errores["password"] = "Las contraseñas no coinciden";
  }

  if (estaVacio($_POST["email"])) {
    $errores["email"] = "No se introdujo ningun email";
  } else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
    $errores["email"] = "El email debe ser una casilla valida";
  }
  if (buscarUsuarioPorEmail($_POST["email"]) != null) {
    $errores["email"] = "El email ya fue utilizado.";
  }
//VALIDAR ARCHIVO
  if($_FILES == false) {
    $errores["perfil"] = "No has subido una imagen de perfil.";
  } else if ($_FILES["perfil"]["error"] == 0){
    if ($_FILES["perfil"]["type"] != "image/jpeg" && $_FILES["perfil"]["type"] != "image/jpg" && $_FILES["perfil"]["type"] != "image/png") {
      $errores["perfil"] = "La imagen debe ser formato jpg, jpeg o png.";
    }
  } else {
    $errores["perfil"] = "Ha ocurrido un error en la subida del archivo";
  }

  if (isset($_POST["acepto"]) == false) {
  $errores["acepto"] = "No se aceptaron los terminos y condiciones";
}

  return $errores;
}

function estaLogueado() {
  return isset($_SESSION["usuarioLogueado"]);
}

function bienvenida() {
    $generoUsuario = buscarUsuarioPorEmail($_SESSION["usuarioLogueado"])["genero"];
    return $generoUsuario == "femenino" ? "Bienvenida" : "Bienvenido";
}

 ?>
