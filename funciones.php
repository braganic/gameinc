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

function validarRegistro() {
  $erroresRegistro = [];
  $erroresRegistro[] = validarNombre();
  $erroresRegistro[] = validarEmail();
  $erroresRegistro[] = validarPassword();
  $erroresRegistro[] = validarTerminos();
  return $erroresRegistro;
}

function validarNombre() {
  if (strlen($_POST["name"]) == 0) {
    return $erroresRegistro["name"][] = "Este campo está vacío.";
  } elseif (strlen($_POST["name"]) < 3) {
    return $erroresRegistro["name"][] = "El nombre debe contener al menos tres letras.";
  }
  return $erroresRegistro;
}

function validarEmail() {
  if (strlen($_POST["email"]) == 0) {
    $erroresRegistro["email"][] = "Este campo está vacío.";
  } elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
    $erroresRegistro["email"][] = "El formato del email no es válido.";
  } else if (existeElEmail($_POST["email"])) {
    $erroresRegistro["email"][] = "Ya existe un usuario con este email.";
  }
  return $erroresRegistro;
}

function validarPassword() {
  if (strlen($_POST["password"]) == 0) {
    $erroresRegistro["password"][] = "Este campo está vacío.";
  } elseif (strlen($_POST["password"]) < 8) {
    return $erroresRegistro["password"][] = "El nombre debe contener al menos ocho caracteres.";
  } else if ($_POST["password"]) {
    $erroresRegistro["password"][] = "El password debe contener al menos una letra, un número y un caracter especial.";
  }
  return $erroresRegistro;
}

function validarTerminos() {
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
		"nombre" => ucfirst($_POST["name"]),
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

  if (isset($_POST["acepto"]) == false) {
  $errores["acepto"] = "No se aceptaron los terminos y condiciones";
}

  return $errores;
}

 ?>