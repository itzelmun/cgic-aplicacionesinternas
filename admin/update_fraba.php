<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<?
include("../conexion.php");

if(isset($_POST['enviar']))
{
	$convocatoria = $_POST['convocatoria'];
	$ano = $_POST['ano'];
	$referencia = $_POST['referencia'];
	$grado = $_POST['grado'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$titulo = $_POST['titulo'];
	$objetivo = $_POST['objetivo'];
	$dependencia = $_POST['dependencia'];
	$correo = $_POST['correo'];

mysql_query("UPDATE fraba SET convocatoria='$convocatoria', ano='$ano', referencia='$referencia', grado='$grado', nombres='$nombres', apellidos='$apellidos', titulo='$titulo', objetivo='$objetivo', dependencia='$dependencia', correo='$correo' WHERE id='$id'")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al intentar modificar el proyecto FRABA.</center>");

echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>El proyecto FRABA ha sido modificado con &eacute;xito.
				<br /><br /><a class='link' href='admin_fraba.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
}else{
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3> No has seleccionado ningun proyecto FRABA para modificar. <br /><br /><a class='link' href='admin_fraba.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
<body>
</body>
</html>
