<?php

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

 ?>
