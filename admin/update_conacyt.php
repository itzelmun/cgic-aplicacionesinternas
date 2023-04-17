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
	$fuente_financ = $_POST['fuente'];
	$responsable = $_POST['responsable'];
	$concepto = $_POST['concepto'];
	$año = $_POST['año'];
	$monto = $_POST['monto'];

mysql_query("UPDATE conacytproyectos SET fuente_financiamiento='$fuente_financ', nombre_responsable='$responsable', concepto='$concepto', año='$año', monto='$monto' WHERE id='$id'")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al intentar modificar el proyecto conacyt.</center>");

echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='..exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>El proyecto conacyt ha sido modificado con &eacute;xito.
				<br /><br /><a class='link' href='admin_conacyt.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
}else{
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3> No has seleccionado ningun proyecto conacyt para modificar. <br /><br /><a class='link' href='admin_conacyt.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
<body>
</body>
</html>
