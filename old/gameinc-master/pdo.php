<?php
$dsn = "mysql:dbname=pdo;host=127.0.0.1;port=3306";
$usuario = "root";
$pass = "";

try {
  $db = new PDO($dsn, $usuario, $pass);
  $db -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (\Exception $e) {
  echo "Error!";exit;
}

?>
