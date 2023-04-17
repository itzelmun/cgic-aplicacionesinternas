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
<?php
include("conexion.php");
//recibir los datos del formulario de login
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
//hacer la consulta a la BD para verificar si existe el usuario ingresado
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";
$consulta = mysqli_query($cnx, $sql);

$result = mysqli_fetch_array($consulta);
$num_reg = mysqli_num_rows($consulta); // número de registros encontrados

 if($num_reg != 0){
	 //si el usuario existe en la tabla "usuarios", creo sus variables de sesion
	 $_SESSION['sid'] = $result['id'];
 	 $_SESSION['snombre'] = $result['nombre'];
  	 $_SESSION['sapellido'] = $result['apellido'];
	 $_SESSION['stipo'] = $result['tipo'];
	 
	 $_SESSION['snombre_completo'] = $_SESSION['snombre']." ".$_SESSION['sapellido'];
	 $tipo = $_SESSION['stipo'];
	 $sesion_tipo = $_SESSION['stipo'];
	
	if($tipo == "solicitud"){
		 echo "Su solicitud está pendiente de autorización, intente ingresar más tarde<br /><a href='index.php'> Regresar... </a>";
	 }else{
		 echo "<h3>Bienvenido ".$_SESSION['snombre_completo']."!!!</h3><br /><a href='admin_gerente.php?tipo=$tipo'> Continuar... </a>";	 							
		 }					
		 
	 
	 }else{
			 echo "Los datos ingresados son incorrectos, verifícalos <br /><br />";
			 echo "<a href='index.php'> Regresar... </a>";
		 }


?>


</body>
</html>