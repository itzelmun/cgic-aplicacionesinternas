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
include('../../conexion.php'); 
$fecha = date("Y-m-d");

$consulta1 = mysql_query("SELECT id, nombre, apellido, area FROM sniinvestigadores ORDER BY apellido ASC");
$consulta2 = mysql_query("SELECT id, nombre, apellido, area FROM sniinvestigadores ORDER BY apellido ASC");
$consulta3 = mysql_query("SELECT id, nombre, apellido, area FROM sniinvestigadores ORDER BY apellido ASC");
$consulta4 = mysql_query("SELECT id, nombre, apellido, area FROM sniinvestigadores ORDER BY apellido ASC");
			
 ?>
<a href="admin_publicaciones.php" class="large button green">Cancelar...</a>
<br />

<form id="sni" name="sni" method="post" action="alta_publicacion.php">
  <fieldset id="usuario">
  <legend> Agregar nueva publicaci&oacute;n: </legend>
  <ul>
  
  	<li>
  		<label>Fuente:</label>
        <select id="fuente" name="fuente" >
        	<option selected="selected" value=""> ... </option>
            <option value="SCOPUS">SCOPUS</option>
            <option value="PUBMED">PUBMED</option>
            <option value="otro">Otro</option>                            
        </select>
        
  	</li>
    <li>
  		<label>Título:</label>
        <textarea name="titulo" id="titulo">
        
        </textarea>
  	</li>
    <li>
  		<label>Autores todos:</label>
        <textarea name="autores" id="autores">
        
        </textarea>        
  	</li>
    <li>
  		<label>Autor ucol 1:</label>
         <select id="autor1" name="autor1" >
         	<option selected="selected" value=""> ... </option>
          <?
        	 while($registros = mysql_fetch_array($consulta1)){
				$idSni = $registros['id'];
				$nombre = $registros['nombre'];
				$apellido = $registros['apellido'];
				$area = $registros['area'];	
				
				$nombreCompleto = $apellido." ".$nombre." - ".$area;
			?>	
				<option value="<?=$idSni?>"><?=$nombreCompleto?></option>
		<? } ?>
			                           
        </select>
        
        
  	</li>
    <li>
  		<label>Autor ucol 2:</label>
         <select id="autor2" name="autor2" >
         	<option selected="selected" value=""> ... </option>
          <?
        	 while($registros = mysql_fetch_array($consulta2)){
				$idSni = $registros['id'];
				$nombre = $registros['nombre'];
				$apellido = $registros['apellido'];
				$area = $registros['area'];	
				
				$nombreCompleto = $apellido." ".$nombre." - ".$area;
			?>	
				<option value="<?=$idSni?>"><?=$nombreCompleto?></option>
		<? } ?>
			                           
        </select>
        
  	</li>
    <li>
  		<label>Autor ucol 3:</label>
        <select id="autor3" name="autor3" >
         	<option selected="selected" value=""> ... </option>
          <?
        	 while($registros = mysql_fetch_array($consulta3)){
				$idSni = $registros['id'];
				$nombre = $registros['nombre'];
				$apellido = $registros['apellido'];
				$area = $registros['area'];	
				
				$nombreCompleto = $apellido." ".$nombre." - ".$area;
			?>	
				<option value="<?=$idSni?>"><?=$nombreCompleto?></option>
		<? } ?>
			                           
        </select>
       
  	</li>
    <li>
  		<label>Autor ucol 4:</label>
         <select id="autor4" name="autor4" >
         	<option selected="selected" value=""> ... </option>
          <?
        	 while($registros = mysql_fetch_array($consulta4)){
				$idSni = $registros['id'];
				$nombre = $registros['nombre'];
				$apellido = $registros['apellido'];
				$area = $registros['area'];	
				
				$nombreCompleto = $apellido." ".$nombre." - ".$area;
			?>	
				<option value="<?=$idSni?>"><?=$nombreCompleto?></option>
		<? } ?>
			                           
        </select>
        
  	</li>
    <li>
  		<label>Área:</label>
        <select id="area" name="area" >
        	<option selected="selected" value=""> ... </option>
            <option value="fisico">Físico Matemático y Ciencias de la Tierra</option>
            <option value="biologia">Biología y Química</option>
            <option value="medicina">Medicina y Ciencias de la Salud</option>
            <option value="humanidades">Humanidades y de la Conducta</option>
            <option value="sociales">Sociales y Económico Administrativas</option>
            <option value="biotecnologia">Biotecnología y Ciencias Agropecuarias</option>
            <option value="ingenieria">Ingeniería</option>
        </select>
  	</li>
    <li>
  		<label>Año:</label>
        
        <select id="year" name="year" >
        	<option selected="selected" value=""> ... </option>
            <? for($i = 2015; $i <= 2025; $i++){ ?>
            	<option value="<?=$i?>"> <?=$i?> </option>
			<? } ?>                        
        </select>
  	</li>
    <li>
  		<label>Editorial:</label>
         <textarea name="editorial" id="editorial">
        
        </textarea>
  	</li>
   
    <li>
  		<label>DOI:</label>
        <input type="text" id="doi" name="doi" />
  	</li>
  	<li>
  		<label>Comentarios:</label>
        <textarea name="comentarios" id="comentarios">
        
        </textarea>
  	</li>
    <li>
  		<label>Fecha de inserción:</label>
        <input type="text" id="fechaInsert" name="fechaInsert" value="<?=$fecha?>" />
  	</li>
	</ul>
	</fieldset>
 	<input name="enviar" type="submit" id="submit" value="Enviar..." />

</form>
</body>
</html>
