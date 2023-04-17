<?
	include("../../conexion.php");
	
	$id = $_GET['id'];
	$vigente = $_GET['vigente'];
	
	mysql_query("UPDATE articulos SET vigente='$vigente' WHERE id='$id'")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al cambiar el estado de vigencia a la publicación.</center>");

	include("admin_publicaciones.php");
?>