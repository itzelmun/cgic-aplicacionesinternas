<? session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Acceso Administraci&oacute;n</title>

		<style type="text/css">
		<? if(!isset($_SESSION['Login']))
	{ ?>
		*{
			font-size: 14px;
			font-family: sans-serif;
		}
		form.login {
		    background: none repeat scroll 0 0 #F1F1F1;
		    border: 1px solid #DDDDDD;
		    margin: 0 auto;
		    padding: 20px;
		    width: 278px;
		}
		form.login div {
		    margin-bottom: 15px;
		    overflow: hidden;
		}
		form.login div label {
		    display: block;
		    float: left;
		    line-height: 25px;
		}
		form.login div input[type="text"], form.login div input[type="password"] {
		    border: 1px solid #DCDCDC;
		    float: right;
		    padding: 4px;
		}
		form.login div input[type="submit"] {
		    background: none repeat scroll 0 0 #DEDEDE;
		    border: 1px solid #C6C6C6;
		    float: right;
		    font-weight: bold;
		    padding: 4px 20px;
		}
		.error{
			color: red;
		    font-weight: bold;
		    margin: 10px;
		    text-align: center;
		}
		
		
		<?	}else{ ?>
		
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
h1:hover {
    color: #27ACA6;;
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
	height: 500px;
	position: absolute;
	top: 10px;
	left: 10px;
	padding: 10px 20px 10px 10px;
	overflow: auto;
}

/* invisible para IE 5 \*/
#contenedor {
	position:absolute;
	margin:-310px 0 0 -360px;
	left:50%;
	top:50%;
}
/* fin hack */

<? } ?>
		</style>
</head>

<body>
<? if(!isset($_SESSION['Login']))
	{ ?>
		 <form action="logear.php" method="post" class="login">
		    <div><label>Usuario: </label><input name="usr" type="text"></div>
		    <div><label>Clave: </label><input name="clave" type="password" ></div>
		    <div><input name="enviar" type="submit" value="login"></div>
			</form>

				
<?	}else{ ?>

   

<div id="contenedor">
	  <div id="contenido">
<a href="logout.php">Cerrar sesi&oacute;n</a>
		<h1 align="center">Men&uacute; de Administraci&oacute;n</h1> 

<ul>
    <li><a href="admin_noticias.php"><h1>Noticias</h1></a></li>
    <li><a href="admin_conacyt.php"><h1>Proyectos CONACyT</h1></a></li>
    <li><a href="admin_sni.php"><h1>Investigadores</h1></a></li>
    <li><a href="admin_publicaciones.php"><h1>Publicaciones</h1></a></li>
     <li><a href="admin_ptc.php"><h1>PTC's</h1></a></li>
    <li><a href="admin_fraba.php"><h1>Proyectos FRABA</h1></a></li>
    <li><a href="admin_formalizar.php"><h1>Formalizar información de PTC's</h1></a></li>
    <li><a href="actualizar_fecha.php"><h1>Insertar fecha de última actualización</h1></a></li>
</ul>

	  </div>
	</div>
    
    
</body>
</html>      
<? } ?>