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

$consulta = mysql_query("SELECT * FROM ptcs WHERE id='$id'") or die(mysql_error()."</br></br></br> Error: Ha ocurrido un error al buscar el registro</center>");

$registros = mysql_fetch_array($consulta);
	  	
			//$id = $registros['id'];
			$num_trabajador = $registros['num_trabajador'];
			$grado = $registros['grado'];
			$nombres = $registros['nombres'];
			$apellidos = $registros['apellidos'];
			$genero = $registros['genero'];
			$mail = $registros['mail'];
			$tel_ext = $registros['tel_ext'];
			$dependencia = $registros['dependencia'];
			$nivelsni = $registros['nivelsni'];
			$ingresosni = $registros['ingresosni'];
			$vigenciasni = $registros['vigenciasni'];
			$area = $registros['area'];
			$cuerpo_acad = $registros['cuerpo_acad'];
			$lgac = $registros['lgac'];
			$webpage = $registros['webpage'];
			$rec_tec = $registros['rec_tec'];
			$tec_exp = $registros['tec_exp'];
			$proyectos_actuales = $registros['proyectos_actuales'];
			$grado_ano = $registros['grado_ano'];
			$grado_instit = $registros['grado_instit'];
			$nombramiento = $registros['nombramiento'];
			$promep = $registros['promep'];
			$ingresoprom = $registros['ingresoprom'];
			$vigenciaprom = $registros['vigenciaprom'];
			$publicaciones = $registros['publicaciones'];
		
?>
<a href="admin_ptc.php" class="large button green">Cancelar...</a>

<form id="sni" name="sni" >
  <fieldset id="usuario">
  <legend> Modificar PTC: </legend>
  <ul>
  	<li>
  		<label>N&uacute;mero de trabajador:</label>
		<input type="text" id="num_trabajador" name="num_trabajador" readonly="readonly" value="<?=$num_trabajador; ?>"/>
  	</li>
  	<li>
  		<label>Grado acad&eacute;mico:</label>
         <select id="grado" name="grado" disabled="disabled">                                   
                                    <option value="Dr." <? if($grado == "Dr.") echo 'selected="selected"'; ?>>Dr.</option>
                                    <option value="Dra." <? if($grado == "Dra.") echo 'selected="selected"'; ?>>Dra.</option>
                                    <option value="M.C." <? if($grado == "M.C.") echo 'selected="selected"'; ?>>M.C.</option>
                                    <option value="Lic." <? if($grado == "Lic.") echo 'selected="selected"'; ?>>Lic.</option>
                                    <option value="Licda." <? if($grado == "Licda.") echo 'selected="selected"'; ?>>Licda.</option>
                                  </select>
  	</li>
	<li>
  		<label>Nombre(s):</label>
        <input type="text" id="nombres" name="nombres" readonly="readonly" value="<?=$nombres; ?>"/>      
  	</li>
    <li>
  		<label>Apellido(s):</label>  
        <input type="text" id="apellidos" name="apellidos" readonly="readonly" value="<?=$apellidos; ?>"/>       
  	</li>
    <li>
  		<label>G&eacute;nero:</label>
        <select id="genero" name="genero" disabled="disabled">                                   
                                    <option value="Hombre" <? if($genero == "Hombre") echo 'selected="selected"'; ?>>Hombre</option>
                                    <option value="Mujer" <? if($genero == "Mujer") echo 'selected="selected"'; ?>>Mujer</option>
                                  </select>
  	</li>
    <li>
  		<label>Correo electr&oacute;nico:</label>
      <input type="text" id="mail" name="mail" readonly="readonly" value="<?=$mail; ?>"/>
  	</li>
    <li>
  		<label>Tel&eacute;fono o extensi&oacute;n directa:</label>
        <input type="text" id="tel_ext" name="tel_ext" readonly="readonly" value="<?=$tel_ext; ?>"/>
  	</li>
    <li>
  		<label>Dependencia de adscripci&oacute;n:</label>
        <input type="text" id="dependencia" name="dependencia" readonly="readonly" value="<?=$dependencia; ?>"/>
  	</li>
    <li>
  		<label>Nivel SNI:</label>
        <select id="nivelsni" name="nivelsni" disabled="disabled">                               
                                    <option value="Candidato" <? if($nivelsni == "Candidato") echo 'selected="selected"'; ?>>Candidato</option>
                                    <option value="1" <? if($nivelsni == 1) echo 'selected="selected"'; ?>>1</option>
                                    <option value="2" <? if($nivelsni == 2) echo 'selected="selected"'; ?>>2</option>
                                    <option value="3" <? if($nivelsni == 3) echo 'selected="selected"'; ?>>3</option>
                                  </select>
  	</li>
    <li>
  		<label>A&ntilde;o de ingreso al SNI:</label>
        <input type="text" id="ingresosni" name="ingresosni" readonly="readonly" value="<?=$ingresosni; ?>"/>
  	</li>
    <li>
  		<label>A&ntilde;o de vigencia SNI:</label>
        <input type="text" id="vigenciasni" name="vigenciasni" readonly="readonly" value="<?=$vigenciasni ?>"/>
  	</li>
    <li>
  		<label>&Aacute;rea de estudio:</label>
       <select id="area" name="area" disabled="disabled" >                                   
                                    <option value="fisico" <? if($area == "fisico") echo 'selected="selected"'; ?>>F&iacute;sico Matem&aacute;tico y Ciencias de la Tierra</option>
                                    <option value="biologia" <? if($area == "biologia") echo 'selected="selected"'; ?>>Biolog&iacute;a y Qu&iacute;mica</option>
                                    <option value="medicina" <? if($area == "medicina") echo 'selected="selected"'; ?>>Medicina y Ciencias de la Salud</option>
                                    <option value="humanidades" <? if($area == "humanidades") echo 'selected="selected"'; ?>>Humanidades y de la Conducta</option>
                                    <option value="sociales" <? if($area == "sociales") echo 'selected="selected"'; ?>>Sociales y Econ&oacute;mico Administrativas</option>
                                    <option value="biotecnologia" <? if($area == "biotecnologia") echo 'selected="selected"'; ?>>Biotecnolog&iacute;a y Ciencias Agropecuarias</option>
                                    <option value="ingenieria" <? if($area == "ingenieria") echo 'selected="selected"'; ?>>Ingenier&iacute;a</option>
                                    <option value="sin area" <? if($area == "sin area") echo 'selected="selected"'; ?>>Sin &aacute;rea</option>
                                  </select>
  	</li>
    <li>
  		<label>Cuerpo acad&eacute;mico:</label>
        <input type="text" id="cuerpo_acad" name="cuerpo_acad" readonly="readonly" value="<?=$cuerpo_acad; ?>"/>
  	</li>
    <li>
  		<label>LGAC:</label>
        <input type="text" id="lgac" name="lgac" readonly="readonly" value="<?=$lgac; ?>"/>
  	</li>
    <li>
  		<label>P&aacute;gina personal:</label>
        <input type="text" id="webpage" name="webpage" readonly="readonly" value="<?=$webpage; ?>"/>
  	</li>
    <li>
  		<label>Recursos t&eacute;cnicos:</label>
          <textarea id="rec_tec" name="rec_tec" readonly="readonly" cols="100" rows="5"> <?=$rec_tec; ?> </textarea>
  	</li>
    <li>
  		<label>T&eacute;cnicas de experimentaci&oacute;n:</label>
         <textarea id="tec_exp" name="tec_exp" readonly="readonly" cols="100" rows="5"> <?=$tec_exp; ?> </textarea>
  	</li>
    <li>
  		<label>Proyectos actuales:</label>
          <textarea id="proyectos_actuales" name="proyectos_actuales" readonly="readonly" cols="100" rows="5"> <?=$proyectos_actuales; ?> </textarea>
  	</li>
    <li>
  		<label>A&ntilde;o de obtenci&oacute;n del grado:</label>
        <input type="text" id="grado_ano" name="grado_ano" readonly="readonly" value="<?=$grado_ano; ?>"/>
  	</li>
    <li>
  		<label>Instituci&oacute;n de obtenci&oacute;n:</label>
        <input type="text" id="grado_instit" name="grado_instit" readonly="readonly" value="<?=$grado_instit; ?>"/>
  	</li>
    <li>
  		<label>Nombramiento:</label>
        <select id="nombramiento" name="nombramiento" disabled="disabled">                      
                                    <option value="Profesor titular A" <? if($nombramiento == "Profesor titular A") echo 'selected="selected"'; ?>>Profesor titular A</option>
                                    <option value="Profesor titular B" <? if($nombramiento == "Profesor titular B") echo 'selected="selected"'; ?>>Profesor titular B</option>
                                    <option value="Profesor titular C" <? if($nombramiento == "Profesor titular C") echo 'selected="selected"'; ?>>Profesor titular C</option>
                                    <option value="Profesor asociado A" <? if($nombramiento == "Profesor asociado A") echo 'selected="selected"'; ?>>Profesor asociado A</option>
                                    <option value="Profesor asociado B" <? if($nombramiento == "Profesor asociado B") echo 'selected="selected"'; ?>>Profesor asociado B</option>
                                    <option value="Profesor asociado C" <? if($nombramiento == "Profesor asociado C") echo 'selected="selected"'; ?>>Profesor asociado C</option>
                                    <option value="Otro" <? if($nombramiento == "Otro") echo 'selected="selected"'; ?>>Otro</option>
                                  </select>
  	</li>
    <li>
  		<label>&iquest;Perfil PROMEP?:</label>
         <select id="promep" name="promep" disabled="disabled">                                  
                                    <option value="si"  <? if($promep == "si") echo 'selected="selected"'; ?>>Si</option>
                                    <option value="no"  <? if($promep == "no") echo 'selected="selected"'; ?>>No</option>
                                  </select>
  	</li>
    <li>
  		<label>A&ntilde;o de ingreso al PROMEP:</label>
        <input type="text" id="ingresoprom" name="ingresoprom" readonly="readonly" value="<?=$ingresoprom; ?>"/>
  	</li>
    <li>
  		<label>A&ntilde;o de vigencia PROMEP:</label>
        <input type="text" id="vigenciaprom" name="vigenciaprom" readonly="readonly" value="<?=$vigenciaprom ?>"/>
  	</li>
    <li>
  		<label>Publicaciones:</label>
        <textarea id="publicaciones" name="publicaciones" readonly="readonly" cols="100" rows="5"><?=$publicaciones; ?></textarea>
  	</li>
	</ul>
	</fieldset>
</form>

<?
}else{
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3> No has seleccionado ningun PTC para modificar. <br /><br /><a class='link' href='admin_ptc.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
</body>
</html>
