<?php

$nombre_host = $_ENV['DB_HOST'];
$usuario_bd = $_ENV['MYSQL_USER'];
$contrasena_bd = $_ENV['MYSQL_PASSWORD'];
$base_datos_nombre = $_ENV['MYSQL_DATABASE'];

$conexion = new mysqli($nombre_host, $usuario_bd, $contrasena_bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (!$conexion->select_db($base_datos_nombre)) {
    die("Error al seleccionar la base de datos: " . $conexion->error);
}
?>
