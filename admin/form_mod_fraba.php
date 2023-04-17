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
if(isset($_GET['id']))
{
include("../conexion.php");

$id = $_GET['id'];

$consulta = mysql_query("SELECT * FROM fraba WHERE id='$id'") or die(mysql_error()."</br></br></br> Error: Ha ocurrido un error al buscar el registro</center>");

$registros = mysql_fetch_array($consulta);
	  	
			$convocatoria = $registros['convocatoria'];
			$ano = $registros['ano'];
			$referencia = $registros['referencia'];
			$apellidos = $registros['apellidos'];
			$nombres = $registros['nombres'];
			$titulo = $registros['titulo'];
			$objetivo = $registros['objetivo'];
			$dependencia = $registros['dependencia'];
			$grado = $registros['grado'];
			$correo = $registros['correo'];

					
?>
<a href="admin_fraba.php" class="large button green">Cancelar...</a>

<form id="sni" name="sni" method="post" action="update_fraba.php?id=<?=$id;  ?>">
  <fieldset id="usuario">
  <legend> Modificar proyecto FRABA: </legend>
  <ul>
  	<li>
  		<label>Convocatoria:</label>
    
        <select id="convocatoria" name="convocatoria">
                                    <option value="1" <? if($convocatoria == "1") echo'selected="selected"'; ?>>1</option>
                                    <option value="2" <? if($convocatoria == "2") echo'selected="selected"'; ?>>2</option>
                                    <option value="3" <? if($convocatoria == "3") echo'selected="selected"'; ?>>3</option>
                                    <option value="4" <? if($convocatoria == "4") echo'selected="selected"'; ?>>4</option>
                                    <option value="5" <? if($convocatoria == "5") echo'selected="selected"'; ?>>5</option>
                                    <option value="6" <? if($convocatoria == "6") echo'selected="selected"'; ?>>6</option>
                                    <option value="7" <? if($convocatoria == "7") echo'selected="selected"'; ?>>7</option>
                                    <option value="8" <? if($convocatoria == "8") echo'selected="selected"'; ?>>8</option>
                                    <option value="9" <? if($convocatoria == "9") echo'selected="selected"'; ?>>9</option>
                                    <option value="10" <? if($convocatoria == "10") echo'selected="selected"'; ?>>10</option>
                                    <option value="11" <? if($convocatoria == "11") echo'selected="selected"'; ?>>11</option>
                                    <option value="12" <? if($convocatoria == "12") echo'selected="selected"'; ?>>12</option>
                                    <option value="13" <? if($convocatoria == "13") echo'selected="selected"'; ?>>13</option>
                                  </select>
  	</li>
  	<li>
  		<label>A&ntilde;o:</label>
         
        <select id="ano" name="ano">
                                    <option value="2000" <? if($ano == "2000") echo'selected="selected"'; ?>>2000</option>
                                    <option value="2001" <? if($ano == "2001") echo'selected="selected"'; ?>>2001</option>
                                    <option value="2002" <? if($ano == "2002") echo'selected="selected"'; ?>>2002</option>
                                    <option value="2003" <? if($ano == "2003") echo'selected="selected"'; ?>>2003</option>
                                    <option value="2004" <? if($ano == "2004") echo'selected="selected"'; ?>>2004</option>
                                    <option value="2005" <? if($ano == "2005") echo'selected="selected"'; ?>>2005</option>
                                    <option value="2006" <? if($ano == "2006") echo'selected="selected"'; ?>>2006</option>
                                    <option value="2007" <? if($ano == "2007") echo'selected="selected"'; ?>>2007</option>
                                    <option value="2008" <? if($ano == "2008") echo'selected="selected"'; ?>>2008</option>
                                    <option value="2009" <? if($ano == "2009") echo'selected="selected"'; ?>>2009</option>
                                    <option value="2010" <? if($ano == "2010") echo'selected="selected"'; ?>>2010</option>
                                    <option value="2011" <? if($ano == "2011") echo'selected="selected"'; ?>>2011</option>
                                    <option value="2012" <? if($ano == "2012") echo'selected="selected"'; ?>>2012</option>
                                  </select>
  	</li>
	<li>
  		<label>Referencia:</label>
        <input type="text" id="referencia" name="referencia" value="<?=$referencia; ?>" />
  	</li>
     <li>
  		<label>Grado Acad&eacute;mico:</label>
       
        
        <select id="grado" name="grado">
                                    <option selected> ... </option>
                                    <option value="Dr." <? if($grado == "Dr.") echo'selected="selected"'; ?>>Dr.</option>
                                    <option value="Dra." <? if($grado == "Dra.") echo'selected="selected"'; ?>>Dra.</option>
                                    <option value="M.C." <? if($grado == "M.C.") echo'selected="selected"'; ?>>M.C.</option>
                                    <option value="Lic." <? if($grado == "Lic.") echo'selected="selected"'; ?>>Lic.</option>
                                    <option value="Licda." <? if($grado == "Licda.") echo'selected="selected"'; ?>>Licda.</option>
                                  </select>
  	</li>
    <li>
  		<label>Apellidos Responsable:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?=$apellidos;?>" />
  	</li>
     <li>
  		<label>Nombre(s) Responsable:</label>
        <input type="text" id="nombres" name="nombres" value="<?=$nombres;?>" />
  	</li>
    <li>
  		<label>T&iacute;tulo del proyecto:</label>
        <input type="text" id="titulo" name="titulo" value="<?=$titulo; ?>" />
  	</li>
     <li>
  		<label>Objetivo:</label>
       <textarea id="objetivo" name="objetivo" rows="5"><?=$objetivo; ?></textarea>
  	</li>
    <li>
  		<label>Dependencia:</label>
        <input type="text" id="dependencia" name="dependencia" value="<?=$dependencia; ?>" />
  	</li>
    <li>
  		<label>E-mail Responsable:</label>
        <input type="text" id="correo" name="correo" value="<?=$correo; ?>" />
  	</li>
	</ul>
	</fieldset>
 	<input name="enviar" type="submit" id="submit" value="Enviar..." />

</form>
<?
}else{
	echo"<br /><br /><br /><br /><br /><br /><br /><table border='1' align='center' width='450px' height='226'>
<tr>
  <td height='220' background='error_black.png'><table align='right' border='0' width='345px' height='145px'><tr><td><center><h3> No has seleccionado ninguna noticia para modificar. <br /><br /><a class='link' href='admin_fraba.php'>Regresar...</a></h3></center></td></tr></table></td>
</tr>
</table>";
	}
?>
</body>
</html>
