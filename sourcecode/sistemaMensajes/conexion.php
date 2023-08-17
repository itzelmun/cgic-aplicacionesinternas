<?php
	//definir datos de acceso (servidor, usuario, contraseña, bd)
	//$servidor = "www.ucol.mx";
	//$usuario = "wcgic";
	//$contrasena = "4TcCF";
	//$bd = "cgic";
	$servidor = $_ENV['DB_HOST'];
	$usuario = $_ENV['MYSQL_USER'];
	$contrasena = $_ENV['MYSQL_PASSWORD'];
	$bd = $_ENV['MYSQL_DATABASE'];


	//crear la conexión
	$cnx = mysql_connect($servidor, $usuario, $contrasena, $bd);
	
	//verificar si la conexión fue exitosa
	if(!$cnx)
		die("Error de conexion...".mysql_connect_error());
	else
		//echo "Conexión exitosa!!!";
?>