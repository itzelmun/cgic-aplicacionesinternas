<?php

$nombre_host = $_ENV['DB_HOST'];
$usuario_bd = $_ENV['MYSQL_USER'];
$contrasena_bd = $_ENV['MYSQL_PASSWORD'];
$base_datos_nombre = $_ENV['MYSQL_DATABASE'];
$puerto = $_ENV['DB_PORT']; // Asegúrate de definir DB_PORT en tus variables de entorno

$conexion = mysqli_connect($nombre_host, $usuario_bd, $contrasena_bd) or die(mysqli_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al CONECTAR la base de datos.</center>");

mysqli_select_db($base_datos_nombre, $conexion) or die(mysqli_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al SELECCIONAR la base de datos.</center>");


?>

