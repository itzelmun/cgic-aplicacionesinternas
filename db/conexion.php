<?php

$nombre_host = $_ENV['DB_HOST'];
$usuario_bd = $_ENV['DB_USER'];
$contrasena_bd = $_ENV['DB_PASS'];
$base_datos_nombre = $_ENV['DB_NAME'];

$conexion = mysql_connect($nombre_host, $usuario_bd, $contrasena_bd, $base_datos_nombre) or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al CONECTAR la base de datos.</center>");

mysql_select_db($base_datos_nombre, $conexion) or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al SELECCIONAR la base de datos.</center>");


?>
