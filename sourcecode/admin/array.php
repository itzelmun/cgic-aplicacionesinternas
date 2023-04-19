<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?

$nombre_host = "localhost";
$usuario_bd = "root";
$contrasena_bd = "root";
$base_datos_nombre = "cgic";

$conexion = mysql_connect($nombre_host, $usuario_bd, $contrasena_bd) or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al CONECTAR la base de datos.</center>");

mysql_select_db($base_datos_nombre, $conexion) or die(mysql_error()."<br/><br/><br/><center>ERROR: Ha ocurrido un error al SELECCIONAR la base de datos.</center>");

$id = $_GET['id'];

$sql = "SELECT produccion_cient FROM ptcs WHERE id='$id'";
$consulta = mysql_query($sql);
$result = mysql_fetch_array($consulta);
$prod = utf8_encode($result['produccion_cient']);

$arreglo = explode("\n", $prod);
echo "<ul>";
foreach($arreglo as $salto){ 
		
        	echo "<li>".$salto."</li>";
        
}
echo "</ul>";
?>
</body>
</html>