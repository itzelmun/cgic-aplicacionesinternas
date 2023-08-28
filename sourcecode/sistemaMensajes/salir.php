<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php

$_SESSION = array();
session_unset();
if(session_destroy()){
	echo "La sesión ha sido cerrada exitosamente... <br />";
	echo "<a href='index.php'> Salir </a>";
	//	sleep(2);
	/*echo "<script type='text/javascript'> window.location=\"login.php\"; </script>"; */
	}else{
		echo "Ha ocurrido algún problema al cerrar la sesión, lo sentimos...";
		echo "<a href='salir.php'> Reintentar </a>";
		}

?>
</body>
</html>