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

	$convocatoria = $_POST['convocatoria'];
	$ano = $_POST['ano'];
	$referencia = $_POST['referencia'];
	$apellidos = $_POST['apellidos'];
	$nombres = $_POST['nombres'];
	$titulo = $_POST['titulo'];
	$objetivo = $_POST['objetivo'];
	$dependencia = $_POST['dependencia'];
	$grado = $_POST['grado'];
	$correo = $_POST['correo'];
		
	mysql_query("INSERT INTO fraba (convocatoria, ano, referencia, apellidos, nombres, titulo, objetivo, dependencia, grado, correo) VALUES ('$convocatoria', '$ano', '$referencia', '$apellidos', '$nombres', '$titulo', '$objetivo', '$dependencia', '$grado', '$correo')")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al INSERTAR EL REGISTRO en la base de datos</center>");
	
		//mostrar mensage de exito y redireccionar al formulario de nuevo
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>El proyecto FRABA ha sido registrado con &eacute;xito.
				<br /><br /><a class='link' href='form_agregar_fraba.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";

}else
	{
		echo "Ningun proyecto FRABA ha sido registrado";
	}
?>
</body>
</html>
