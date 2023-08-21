<?php

$nombre_host = $_ENV['DB_HOST'];
$usuario_bd = $_ENV['MYSQL_USER'];
$contrasena_bd = $_ENV['MYSQL_ROOT_PASSWORD'];
$base_datos_nombre = $_ENV['MYSQL_DATABASE'];
$puerto = $_ENV['DB_PORT']; // Asegúrate de definir DB_PORT en tus variables de entorno


$conexion = mysqli_connect($nombre_host, $usuario_bd, $contrasena_bd);

if (!$conexion) {
    die("Error de conexión: Ha ocurrido un error al CONECTAR la base de datos" . mysqli_error());
}

if (!mysqli_select_db($conexion, $base_datos_nombre)) {
    die("Error al seleccionar la base de datos: " . mysqli_error($conexion));
}



?>

