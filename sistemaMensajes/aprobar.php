<?php

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
</head>

<body>

<h1>Administración para Gerentes</h1>

<strong>Nombre: </strong><?=$_SESSION['snombre_completo']?><br />
<strong>Tipo de usuario: </strong><?=$_SESSION['stipo']?><br />
<a href='salir.php'>Cerrar sesión...</a><br />

<br />
<br />

<?php

include("conexion.php");

$id = $_GET['id'];
$tipo = $_POST['tipo'];

$fecha_alta = date("d/m/Y");

$sql = "UPDATE usuarios SET tipo='$tipo',fecha_alta='$fecha_alta' WHERE id='$id'";
		
	if(mysqli_query($cnx, $sql)){
		echo "La solicitud fue aprobada exitosamente. <br /><a href='aprobar_solicitudes.php'>Regresar</a>";
		}else{
			die("No se pudo aprobar la solicitud, el error es: ".mysqli_error($cnx));
			}
	
?>
</body>
</html>