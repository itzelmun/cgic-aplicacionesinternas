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
	$nombramientoOld = $_POST['nombramientoOld'];	


///////////// INICIO NOMBRAMIENTOS ////////////////////////
	$target_file = ""; //si no se sube un archivo, no se guarda ninguna ruta en la BD
	if($_FILES["nombramiento"]["name"] != NULL){		
		$target_dir = "nombramientos/";
		$target_file = $target_dir . basename($_FILES["nombramiento"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
		// si el archivo ya existe o hay otro archivo relacionado al investigador
		if (file_exists($target_file)) {
			if(unlink($target_file)){
				echo "El archivo anterior ha sido reemplazado";
			}else{
				echo "Error al intentar eliminar el archivo existente";
				$uploadOk = 0;
			}
		}
		
		if($nombramientoOld != "" && $nombramientoOld != $target_file){
			if(unlink($nombramientoOld))
				echo "Archivo con otro nombre reemplazado";
			else{
				echo "Error al intentar eliminar el archivo existente con otro nombre";
				$uploadOk = 0;
			}
		}
		
		// si el archivo pesa más de
		if ($_FILES["nombramiento"]["size"] > 5000000) {
			echo "El archvo es demasiado largo.";
			$uploadOk = 0;
		}
		// permitir solamente PDF, JPG o JPEG
		if($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "jpeg") {
			echo "Error, solo se permite subir archivos PDF, JPEG";
			$uploadOk = 0;
		}
		// si la variable $uploadOk está en 0 por error
		if ($uploadOk == 0) {
			echo "Error, el archivo no se ha subido";
		// si todo está bien, intenta subir el archvo
		} else {
			if (move_uploaded_file($_FILES["nombramiento"]["tmp_name"], $target_file)) {
				echo "El archivo ". basename( $_FILES["nombramiento"]["name"]). " ha sido subido exitosamente";
				mysql_query("UPDATE sniinvestigadores SET nombramiento='$target_file' WHERE id=$id")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al intentar actualizar la ruta del archivo en la BD.</center>");
			} else {
				echo "Error al subir el archivo.";
			}
		}
	}
	///////////// FIN NOMBRAMIENTOS ////////////////////////


mysql_query("UPDATE sniinvestigadores SET noTrabajador='$noTrabajador', puesto='$puesto', expediente='$expediente', grado='$grado', nombre='$nombre', apellido='$apellido', area='$area', nivelsni='$nivel', vigenciaInicio='$vigenciaInicio', vigenciaFin='$vigenciaFin', mail='$mail', mailAlternativo='$mailAlternativo', udec='$udec', dependencia='$dependencia', perfilScopus='$perfilScopus', idScopus='$idScopus', comentarios='$comentarios' WHERE id=$id")  or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al intentar modificar el investigador.</center>");

echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../exito_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3>El investigador ha sido modificado con &eacute;xito.
				<br /><br /><a class='link' href='admin_sni.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
}else{
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='../error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3> No has seleccionado ningun investigador para modificar. <br /><br /><a class='link' href='admin_sni.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
<body>
</body>
</html>
