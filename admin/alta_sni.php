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
	font-size:12px;W
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

	$noTrabajador = $_POST['noTrabajador'];
	$puesto = $_POST['puesto'];
	$expediente = $_POST['expediente'];
	$grado = $_POST['grado'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$area = $_POST['area'];
	$nivel = $_POST['nivel'];
	$vigenciaInicio = $_POST['vigenciaInicio'];
	$vigenciaFin = $_POST['vigenciaFin'];
	$mail = $_POST['mail'];
	$mailAlternativo = $_POST['mailAlternativo'];
	$dependencia = $_POST['dependencia'];
	$perfilScopus = $_POST['perfilScopus'];
	$idScopus = $_POST['idScopus'];
	$comentarios = $_POST['comentarios'];
	if(isset($_POST['udec']))	$udec = $_POST['udec'];
			else $udec = 0;
	
	///////////// INICIO NOMBRAMIENTOS ////////////////////////
	$target_file = ""; //si no se sube un archivo, no se guarda ninguna ruta en la BD
	if($_FILES["nombramiento"]["name"] != NULL){
		$target_dir = "nombramientos/";
		$target_file = $target_dir . basename($_FILES["nombramiento"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["nombramiento"]["size"] > 5000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "jpeg") {
			echo "Sorry, only PDF, JPEG, JPG files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["nombramiento"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["nombramiento"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	///////////// FIN NOMBRAMIENTOS ////////////////////////
	
	mysql_query("INSERT INTO sniinvestigadores (noTrabajador, puesto, expediente, grado, nombre, apellido, area, nivelsni, vigenciaInicio, vigenciaFin, udec, mail, mailAlternativo, dependencia, perfilScopus, idScopus, comentarios, nombramiento) VALUES ('$noTrabajador', '$puesto', '$expediente', '$grado', '$nombre', '$apellido', '$area', '$nivel', '$vigenciaInicio', '$vigenciaFin', '$udec', '$mail', '$mailAlternativo', '$dependencia', '$perfilScopus', '$idScopus', '$comentarios', '$target_file')")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al INSERTAR EL REGISTRO en la base de datos</center>");
	
		//mostrar mensage de exito y redireccionar al formulario de nuevo
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>El investigador ha sido registrado con &eacute;xito.
				<br /><br /><a class='link' href='form_agregar_sni.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";

}else
	{
		echo "Ningun investigador ha sido registrado";
	}
?>
</body>
</html>
