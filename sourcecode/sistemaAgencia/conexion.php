<meta charset="utf-8" />
<?php
	//definir datos de acceso (servidor, usuario, contraseña, bd)
	$servidor = "ww.ucol.mx";
	$usuario = "wcgic";
	$contrasena = "4TcCF";
	$bd = "cgic";
	
	//crear la conexión
	$cnx = mysqli_connect($servidor, $usuario, $contrasena, $bd);
	
	//verificar si la conexión fue exitosa
	if(!$cnx)
		die("Error de conexion...".mysqli_connect_error());
	else
		//echo "Conexion exitosa!!!";
	
?>