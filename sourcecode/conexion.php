<?php

$nombre_host = $_ENV['DB_HOST'];
$usuario_bd = $_ENV['MYSQL_USER'];
$contrasena_bd = $_ENV['MYSQL_PASSWORD'];
$base_datos_nombre = $_ENV['MYSQL_DATABASE'];
$puerto = $_ENV['DB_PORT']; // Asegúrate de definir DB_PORT en tus variables de entorno

$conexion = new mysqli($nombre_host, $usuario_bd, $contrasena_bd, $base_datos_nombre, $puerto);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// No es necesario realizar el select_db ya que se especifica en la conexión

?>
