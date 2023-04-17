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

 <h3>Redactar mensaje nuevo</h3>
 
 <a href='admin_gerente.php?tipo=<?=$_SESSION['stipo']?>'>Regresar</a>
 <br />
 <br />
 
<form action="alta_redactar.php" method="post">
<table border="0" width="300px">
    <tr>
    	<td>Enviar a:</td><td> 
      <select name="destinatario">
      	<option value="elije">Elije...</option>
      	<option value="ejecutivo">Ejecutivos</option>
      	<option value="subgerente">Subgerentes</option>
      	<option value="gerente">Gerentes</option>
      	<option value="todos">A todos</option>
      </select></td>
    </tr>
    <tr>
    	<td>Asunto:</td><td><input type="text" name="asunto" /></td>
    </tr>
    <tr>
    	<td>Mensaje:</td><td><textarea name="contenido"></textarea></td>
    </tr>
    <tr>
		<td></td><td><input type="submit" name="enviar" value="Enviar mensaje" /></td></tr>
</table>
</form>
</body>
</html>