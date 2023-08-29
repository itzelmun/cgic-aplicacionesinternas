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

$sql = "DELETE FROM usuarios WHERE id=$id";
mysqli_set_charset($conexion, "utf8");
$consulta = mysqli_query($cnx, $sql);
if($consulta){
	echo "El usuario ha sido eliminado exitosamente....";
	echo "<br /><a href='admin_gerente.php'> Regresar </a>";
	}else{
		die("Ocurrió algún error al intentar borrar el registro, el error es: ".mysqli_error($cnx));
		}

?>
</body>
</html>