<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php

$nombre_host = "localhost";
$usuario_bd = "root";
$contrasena_bd = "root";
$base_datos_nombre = "cgic";

$conexion = mysql_connect($nombre_host, $usuario_bd, $contrasena_bd) or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al CONECTAR la base de datos.</center>");

mysql_select_db($base_datos_nombre, $conexion) or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al SELECCIONAR la base de datos.</center>");

$id = $_GET['id'];
$produccion = utf8_decode($_POST['produccion']);


$sql = "UPDATE ptcs SET produccion_cient='$produccion' WHERE id=$id";

if(mysql_query($sql)){
		echo "La producción científica se ha actualizado exitosamente";
		echo "<br /><br /><a href='index.php'> Regresar a principal... </a>";
	}else{
			echo "Hubo algún error al intentar actualizar la producción científica, el error es: ".mysql_error();
			echo "<br /><br /><a href='index.php'> Regresar a principal... </a>";
		}

?>

</body>
</html>