<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$confirm_clave = $_POST['confirm_clave'];

$fecha_alta = date("d/m/Y");

if($nombre==NULL || $apellido==NULL || $usuario==NULL || $clave==NULL || $confirm_clave==NULL){
	echo "Los datos están incompletos....";
	echo "<br /> <a href='form_solicitud.php?nombre=$nombre&apellido=$apellido&usuario=$usuario'> Regresar y completar </a>";
	}elseif($clave != $confirm_clave){
		echo "Las claves no coinciden!!!";
	echo "<br /> <a href='form_solicitud.php?nombre=$nombre&apellido=$apellido&usuario=$usuario'> Regresar y completar </a>";
		}else{
	
	$sql = "INSERT INTO usuarios (nombre, apellido, usuario, clave, tipo, fecha_alta) VALUES ('$nombre', '$apellido', '$usuario', '$clave', 'solicitud', '$fecha_alta')";
	mysqli_set_charset($conexion, "utf8");
	$consulta = mysqli_query($cnx, $sql);
	if($consulta){
		echo "La solicitud fue hecha exitosamente, sólo falta la aprobación del gerente. <br /> Intenta acceder al sistema más tarde.<br /><a href='index.php'>Salir</a>";
		}else{
			die("No se pudo crear la cuenta, el error es: ".mysqli_error($cnx));
			}
	}
?>
</body>
</html>