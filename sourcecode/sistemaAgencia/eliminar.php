<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Documento sin título</title>
</head>

<body>
<center>
<?php
include "conexion.php";

	$id = $_GET['id'];
	
	$sql = "DELETE FROM auto WHERE id = $id";
	mysqli_set_charset($conexion, "utf8");

	$consulta = mysqli_query($cnx, $sql);
	if($consulta){
		echo "<h2>El registro fue eliminado exitosamente!!!</h2>";
		echo "<a href='index.php'>Regresar...</a>";
	}else{
		echo "<h2>Error al eliminar el registro</h2> Error: ".mysqli_error($cnx);
	}

?>
</center>
</body>
</html>