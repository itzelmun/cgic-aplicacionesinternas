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

$id = $_GET['id'];

echo "¡¡¿¿Estás seguro de querer eliminar este usuario??!!";
echo "<br /><a href='baja.php?id=$id'>Sí estoy seguro</a>";
echo "<br /><a href='ver_usuarios.php'>No!!, regresar...</a>";

?>
</body>
</html>