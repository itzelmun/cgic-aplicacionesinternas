<?php
$nombre_host =getenv('MYSQL_HOST');
$usuario_bd = getenv('MYSQL_USER');
$contrasena_bd =getenv('MYSQL_PASSWORD');
$base_datos_nombre = getenv('MYSQL_DATABASE');

$conexion = mysqli_connect($nombre_host, $usuario_bd, $contrasena_bd, $base_datos_nombre);


?>

