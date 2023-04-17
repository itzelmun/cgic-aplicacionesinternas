<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> 
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

$sql = "SELECT rec_tec FROM ptcs WHERE id='$id'";
$consulta = mysql_query($sql);
$result = mysql_fetch_array($consulta);
	$prod = $result['rec_tec'];
	$prod = utf8_encode($prod);

?>



<form name="form" action="update_rec_tec.php?id=<?=$id?>" method="post">
	<textarea name="produccion" cols="150" rows="40">
<?=trim($prod)?></textarea>
    <input type="submit" name="enviar" value="modificar..." />
</form>
</body>
</html>