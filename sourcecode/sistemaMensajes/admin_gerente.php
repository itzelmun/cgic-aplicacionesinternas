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

<? switch($_SESSION['stipo']){
		case "gerente": echo "<h1>Administración para Gerentes</h1>";
			break;
		case "subjerente": echo "<h1>Administración para Subgerentes</h1>";
			break;
		case "ejecutivo": echo "<h1>Administración para Ejecutivos</h1>";
			break;
 } ?>

<strong>Nombre: </strong><?=$_SESSION['snombre_completo']?><br />
<strong>Tipo de usuario: </strong><?=$_SESSION['stipo']?><br />
<a href='salir.php'>Cerrar sesión...</a><br />

<?php
include("conexion.php");

//hago la consulta a la BD para saber el número de solicitudes pendientes de aprobación
$sql = "SELECT * FROM usuarios WHERE tipo='solicitud'";
mysqli_set_charset($conexion, "utf8");
$consulta = mysqli_query($cnx, $sql);

$result = mysqli_fetch_array($consulta);
$num_reg = mysqli_num_rows($consulta); // número de registros encontrados
?>

<? if($_SESSION['stipo'] == "gerente"){ ?>
<p>Solicitudes pendientes de aprobación: <a href="aprobar_solicitudes.php"><?=$num_reg?></a></p>

<p><a href="ver_usuarios.php">Ver usuarios registrados</a></p>
<? }

	if($_SESSION['stipo'] == "gerente" || $_SESSION['stipo'] == "subgerente" || $_SESSION['stipo'] == "ejecutivo"){ ?>

<p><a href="ver_mensajes.php?tipo=<?=$_SESSION['stipo']?>">Ver mensajes</a></p>

<p><a href="redactar.php?tipo=<?=$_SESSION['stipo']?>">Redactar mensaje nuevo</a></p>

<? } ?>


</body>
</html>