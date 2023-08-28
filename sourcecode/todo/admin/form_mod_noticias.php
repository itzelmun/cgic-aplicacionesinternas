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
form#noticias ul li{
height: 30px;
}
form#noticias label{
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
<script type="text/javascript">
//restringir el numero de caracteres permitidos en el textarea del formulario
function limita(elEvento, maximoCaracteres) {
var elemento = document.getElementById("int");
// Obtener la tecla pulsada
var evento = elEvento || window.event;
var codigoCaracter = evento.charCode || evento.keyCode;
// Permitir utilizar las teclas con flecha horizontal
if(codigoCaracter == 37 || codigoCaracter == 39 || codigoCaracter == 38 || codigoCaracter == 40) {
return true;
}
// Permitir borrar con la tecla Backspace y con la tecla Supr.
if(codigoCaracter == 8 || codigoCaracter == 46) {
return true;
}
else if(elemento.value.length >= maximoCaracteres ) {
return false;
}
else {
return true;
}
}
</script>
</head>

<body>
<?
if(isset($_GET['id']))
{
include("../conexion.php");

$id = $_GET['id'];

$consulta = mysql_query("SELECT * FROM noticias WHERE id='$id'") or die(mysql_error()."</br></br></br> Error: Ha ocurrido un error al tratar de eliminar el registro</center>");

$registros = mysql_fetch_array($consulta);
	  	
			$id = $registros['id'];
			$introduccion = $registros['introduccion'];
			$link = $registros['link'];
			$fecha = $registros['fecha'];
		
?>
<a href="admin_noticias.php" class="large button green">Cancelar...</a>

<form id="noticias" name="noticias" method="post" action="update_noticias.php?id=<?=$id; ?>">
  <fieldset id="usuario">
  <legend> Noticias: </legend>
  <ul>
  	<li>
  		<label>Texto Introductorio:<br /><span> (M&aacute;ximo 100 caracteres.)</span></label>
  	    <textarea id="int" name="introduccion" onkeypress="return limita(event, 100)" cols="100" rows="5"> <?=$introduccion; ?> </textarea>
  	</li>
	<li>
    	<label>Enlace directo: <br /><span> (El hiperv&iacute;nculo para leer la noticia completa.)</span></label>
		<textarea name="link" cols="100" rows="5"> <?=$link; ?> </textarea>
	</li>
  	<li>
  		<label>Fecha de captura:</label>
  	    <input type="text" name="fecha" readonly="readonly" value="<?=$fecha; ?>"  />
  	</li>
	</ul>
	</fieldset>
 	<input name="enviar" type="submit" id="submit" value="Enviar..." />

</form>
<?
}else{
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3> No has seleccionado ninguna noticia para modificar. <br /><br /><a class='link' href='admin_noticias.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
</body>
</html>
