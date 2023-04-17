<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Documento sin título</title>
</head>

<body>
<center>
<?php
include "conexion.php"; //incluir la conexion
	//recibir los datos del formulario
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$ano = $_POST['ano'];
	$tipo = $_POST['tipo'];
	$color = $_POST['color'];
	$pais = $_POST['pais'];
		$eqQuema = ($_POST['quemacocos'] == true) ? 1 : 0;
		$eqFaros = ($_POST['faros'] == true) ? 1 : 0;
		$eqRines = ($_POST['rines'] == true) ? 1 : 0;
	$comentarios = $_POST['comentarios'];
	
//definir la consulta SQL	
$sql = "INSERT INTO auto (marca, modelo, ano, tipo, color, pais, eqQuema, eqFaros, eqRines, comentarios) VALUES ('$marca', '$modelo', $ano, '$tipo', '$color', '$pais', $eqQuema, $eqFaros, $eqRines, '$comentarios')";
//ejecutar la consulta
$consulta = mysqli_query($cnx, $sql);

if($consulta){//verificar si no hubo problemas
	echo "<h2>El registro fue insertado exitosamente</h2>";
}else{
	echo "<h2>Error al insertar el registro</h2> Error: ".mysqli_error($cnx);
}
?>
<a href="index.php">Regresar</a>
</center>
</body>
</html>