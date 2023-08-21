<?php
$nombre_host = 'localhost';
$usuario_bd = 'wcgic';
$contrasena_bd ='4TcCF';
$base_datos_nombre = 'cgic';

$conexion = mysqli_connect($nombre_host, $usuario_bd, $contrasena_bd, $base_datos_nombre);

if (!$conexion) {
    die("Error de conexión: Ha ocurrido un error al CONECTAR la base de datos" . mysqli_error());
}

if (!mysqli_select_db($conexion, $base_datos_nombre)) {
    die("Error al seleccionar la base de datos: " . mysqli_error($conexion));
}
?>

