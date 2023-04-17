<?php

$nombre_host = "ww.ucol.mx";
$usuario_bd = "wcgic";
$contrasena_bd = "4TcCF";
$base_datos_nombre = "cgic";

$conexion = mysql_connect($nombre_host, $usuario_bd, $contrasena_bd) or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al CONECTAR la base de datos.</center>");

mysql_select_db($base_datos_nombre, $conexion) or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al SELECCIONAR la base de datos.</center>");


?>
