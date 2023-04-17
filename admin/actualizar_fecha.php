<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?
include("../conexion.php");

$dia = date("d");
$mes = date("m");
$ano = date("Y");

$string = "INSERT INTO fecha_actualizacion (dia,mes,ano) VALUES ('$dia','$mes','$ano')";

if(mysql_query($string)){
	echo "La fecha fue insertada exitosamente";
	}else{
		echo "Ocurrió algún error al intentar insertar la fecha, inténtalo de nuevo ".mysql_error();
		}

?>
</body>
</html>