<?php

$nombre_host = $_ENV['DB_HOST'];
$usuario_bd = $_ENV['DB_USER'];
$contrasena_bd = $_ENV['DB_PASS'];
$base_datos_nombre = $_ENV['DB_NAME'];

//$maxUploadSize = $_ENV['UPLOAD_MAX_FILESIZE'];
//echo "El tamaño máximo de carga permitido es: " . $maxUploadSize;

$conexion = mysqli_connect($nombre_host, $usuario_bd, $contrasena_bd) or die(mysql_error()."<br/><br/><br/><ce$

mysql_select_db($base_datos_nombre, $conexion) or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrid$


?>
