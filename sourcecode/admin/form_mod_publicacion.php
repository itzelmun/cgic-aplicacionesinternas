<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..:: CGIC ::..</title>
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

include("../conexion.php");

$id = $_GET['id'];

$consulta = mysql_query("SELECT * FROM publicaciones WHERE id='$id'") or die(mysql_error()."</br></br></br> Error: Ha ocurrido un error al buscar el registro</center>");

$registros = mysql_fetch_array($consulta);
	  	
			//$id = $registros['id'];
			$ptc = $registros['ptc'];
			$tipo = $registros['tipo'];
			$autores = $registros['autores'];
			$titulo = $registros['titulo'];
			$estatus = $registros['estatus'];
			$pais = $registros['pais'];
			$revista = $registros['revista'];
			$editorial = $registros['editorial'];
			$issn = $registros['issn'];
			$ano = $registros['ano'];
			$proposito = $registros['proposito'];
			$lgac = $registros['lgac'];
			$area = $registros['area'];
				
?>
<a href="admin_publicaciones.php" class="large button green">Cancelar...</a>
<br />

<form id="sni" name="sni" method="post" action="update_publicacion.php?id=<?=$id;  ?>">
  <fieldset id="usuario">
  <legend> Modificar publicaci&oacute;n: </legend>
  <ul>
  	
  	<li>
  		<label>PTC responsable:</label>
        <input type="text" id="ptc" name="ptc"  value="<?=$ptc; ?>"/>
  	</li>
    <li>
  		<label>Tipo:</label>
        <input type="text" id="tipo" name="tipo" value="<?=$tipo; ?>" />
  	</li>
    <li>
  		<label>Autores:</label>
        <input type="text" id="autores" name="autores" value="<?=$autores; ?>" />
  	</li>
     <li>
  		<label>T&iacute;tulo:</label>
        <input type="text" id="titulo" name="titulo" value="<?=$titulo; ?>" />
  	</li>
    <li>
  		<label>Estatus:</label>
        <input type="text" id="estatus" name="estatus" value="<?=$estatus; ?>" />
  	</li>
     <li>
  		<label>Pa&iacute;s:</label>
        <input type="text" id="pais" name="pais" value="<?=$pais; ?>" />
  	</li>
     <li>
  		<label>Revista:</label>
        <input type="text" id="revista" name="revista" value="<?=$revista; ?>" />
  	</li>
     <li>
  		<label>Editorial:</label>
        <input type="text" id="editorial" name="editorial" value="<?=$editorial; ?>" />
  	</li>
    <li>
  		<label>Issn:</label>
        <input type="text" id="issn" name="issn" value="<?=$issn; ?>" />
  	</li>
     <li>
  		<label>A&ntilde;o:</label>
        <input type="text" id="ano" name="ano" value="<?=$ano; ?>" />
  	</li>
    <li>
  		<label>Prop&oacute;sito:</label>
        <input type="text" id="proposito" name="proposito" value="<?=$proposito; ?>" />
  	</li>
    <li>
  		<label>LGAC:</label>
        <input type="text" id="lgac" name="lgac" value="<?=$lgac; ?>" />
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
    
	</ul>
	</fieldset>
 	<input name="enviar" type="submit" id="submit" value="Enviar..." />

</form>
</body>
</html>
