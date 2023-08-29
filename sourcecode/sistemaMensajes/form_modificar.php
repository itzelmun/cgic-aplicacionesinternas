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
<br />
<br />
<a href='ver_usuarios.php'>Cancelar</a><br />
<?php

include("conexion.php");

$id = $_GET['id'];

if(!isset($_GET['b'])){

$sql = "SELECT * FROM usuarios WHERE id=$id";
mysqli_set_charset($conexion, "utf8");
$consulta = mysqli_query($cnx, $sql);

$result = mysqli_fetch_array($consulta);
	$id = $result['id'];
	$nombre = $result['nombre'];
	$apellido = $result['apellido'];
	$usuario = $result['usuario'];
	$clave = $result['clave'];
	$tipo = $result['tipo'];
	$fecha_alta = $result['fecha_alta'];

}
?>
<form action="modificar.php?<? echo "id=$id"; ?>" method="post">
Nombre: <input type="text" name="nombre" value="<? if(isset($_GET['nombre'])){echo $_GET['nombre'];}else{echo $nombre;}?>" /> <br />
Apellido: <input type="text" name="apellido" value="<? if(isset($_GET['apellido'])){echo $_GET['apellido'];}else{echo $apellido;}?>" /> <br />
Usuario: <input type="text" name="usuario" value="<? if(isset($_GET['usuario'])){echo $_GET['usuario'];}else{echo $usuario;}?>" /> <br />
Clave: <input type="text" name="clave" value="<? if(isset($_GET['clave'])){echo $_GET['clave'];}else{echo $clave;}?>" /> <br />
Tipo de usuario: <input type="text" name="tipo" value="<? if(isset($_GET['tipo'])){echo $_GET['tipo'];}else{echo $tipo;}?>" /> <br />
Fecha de alta: <input type="text" name="fecha_alta" value="<? if(isset($_GET['fecha_alta'])){echo $_GET['fecha_alta'];}else{echo $fecha_alta;}?>" readonly="readonly" /> <br />
<input type="submit" name="modificar" value="Modificar usuario..." />
</form>
</body>
</html>