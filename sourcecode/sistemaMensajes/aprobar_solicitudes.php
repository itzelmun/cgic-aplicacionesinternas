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

<h1>Administración para Gerentes</h1>

<strong>Nombre: </strong><?=$_SESSION['snombre_completo']?><br />
<strong>Tipo de usuario: </strong><?=$_SESSION['stipo']?><br />
<a href='salir.php'>Cerrar sesión...</a><br />

<?php
include("conexion.php"); 

$sql = "SELECT * FROM usuarios WHERE tipo='solicitud'";
$consulta = mysqli_query($cnx, $sql);

?>

<!--<a href="form_alta.php"> Nuevo Registro </a>
 -->
<table border="1" width="600px">
<tr id="header">
	<td><strong>Id</strong></td>
	<td><strong>Nombre</strong></td>
    <td><strong>Fecha de solicitud</strong></td>
    <td><strong>Tipo de usuario</strong></td>
    <td><strong>Acciones</strong></td>
</tr>

<?php
$i=1;
while($result = mysqli_fetch_array($consulta)){
	$id = $result['id'];
	$nombre = $result['nombre'];
	$apellido = $result['apellido'];
	$fecha_alta = $result['fecha_alta'];
	
	echo "<tr>".
		"<td>".$i."</td>".
		"<td>".$nombre." ".$apellido."</td>".
		"<td>".$fecha_alta."</td>".
		"<td>"; ?> <form name="form_tipo" method="post" action="aprobar.php?id=<?=$id?>"><select name="tipo">
        			<option value="elije...">elije...</option>
                    <option value="subgerente">subgerente</option>
                    <option value="ejecutivo">ejecutivo</option>
                   </select></form> <? echo "</td>".
		"<td> <a href='javascript:document.form_tipo.submit();' > aprobar </a> <br /> <a href='rechazar.php?id=$id'> rechazar </a> </td>".
		"</tr>";
		
		$i++;
	}
?>

</table>
<a href="admin_gerente.php"> regresar </a>
</body>
</html>