<?
	include("../conexion.php");
	
	$id = $_GET['id'];
	$vigente = $_GET['vigente'];
	
	mysql_query("UPDATE sniinvestigadores SET vigente='$vigente' WHERE id='$id'")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al cambiar el estado de vigencia del Investigador SNI.</center>");

	include("admin_sni.php");
?>