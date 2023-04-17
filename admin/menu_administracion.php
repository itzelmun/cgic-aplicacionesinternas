<? 
session_start();
if(!isset($_SESSION['Login']))
	{ 
		/* echo"<script type='text/javascript'> window.location=\"error.php\"; </script>"; */
		echo("No se ha autentificado!!!<br /><a href='index.php'>Autentificarme...</a>");
				
	}else{ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CSSLab - Centrado Vertical con CSS</title>

<style type="text/css">

html, body {
	margin: 0;
	padding: 0;
	font: 100% Georgia, serif;
	color: #333333#000;
	background: #ccc;
}
	
p {
    font-size: 14px;
	line-height: 150%;
    }

h1 {
    color: #C00;
	text-shadow: #000 1px 1px 2px;
    }
	
#contenedor {
	width:720px;
	height:420px;
	margin:10px auto;
	position:relative;
}

#contenido {
	border: 1px dashed #F00;
	background-color: #FFF;
	width: 720px;
	height: 320px;
	position: absolute;
	top: 10px;
	left: 10px;
	padding: 10px 20px 10px 10px;
	overflow: auto;
}

/* invisible para IE 5 \*/
#contenedor {
	position:absolute;
	margin:-210px 0 0 -360px;
	left:50%;
	top:50%;
}
/* fin hack */

</style>

</head>
<body>
	<div id="contenedor">
	  <div id="contenido">
		<h1 align="center">Men&uacute; de Administraci&oacute;n</h1> 

<ul>
    <li><a href="admin_noticias.php"><h1>Noticias</h1></a></li>
    <li><a href="admin_conacyt.php"><h1>CONACyT</h1></a></li>
    <li><a href="admin_sni.php"><h1>Investigadores</h1></a></li>
    <li><a href="admin_fraba.php"><h1>FRABA</h1></a></li>
</ul>


	  </div>
	</div>
    
</body>
</html>

<? } ?>