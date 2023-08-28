<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..:: CGIC ::.. noticias</title>
<style type="text/css">
body{
text-align:center;
}
ul{
list-style:none;
}
form{
background:#fafafa;
padding: 15px 40px;
width:600px;
margin:0 auto;
}
legend{
font-size:14px;
color:#444720;
padding: 4px 0;
}
legend+ul{
border-top: 1px solid #f0f0f0;
padding-top: 15px;
display:block;
width: 600px;
}
form#sni ul li{
height: 30px;
}
form#sni label{
width: 200px;
display:block;
float:left;
font-weight:bold;
margin-left: 25px;
color: #444720;
text-align:left;
}
span{
font-weight:normal;

}
input, textarea, select{
display:block;
float:left;
border-top: 1px solid #acbd5a;
border-left: 1px solid #acbd5a;
border-right: 1px solid #6c7f3d;
border-bottom: 1px solid #6c7f3d;
width: 300px;
color: #6b6b6b;
padding: 2px 2px 2px 4px;
margin:4px 0px;
}
input:focus, textarea:focus{
background: #acbd5a;
border: 1px solid #acbd5a;
color: #fff;
}
input#submit{
width: 115px;
height: 25px;
background: #a6bf52;
padding: 2px 0px 3px 24px;
color: #fff;
text-align:left;
margin-left: 237px;
border: none;
}
input#submit:focus{
background: #03b0f4;
}


/*ENLACES COMO BOTONES*/
.button, .button:visited { /* botones genéricos */
background: #222 url(../URL_overlay.png) repeat-x;
display: inline-block;
padding: 5px 10px 6px;
color: #FFF;
text-decoration: none;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
border-bottom: 1px solid rgba(0,0,0,0.25);
position: relative;
cursor:pointer
}
.button:hover { /* el efecto hover */
background-color: #111
color: #FFF;
}
.button:active{  /* el efecto click */
top: 1px;
}

/* botones pequeños */
.small.button, .small.button:visited {
font-size: 11px ;
}

/* botones medianos */
.button, .button:visited,.medium.button, .medium.button:visited {
font-size: 13px;
font-weight: bold;
line-height: 1;
text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
}

/* botones grandes */
.large.button, .large.button:visited {
font-size:14px;
padding: 8px 14px 9px;
}

/* botones extra grandes */
.super.button, .super.button:visited {
font-size: 34px;
padding: 8px 14px 9px;
}


.pink.button { background-color: #E22092; }
.pink.button:hover{ background-color: #C81E82; }

.green.button, .green.button:visited { background-color: #91BD09; }
.green.button:hover{ background-color: #749A02; }

.red.button, .red.button:visited { background-color: #E62727; }
.red.button:hover{ background-color: #CF2525; }

.orange.button, .orange.button:visited { background-color: #FF5C00; }
.orange.button:hover{ background-color: #D45500; }

.blue.button, .blue.button:visited { background-color: #2981E4; }
.blue.button:hover{ background-color: #2575CF; }

.yellow.button, .yellow.button:visited { background-color: #FFB515; }
.yellow.button:hover{ background-color: #FC9200; }
</style>

</head>

<body>
<?
if(isset($_GET['id']))
{
include("../conexion.php");

$id = $_GET['id'];

$consulta = mysql_query("SELECT * FROM sniinvestigadores WHERE id='$id'") or die(mysql_error()."</br></br></br> Error: Ha ocurrido un error al buscar el registro</center>");

$registros = mysql_fetch_array($consulta);
	  	
			$id = $registros['id'];
			$grado = $registros['grado'];
			$nombre = $registros['nombre'];
			$apellido = $registros['apellido'];
			$area = $registros['area'];
			$nivel = $registros['nivelsni'];
			$vigencia = $registros['vigencia'];
			$udec = $registros['udec'];	
			$mail = $registros['mail'];
			$dependencia = $registros['dependencia'];
			$perfilScopus = $registros['perfilScopus'];
			$idScopus = $registros['idScopus'];	
			$comentarios = $registros['comentarios'];
		
?>
<a href="admin_sni.php" class="large button green">Cancelar...</a>

<form id="sni" name="sni" method="post" action="update_sni.php?id=<?=$id;  ?>">
  <fieldset id="usuario">
  <legend> Modificar investigador SNI: </legend>
  <ul>
  	<li>
  		<label>Grado Acad&eacute;mico:</label>        
					         <select id="grado" name="grado">
                                    <option value="Dr." <? if($grado == "Dr.") echo 'selected="selected"'; ?>>Dr.</option>
                                    <option value="Dra." <? if($grado == "Dra.") echo 'selected="selected"'; ?>>Dra.</option>
                                    <option value="M.C." <? if($grado == "M.C.") echo 'selected="selected"'; ?>>M.C.</option>
                                    <option value="Lic." <? if($grado == "Lic.") echo 'selected="selected"'; ?>>Lic.</option>
                                    <option value="Licda." <? if($grado == "Licda.") echo 'selected="selected"'; ?>>Licda.</option>
                                  </select>
  	</li>
  	<li>
  		<label>Nombre(s) investigador:</label>
        <input type="text" id="nombre" name="nombre" value="<?=$nombre; ?>" />
  	</li>
    <li>
  		<label>Apellido(s) investigador:</label>
        <input type="text" id="apellido" name="apellido" value="<?=$apellido; ?>" />
  	</li>
	<li>
  		<label>&Aacute;rea:</label>
        
        <select id="area" name="area" >
                                    <option value="fisico" <? if($area == "fisico") echo 'selected="selected"'; ?>>F&iacute;sico Matem&aacute;tico y Ciencias de la Tierra</option>
                                    <option value="biologia" <? if($area == "biologia") echo 'selected="selected"'; ?>>Biolog&iacute;a y Qu&iacute;mica</option>
                                    <option value="medicina" <? if($area == "medicina") echo 'selected="selected"'; ?>>Medicina y Ciencias de la Salud</option>
                                    <option value="humanidades" <? if($area == "humanidades") echo 'selected="selected"'; ?>>Humanidades y de la Conducta</option>
                                    <option value="sociales" <? if($area == "sociales") echo 'selected="selected"'; ?>>Sociales y Econ&oacute;mico Administrativas</option>
                                    <option value="biotecnologia" <? if($area == "biotecnologia") echo 'selected="selected"'; ?>>Biotecnolog&iacute;a y Ciencias Agropecuarias</option>
                                    <option value="ingenieria" <? if($area == "ingenieria") echo 'selected="selected"'; ?>>Ingenier&iacute;a</option>
                                  </select>
  	</li>
    <li>
  		<label>Nivel:</label>
        <select id="nivel" name="nivel">
                                    <option value="Candidato" <? if($nivel == "Candidato") echo'selected="selected"'; ?>>Candidato</option>
                                    <option value="1" <? if($nivel == "1") echo'selected="selected"'; ?>>1</option>
                                    <option value="2" <? if($nivel == "2") echo'selected="selected"'; ?>>2</option>
                                    <option value="3" <? if($nivel == "3") echo'selected="selected"'; ?>>3</option>
                                  </select>
  	</li>
    <li>
  		<label>Vigencia:</label>
        <input type="text" id="vigencia" name="vigencia" value="<?=$vigencia; ?>" />
  	</li>
    <li>
  		<label>U de C:</label>
        <input type="checkbox" id="udec" name="udec" value="1" <? if($udec == 1)echo "checked='checked'"; ?> />
  	</li>
    <li>
  		<label>Correo electrónico:</label>
        <input type="text" id="mail" name="mail" value="<?=$mail; ?>" />
  	</li>
     <li>
  		<label>Dependencia:</label>
        <input type="text" id="dependencia" name="dependencia" value="<?=$dependencia; ?>" />
  	</li>
    <li>
  		<label>URL Perfil SCOPUS:</label>
        <input type="text" id="perfilScopus" name="perfilScopus" value="<?=$perfilScopus; ?>" />
  	</li>
    <li>
  		<label>ID Perfil SCOPUS:</label>
        <input type="text" id="idScopus" name="idScopus" value="<?=$idScopus; ?>" />
  	</li>
    <li>
  		<label>Comentarios:</label>
        <textarea id="comentarios" name="comentarios"><?=$comentarios; ?></textarea>
  	</li>
	</ul>
	</fieldset>
 	<input name="enviar" type="submit" id="submit" value="Enviar..." />

</form>
<?
}else{
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3> No has seleccionado ninguna noticia para modificar. <br /><br /><a class='link' href='admin_sni.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
</body>
</html>
