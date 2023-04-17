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
<br />
<a href='salir.php'>Cerrar sesión...</a><br />
<br />
<br />
<?php

include("conexion.php");

$destinatario = $_POST['destinatario'];
$asunto = $_POST['asunto'];
$contenido = $_POST['contenido'];

$fecha_alta = date("d/m/Y");

$tipo = $_SESSION['stipo'];

if($destinatario=="elije" || $asunto==NULL || $contenido==NULL){
	echo "Los datos del mensaje están incompletos....";
	echo "<br /> <a href='redactar.php?nombre=$nombre&apellido=$apellido&usuario=$usuario'> Regresar y completar </a>";
	}else{
	
	$sql = "INSERT INTO mensajes (remitente, destinatario, fecha_envio, asunto, contenido) VALUES ('$tipo', '$destinatario', '$fecha_alta', '$asunto', '$contenido')";
	$consulta = mysqli_query($cnx, $sql);
	if($consulta){
		echo "El mensaje ha sido enviado exitosamente. <br /><a href='admin_gerente.php?tipo=$tipo'>Regresar</a>";
		}else{
			die("No se pudo crear la cuenta, el error es: ".mysqli_error($cnx));
			}
	}
?>
</body>
</html>