<?php

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<h1>Administración para Gerentes</h1>

<strong>Nombre: </strong><?=$_SESSION['snombre_completo']?><br />
<strong>Tipo de usuario: </strong><?=$_SESSION['stipo']?><br />
<a href='salir.php'>Cerrar sesión...</a><br />

<?php
include("conexion.php");
$id = $_GET['id'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$tipo = $_POST['tipo'];
$fecha_alta = $_POST['fecha_alta'];

if($nombre==NULL || $apellido==NULL || $usuario==NULL || $clave==NULL || $tipo==NULL || $fecha_alta==NULL){
	echo "Los datos están incompletos....";
	echo "<br /> <a href='form_modificar.php?b&id=$id&nombre=$nombre&apellido=$apellido&usuario=$usuario&clave=$tipo&fecha_alta=$fecha_alta'> Regresar y completar </a>";
	}else{

		$sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', usuario='$usuario', clave='$clave', tipo='$tipo' WHERE id=$id";
		$consulta = mysqli_query($cnx, $sql);
		if($consulta){
			echo "El usuario ha sido actualizado con éxito...";
			echo "<a href='ver_usuarios.php'> Regresar </a>";
			}else{
				die("Ocurrió algún error al intentar actualizar el registro, el error es: ".mysqli_error($cnx));
				}
}
?>
</body>
</html>