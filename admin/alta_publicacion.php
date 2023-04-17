<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
body{
	font-family:Arial, Helvetica, sans-serif;
	}
	
h3{
	font-size:15px;
	}
	
.link{
	font-size:12px;
	font-weight:bold;
	text-decoration:none;
	color:#999999;
}
.link:hover{
	font-size:12px;
	font-weight:bold;
	text-decoration:underline;
	color:#000000;
}
</style>
</head>

<body>
<?
include("../conexion.php");

if(isset($_POST['enviar']))
{

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
	
		
	
	mysql_query("INSERT INTO publicaciones (ptc, tipo, autores, titulo, estatus, pais, revista, editorial, issn, ano, proposito, lgac, area) VALUES ('$ptc', '$tipo', '$autores', '$titulo', '$estatus', '$pais', '$revista', '$editorial', '$issn', '$ano', '$proposito', '$lgac', '$area')")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al INSERTAR LA PUBLICACI&Oacute;N en la base de datos</center>");
	
		//mostrar mensage de exito y redireccionar al formulario de nuevo
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>La publicaci&oacute;n ha sido registrada con &eacute;xito.
				<br /><br /><a class='link' href='form_agregar_publicacion.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";

}else
	{
		echo "Ninguna publicaci&oacute;n ha sido registrada";
	}
?>
</body>
</html>
