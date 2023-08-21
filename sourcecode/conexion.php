<?php

$nombre_host = getenv['MYSQL_HOST'];
$usuario_bd = getenv['MYSQL_USER'];
$contrasena_bd =getenv['MYSQL_PASSWORD'];
$base_datos_nombre = getenv['MYSQL_DATABASE'];


$conexion = mysqli_connect($nombre_host, $usuario_bd, $contrasena_bd, $base_datos_nombre);

if (!$conexion) {
    die("Error de conexión: Ha ocurrido un error al CONECTAR la base de datos" . mysqli_error());
}

if (!mysqli_select_db($conexion, $base_datos_nombre)) {
    die("Error al seleccionar la base de datos: " . mysqli_error($conexion));
}



?>

