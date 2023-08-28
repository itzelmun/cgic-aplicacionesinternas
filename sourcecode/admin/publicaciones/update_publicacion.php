<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<?
if(isset($_POST['enviar']))
{
include("../../conexion.php");
echo $id = $_GET['id'];
echo $idAutor1Old = $_GET['a1'];
echo $idAutor2Old = $_GET['a2'];
echo $idAutor3Old = $_GET['a3'];
echo $idAutor4Old = $_GET['a4'];
echo $idSniArticulo1 = $_GET['idsa1'];
echo $idSniArticulo2 = $_GET['idsa2'];
echo $idSniArticulo3 = $_GET['idsa3'];
echo $idSniArticulo4 = $_GET['idsa4'];

$fechaLastMod = date("Y-m-d"); //fecha de la última modificación

	$fuente = $_POST['fuente'];
	$titulo = $_POST['titulo'];
	$autores = $_POST['autores'];
	$autor1 = $_POST['autor1'];
	$autor2 = $_POST['autor2'];
	$autor3 = $_POST['autor3'];
	$autor4 = $_POST['autor4'];
	$area = $_POST['area'];
	$year = $_POST['year'];
	$editorial = $_POST['editorial'];
	$doi = $_POST['doi'];
	$comentarios = $_POST['comentarios'];
		
	//actualizar información del artículo		
	mysql_query("UPDATE articulos SET fuente='$fuente', titulo='$titulo', autores='$autores', area='$area', year=$year, editorial='$editorial', doi='$doi', comentarios='$comentarios', fechaLastMod='$fechaLastMod' WHERE id=$id")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR EL ARTÍCULO en la base de datos</center>");

//actualizar investigadores en la tabla intermedia SNIARTICULOS
		if($autor1 != $idAutor1Old && $idAutor1Old == "")//insertar
			mysql_query("INSERT INTO sniarticulos (idArticulo, idSni) VALUES ('$id', '$autor1')")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
		else if($autor1 != $idAutor1Old && $autor1 == "")//eliminar OLD
			mysql_query("DELETE FROM sniarticulos WHERE id=$idSniArticulo1")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
		else if($autor1 != $idAutor1Old && $idAutor1Old != "" && $autor1 != "")//actualizar
			mysql_query("UPDATE sniarticulos SET idSni=$autor1 WHERE id=$idSniArticulo1")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
					
					
		if($autor2 != $idAutor2Old && $idAutor2Old == "")//insertar
			mysql_query("INSERT INTO sniarticulos (idArticulo, idSni) VALUES ('$id', '$autor2')")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
		else if($autor2 != $idAutor2Old && $autor2 == "")//eliminar OLD
			mysql_query("DELETE FROM sniarticulos WHERE id=$idSniArticulo2")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
		else if($autor2 != $idAutor2Old && $idAutor2Old != "" && $autor2 != "")//actualizar
			mysql_query("UPDATE sniarticulos SET idSni=$autor2 WHERE id=$idSniArticulo2")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
					
		
		if($autor3 != $idAutor3Old && $idAutor3Old == "")//insertar
			mysql_query("INSERT INTO sniarticulos (idArticulo, idSni) VALUES ('$id', '$autor3')")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
		else if($autor3 != $idAutor3Old && $autor3 == "")//eliminar OLD
			mysql_query("DELETE FROM sniarticulos WHERE id=$idSniArticulo3")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
		else if($autor3 != $idAutor3Old && $idAutor3Old != "" && $autor3 != "")//actualizar
			mysql_query("UPDATE sniarticulos SET idSni=$autor3 WHERE id=$idSniArticulo3")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
			
			
			if($autor4 != $idAutor4Old && $idAutor4Old == "")//insertar
			mysql_query("INSERT INTO sniarticulos (idArticulo, idSni) VALUES ('$id', '$autor4')")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
		else if($autor4 != $idAutor4Old && $autor4 == "")//eliminar OLD
			mysql_query("DELETE FROM sniarticulos WHERE id=$idSniArticulo4")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
		else if($autor4 != $idAutor4Old && $idAutor4Old != "" && $autor4 != "")//actualizar
			mysql_query("UPDATE sniarticulos SET idSni=$autor4 WHERE id=$idSniArticulo4")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al MODIFICAR AUTOR2 en la tabla SNIARTICULOS</center>");
				
		//mostrar mensage de exito y redireccionar al formulario de nuevo
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>La publicaci&oacute;n ha sido MODIFICADA con &eacute;xito.
				<br /><br /><a class='link' href='admin_publicaciones.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
<body>
</body>
</html>
