<?php
session_start();

function validarLogin() {
  $errores = [];

  if (estaVacio($_POST["nombre"])) {
    $errores["nombre"] = "Por favor complete su usuario";
  } else if (!existeElusuario($_POST["nombre"])) {
    $errores["nombre"] = "El usuario no existe. Registrate ";
  }

  if (estaVacio($_POST["password"])) {
    $errores["password"] = "Dejaste la contrasenia vacia";
  }

  if (empty($errores)) {
    $usuario = buscarUsuarioPornombre($_POST["nombre"]);

    $hash = $usuario["password"];

    if (password_verify($_POST["password"], $hash) == false) {
      $errores["nombre"] = "El username y la contrasenia no verifican";
    }
  }

  return $errores;
}

function existeElusuario($nombre) {
  if (buscarUsuarioPornombre($nombre) === null) {
    return false;
  } else {
    return true;
  }
}
function buscarUsuarioPornombre($nombre) {
  $usuarios = traerUsuarios();

  foreach ($usuarios as $usuario) {
    if ($usuario["nombre"] == $nombre) {
      return $usuario;
    }
  }
    return null;
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

function armarUsuario() {
	return [
		"id" => "1",
		"nombre" => ucfirst($_POST["nombre"]),
		"edad" => 23,
		"email" => $_POST["email"],
		"password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
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
//VALIDAR ARCHIVO
  if($_FILES == false) {
    $errores["perfil"] = "No has subido una imagen de perfil.";
  } else if ($_FILES["perfil"]["error"] == 0){
    if ($_FILES["perfil"]["type"] == "image/jpeg" || $_FILES["perfil"]["type"] == "image/jpg" || $_FILES["perfil"]["type"] == "image/png") {
      return null;
    } else {
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

 ?>
