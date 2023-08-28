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
	
	//inicio files ejemplo
	
	//datos del arhivo
	$nombre_archivo = $_FILES['foto']['name'];//nombre del archivo
	$tipo_archivo = $_FILES['foto']['type'];//tipo de archivo
	$tamano_archivo = $_FILES['foto']['size'];//tamaño de la imagen en bytes
	$ruta_temporal=$_FILES['foto']['tmp_name'];//ruta temporal de la imagen

			
			//subimos la imagen a la carpeta "img" del servidor e insertamos un nuevo registro en la tabla	
			if (move_uploaded_file($ruta_temporal, "../imagenes/ptcs/".$nombre_archivo)){
					
					mysql_query("INSERT INTO ptcs (num_trabajador, grado, nombres, apellidos, genero, mail, tel_ext, dependencia, nivelsni, ingresosni, vigenciasni, area, cuerpo_acad, lgac, webpage, rec_tec, tec_exp, proyectos_actuales, grado_ano, grado_instit, nombramiento, promep, ingresoprom, vigenciaprom, produccion_cient, foto, vigente) VALUES ('$num_trabajador', '$grado', '$nombres', '$apellidos', '$genero', '$mail', '$tel_ext', '$dependencia', '$nivelsni', '$ingresosni', '$vigenciasni', '$area', '$cuerpo_acad', '$lgac', '$webpage', '$rec_tec', '$tec_exp', '$proyectos_actuales', '$grado_ano', '$grado_instit', '$nombramiento', '$promep', '$ingresoprom', '$vigenciaprom', '$publicaciones', 'imagenes/ptcs/$nombre_archivo', 1)")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al INSERTAR EL REGISTRO en la base de datos</center>");
										
					//mostrar mensage de exito y redireccionar al formulario de nuevo
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>El PTC ha sido registrado con &eacute;xito.
				<br /><br /><a class='link' href='form_agregar_ptc.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
								
					}else{//si ocurre algún error se imprime el aviso correspondiente en pantalla
							echo "<h1><p>Ocurrió algún error al subir la foto!! Intenta subirla nuevamente</p></h1>";
						  }		
	
	//fin files ejemplo
	
	
		

}else
	{
		echo "Ningun PTC ha sido registrado";
	}
?>
</body>
</html>
