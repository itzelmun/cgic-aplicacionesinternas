<?php

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function confirmar(){
	if(confirm("Estás seguro??")){
		return true;
		}else{
			return false;
			}
	}
</script>
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

$stipo = $_SESSION['stipo'];

include("conexion.php"); 

switch($_SESSION['stipo']){
	case "gerente": $sql = "SELECT * FROM mensajes ORDER BY id DESC";
		break;
		
	case "subgerente": $sql = "SELECT * FROM mensajes WHERE destinatario='subgerente' OR destinatario='todos' ORDER BY id DESC";
		break;
	
	case "ejecutivo": $sql = "SELECT * FROM mensajes WHERE destinatario='ejecutivo' OR destinatario='todos' ORDER BY id DESC";
		break;
	
	}
$consulta = mysqli_query($cnx, $sql);

$num_reg = mysqli_num_rows($consulta);

if($num_reg == 0){echo "<br /><br />Actualmente no hay ningún mensaje para mostrar...<br /><br />";}

?>

<!--<a href="form_alta.php"> Nuevo Registro </a>
 -->
<!--<table border="0" width="300px"> -->
<!--<tr id="header">
	<td><strong>Id</strong></td>
	<td><strong>Nombre</strong></td>
    <td><strong>Tipo de usuario</strong></td>
    <td><strong>Fecha de alta</strong></td>
    <td><strong>Acciones</strong></td>
</tr> -->

<?php
$i=1;
while($result = mysqli_fetch_array($consulta)){
	$id = $result['id'];
	$remitente = $result['remitente'];
	$remitente = $result['remitente'];
	$destinatario = $result['destinatario'];
	$fecha_envio = $result['fecha_envio'];
	$asunto = $result['asunto'];
	$contenido = $result['contenido'];
	
	$tipo = $result['tipo'];
	
	echo "<table border='0' width='300px'><tr>".
		"<td>".$i." - ".$fecha_envio."<br /><br /><strong>De: </strong>".$remitente."<br /><br /><strong>Asunto: </strong>".$asunto."<br /><br /><strong>Mensaje:</strong><br />".$contenido."</td>".
		"</tr></table><br /><br />";
					
		$i++;
	}
?>

<!--</table> -->
<a href="<? switch($_SESSION['stipo']){
		case "gerente": echo "admin_gerente.php?tipo=$stipo";
			break;
			
		case "subgerente": echo "admin_gerente.php?tipo=$stipo";
			break;
			
		case "ejecutivo": echo "admin_gerente.php?tipo=$stipo";
			break;
	
	} ?>"> Regresar... </a>
</body>
</html>