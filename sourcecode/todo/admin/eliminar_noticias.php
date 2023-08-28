<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

</head>

<body>
<?
if(isset($_GET['id']))
{
include("../conexion.php");
$id = $_GET['id'];

mysql_query("DELETE FROM noticias WHERE id='$id'") or die(mysql_error()."</br></br></br> Error: Ha ocurrido un error al tratar de eliminar el registro</center>");

include("admin_noticias.php");

/* echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>La noticia ha sido eliminada con &eacute;xito.
				<br /><br /><a class='link' href='admin_noticias.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>"; */
}else{
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3> No has seleccionado ninguna noticia para eliminar. <br /><br /><a class='link' href='admin_noticias.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
</body>
</html>
