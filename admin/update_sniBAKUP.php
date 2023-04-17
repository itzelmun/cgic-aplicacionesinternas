<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<?
if(isset($_POST['enviar']))
{
include("../conexion.php");

	$id = $_GET['id'];
	$grado = $_POST['grado'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$area = $_POST['area'];
	$nivel = $_POST['nivel'];
	$vigencia = $_POST['vigencia'];
	$mail = $_POST['mail'];
	$dependencia = $_POST['dependencia'];
	$perfilScopus = $_POST['perfilScopus'];
	$idScopus = $_POST['idScopus'];	
	$comentarios = $_POST['comentarios'];
	if(isset($_POST['udec']))	$udec = $_POST['udec'];
			else $udec = 0;

mysql_query("UPDATE sniinvestigadores SET grado='$grado', nombre='$nombre', apellido='$apellido', area='$area', nivelsni='$nivel', vigencia='$vigencia', mail='$mail', udec='$udec', dependencia='$dependencia', perfilScopus='$perfilScopus', idScopus='$idScopus', comentarios='$comentarios' WHERE id=$id")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al intentar modificar el investigador.</center>");

echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>El investigador ha sido modificado con &eacute;xito.
				<br /><br /><a class='link' href='admin_sni.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
}else{
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3> No has seleccionado ningun investigador para modificar. <br /><br /><a class='link' href='admin_sni.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
<body>
</body>
</html>
