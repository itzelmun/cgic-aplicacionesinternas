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
	$ptc = $_POST['ptc'];
	$tipo = $_POST['tipo'];
	$autores = $_POST['autores'];
	$titulo = $_POST['titulo'];
	$estatus = $_POST['estatus'];
	$pais = $_POST['pais'];
	$revista = $_POST['revista'];
	$editorial = $_POST['editorial'];
	$issn = $_POST['issn'];
	$ano = $_POST['ano'];
	$proposito = $_POST['proposito'];
	$lgac = $_POST['lgac'];
	$area = $_POST['area'];
	

mysql_query("UPDATE publicaciones SET ptc='$ptc', tipo='$tipo', autores='$autores', titulo='$titulo', estatus='$estatus', pais='$pais', revista='$revista', editorial='$editorial', issn='$issn', ano='$ano', proposito='$proposito', lgac='$lgac', area='$area' WHERE id='$id'")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al intentar modificar la publicacion.</center>");

echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>La publicaci&oacute;n ha sido modificada con &eacute;xito.
				<br /><br /><a class='link' href='admin_publicaciones.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
}else{
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3> No has seleccionado ninguna publicacion para modificar. <br /><br /><a class='link' href='admin_publicaciones.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
<body>
</body>
</html>
