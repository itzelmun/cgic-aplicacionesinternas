<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
<h2>Nueva solicitud de usuario</h2>
<a href="index.php">Cancelar</a>

<form action="alta_solicitud.php" method="post">
<table border="0" width="300px">
    <tr>
    <td>Nombre:</td><td><input type="text" name="nombre" /></td>
    </tr>
    <tr>
    <td>Apellidos:</td><td><input type="text" name="apellido" /></td>
    </tr>
    <td>Usuario:</td><td><input type="text" name="usuario" /></td>
    <tr>
    <td>Clave:</td><td><input type="password" name="clave" /></td>
    </tr>
    <tr>
    <td>Confirmar clave:</td><td><input type="password" name="confirm_clave" /></td>
    </tr>
    <tr>
<td></td><td><input type="submit" name="enviar" value="Enviar solicitud" /></td>
</tr>
</table>
</form>
</body>
</html>