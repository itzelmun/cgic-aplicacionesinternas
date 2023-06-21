<?php

$nombre_host = $_ENV['DB_HOST'];
$usuario_bd = $_ENV['MYSQL_USER'];
$contrasena_bd = $_ENV['MYSQL_PASSWORD'];
$base_datos_nombre = $_ENV['MYSQL_DATABASE'];

$conexion = mysqli_connect($nombre_host, $usuario_bd, $contrasena_bd) or die(mysqli_error($conexion)."<br/><br/><br/><center>");
mysqli_select_db($conexion, $base_datos_nombre) or die(mysqli_error($conexion)."<br/><br/><br/><center>ERROR: Ha ocurrido un problema al seleccionar la base de datos.</center>");

?>
