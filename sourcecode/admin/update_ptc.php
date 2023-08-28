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
	$num_trabajador = $_POST['num_trabajador'];
	$grado = $_POST['grado'];
	$nombres = $_POST['nombres'];
	$apellidos = $_POST['apellidos'];
	$genero = $_POST['genero'];
	$mail = $_POST['mail'];
	$tel_ext = $_POST['tel_ext'];
	$dependencia = $_POST['dependencia'];
	$nivelsni = $_POST['nivelsni'];
	$ingresosni = $_POST['ingresosni'];
	$vigenciasni = $_POST['vigenciasni'];
	$area = $_POST['area'];
	$cuerpo_acad = $_POST['cuerpo_acad'];
	$lgac = $_POST['lgac'];
	$webpage = $_POST['webpage'];
	$rec_tec = $_POST['rec_tec'];
	$tec_exp = $_POST['tec_exp'];
	$proyectos_actuales = $_POST['proyectos_actuales'];
	$grado_ano = $_POST['grado_ano'];
	$grado_instit = $_POST['grado_instit'];
	$nombramiento = $_POST['nombramiento'];
	$promep = $_POST['promep'];
	$ingresoprom = $_POST['ingresoprom'];
	$vigenciaprom = $_POST['vigenciaprom'];
	$publicaciones = $_POST['publicaciones'];
	
	//datos del arhivo
	$nombre_archivo = $_FILES['foto']['name'];//nombre del archivo
	$tipo_archivo = $_FILES['foto']['type'];//tipo de archivo
	$tamano_archivo = $_FILES['foto']['size'];//tamaño de la imagen en bytes
	$ruta_temporal=$_FILES['foto']['tmp_name'];//ruta temporal de la imagen

// INICIO actualizar foto
if (move_uploaded_file($ruta_temporal, "../imagenes/ptcs/".$nombre_archivo)){
					
					mysql_query("UPDATE ptcs SET num_trabajador='$num_trabajador', grado='$grado', nombres='$nombres', apellidos='$apellidos', genero='$genero', mail='$mail', tel_ext='$tel_ext', dependencia='$dependencia', nivelsni='$nivelsni', ingresosni='$ingresosni', vigenciasni='$vigenciasni', area='$area', cuerpo_acad='$cuerpo_acad', lgac='$lgac', webpage='$webpage', rec_tec='$rec_tec', tec_exp='$tec_exp', proyectos_actuales='$proyectos_actuales', grado_ano='$grado_ano', grado_instit='$grado_instit', nombramiento='$nombramiento', promep='$promep', ingresoprom='$ingresoprom', vigenciaprom='$vigenciaprom', produccion_cient='$publicaciones', foto='imagenes/ptcs/$nombre_archivo' WHERE id='$id'")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al intentar modificar el PTC.</center>");
										
					//mostrar mensage de exito y redireccionar al formulario de nuevo
	
echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>El PTC ha sido modificado con &eacute;xito.
				<br /><br /><a class='link' href='admin_ptc.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
								
					}else{//si ocurre algún error se imprime el aviso correspondiente en pantalla
							echo "<h1><p>Ocurrió algún error al subir la foto!! Intenta subirla nuevamente</p></h1>";
						  }		
// FIN actualizar foto


}else{
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3> No has seleccionado ningun investigador para modificar. <br /><br /><a class='link' href='admin_ptc.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
<body>
</body>
</html>
