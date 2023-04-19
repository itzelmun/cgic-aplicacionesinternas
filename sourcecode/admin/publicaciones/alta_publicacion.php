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
include("../../conexion.php");

if(isset($_POST['enviar']))
{

	$fuente = $_POST['fuente'];
	$titulo = trim($_POST['titulo']);
	$autores = trim($_POST['autores']);
	$autor1 = $_POST['autor1'];
	$autor2 = $_POST['autor2'];
	$autor3 = $_POST['autor3'];
	$autor4 = $_POST['autor4'];
	$area = $_POST['area'];
	$year = $_POST['year'];
	$editorial = trim($_POST['editorial']);
	$doi = trim($_POST['doi']);
	$comentarios = trim($_POST['comentarios']);
	$fechaInsert = $_POST['fechaInsert'];
				
	//insertar información del artículo		
	mysql_query("INSERT INTO articulos (fuente, titulo, autores, area, year, editorial, vigente, doi, comentarios, fechaInsert) VALUES ('$fuente', '$titulo', '$autores', '$area', '$year', '$editorial', '$vigente', '$doi', '$comentarios', '$fechaInsert')")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al INSERTAR EL ARTÍCULO en la base de datos</center>");
	
	$idArticulo=mysql_insert_id(); //ultimo articulo insertado
	
	//insertar registros en la tabla intermedia SNIARTICULOS
		if($autor1 != "")
			mysql_query("INSERT INTO sniarticulos (idArticulo, idSni) VALUES ($idArticulo, $autor1)")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al INSERTAR EL REGISTRO en la tabla SNIARTICULOS</center>");
					
		if($autor2 != "")
			mysql_query("INSERT INTO sniarticulos (idArticulo, idSni) VALUES ('$idArticulo', '$autor2')")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al INSERTAR EL REGISTRO en la tabla SNIARTICULOS</center>");
					
		if($autor3 != "")
			mysql_query("INSERT INTO sniarticulos (idArticulo, idSni) VALUES ('$idArticulo', '$autor3')")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al INSERTAR EL REGISTRO en la tabla SNIARTICULOS</center>");
					
		if($autor4 != "")
			mysql_query("INSERT INTO sniarticulos (idArticulo, idSni) VALUES ('$idArticulo', '$autor4')")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al INSERTAR EL REGISTRO en la tabla SNIARTICULOS</center>");
				
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
