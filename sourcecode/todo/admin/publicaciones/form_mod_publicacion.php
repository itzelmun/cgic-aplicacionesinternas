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

include("../../conexion.php");

echo $id = $_GET['id'];

$consulta = mysql_query("SELECT a.fuente, a.titulo, a.autores, a.area, a.year, a.editorial, a.vigente, a.comentarios, a.fechaInsert, sa.idSni, sa.id
FROM ((articulos AS a
INNER JOIN sniarticulos AS sa ON a.id = sa.idArticulo)
INNER JOIN sniinvestigadores AS si ON sa.idSni = si.id) WHERE a.id=$id");

	 $i=0;
	 while($registros = mysql_fetch_array($consulta)){
			$idSniArticulo[$i] = $registros['id'];			
			//echo $idSniArticulo = $registros['sa.id'];
			//$idSni = $registros['idSni'];
				$idAutores[$i] = $registros['idSni'];			
			$fuente = $registros['fuente'];
			$titulo = $registros['titulo'];
			$autores = $registros['autores'];			
			$nombre = $registros['nombre'];			
			$areaArticulo = $registros['area'];
			$year = $registros['year'];
			$editorial = $registros['editorial'];
			$vigente = $registros['vigente'];
			$doi = $registros['doi'];
			$comentarios = $registros['comentarios'];
			$fechaInsert = $registros['fechaInsert'];
			$i++;
	 }
	 
//$cantidadAutores = count($idAutores); //cantidad de autores de la UCOL en el artículo
/*
for($i = 0; $i <= $cantidadAutores; $i++){ //hacer una consulta por cada autor para su SELECT respectivo
	$consultaAutor[$i] = mysql_query("SELECT * FROM sniinvestigadores WHERE id=$idAutores[$i]");
}
*/
//consultas para cada SELECT de cada investigador (del 1 al 4)
$consulta1 = mysql_query("SELECT id, nombre, apellido, area FROM sniinvestigadores ORDER BY apellido ASC");
$consulta2 = mysql_query("SELECT id, nombre, apellido, area FROM sniinvestigadores ORDER BY apellido ASC");
$consulta3 = mysql_query("SELECT id, nombre, apellido, area FROM sniinvestigadores ORDER BY apellido ASC");
$consulta4 = mysql_query("SELECT id, nombre, apellido, area FROM sniinvestigadores ORDER BY apellido ASC");

echo $autoresOld = "a1=$idAutores[0]&a2=$idAutores[1]&a3=$idAutores[2]&a4=$idAutores[3]";
echo $idSniArticulo = "idsa1=$idSniArticulo[0]&idsa2=$idSniArticulo[1]&idsa3=$idSniArticulo[2]&idsa4=$idSniArticulo[3]";

 ?>
				
<a href="admin_publicaciones.php" class="large button green">Cancelar...</a>
<br />

<form id="sni" name="sni" method="post" action="update_publicacion.php?id=<?=$id?>&<?=$autoresOld?>&<?=$idSniArticulo?>">
  <fieldset id="usuario">
  <legend> Agregar nueva publicaci&oacute;n: </legend>
  <ul>
  
  	<li>
  		<label>Fuente:</label>
        <select id="fuente" name="fuente" >
        	<option selected="selected" value=""> ... </option>
            <option value="SCOPUS" <? if($fuente == "SCOPUS"){echo "selected='selected'";} ?> >SCOPUS</option>
            <option value="PUBMED" <? if($fuente == "PUBMED"){echo "selected='selected'";} ?> >PUBMED</option>
            <option value="otro" <? if($fuente == "otro"){echo "selected='selected'";} ?> >Otro</option>                            
        </select>
        
  	</li>
    <li>
  		<label>Título:</label>
        <textarea name="titulo" id="titulo"><?=$titulo?></textarea>

  	</li>
     <li>
  		<label>Autores todos:</label>
        <textarea name="autores" id="autores"><?=$autores?></textarea>        
  	</li>
    <li>
  		<label>Autor 1:</label>
         <select id="autor1" name="autor1" >
         	<option value=""> ... </option>
          <?
        	 while($registros = mysql_fetch_array($consulta1)){
				$idSni = $registros['id'];
				$nombre = $registros['nombre'];
				$apellido = $registros['apellido'];
				$area = $registros['area'];	
				
				$nombreCompleto = $apellido." ".$nombre." - ".$area;
			?>	
				<option value="<?=$idSni?>" <? if($idSni == $idAutores[0]){echo "selected='selected'";} ?> ><?=$nombreCompleto?></option>
		<? } ?>
			                           
        </select>
        
        
  	</li>
    <li>
  		<label>Autor 2:</label>
         <select id="autor2" name="autor2" >
         	<option value=""> ... </option>
          <?
        	 while($registros = mysql_fetch_array($consulta2)){
				$idSni = $registros['id'];
				$nombre = $registros['nombre'];
				$apellido = $registros['apellido'];
				$area = $registros['area'];	
				
				$nombreCompleto = $apellido." ".$nombre." - ".$area;
			?>	
				<option value="<?=$idSni?>" <? if($idSni == $idAutores[1]){echo "selected='selected'";} ?> ><?=$nombreCompleto?></option>
		<? } ?>
			                           
        </select>
        
  	</li>
    <li>
  		<label>Autor 3:</label>
        <select id="autor3" name="autor3" >
         	<option value=""> ... </option>
          <?
        	 while($registros = mysql_fetch_array($consulta3)){
				$idSni = $registros['id'];
				$nombre = $registros['nombre'];
				$apellido = $registros['apellido'];
				$area = $registros['area'];	
				
				$nombreCompleto = $apellido." ".$nombre." - ".$area;
			?>	
				<option value="<?=$idSni?>" <? if($idSni == $idAutores[2]){echo "selected='selected'";} ?> ><?=$nombreCompleto?></option>
		<? } ?>
			                           
        </select>
       
  	</li>
    <li>
  		<label>Autor 4:</label>
         <select id="autor4" name="autor4" >
         	<option value=""> ... </option>
          <?
        	 while($registros = mysql_fetch_array($consulta4)){
				$idSni = $registros['id'];
				$nombre = $registros['nombre'];
				$apellido = $registros['apellido'];
				$area = $registros['area'];	
				
				$nombreCompleto = $apellido." ".$nombre." - ".$area;
			?>	
				<option value="<?=$idSni?>" <? if($idSni == $idAutores[3]){echo "selected='selected'";} ?> ><?=$nombreCompleto?></option>
		<? } ?>
			                           
        </select>
        
  	</li>
    <li>
  		<label>Área:</label>
        <select id="area" name="area" >
        	<option value=""> ... </option>
            <option value="fisico" <? if($areaArticulo == "fisico"){echo "selected='selected'";} ?> >Físico Matemático y Ciencias de la Tierra</option>
            <option value="biologia" <? if($areaArticulo == "biologia"){echo "selected='selected'";} ?> >Biología y Química</option>
            <option value="medicina" <? if($areaArticulo == "medicina"){echo "selected='selected'";} ?> >Medicina y Ciencias de la Salud</option>
            <option value="humanidades" <? if($areaArticulo == "humanidades"){echo "selected='selected'";} ?> >Humanidades y de la Conducta</option>
            <option value="sociales" <? if($areaArticulo == "sociales"){echo "selected='selected'";} ?> >Sociales y Económico Administrativas</option>
            <option value="biotecnologia" <? if($areaArticulo == "biotecnologia"){echo "selected='selected'";} ?> >Biotecnología y Ciencias Agropecuarias</option>
            <option value="ingenieria" <? if($areaArticulo == "ingenieria"){echo "selected='selected'";} ?> >Ingeniería</option>
        </select>
  	</li>
    <li>
  		<label>Año:</label>
        
        <select id="year" name="year" >
        	<option value=""> ... </option>
            <? for($i = 2015; $i <= 2025; $i++){ ?>
            	<option value="<?=$i?>" <? if($year == $i){echo "selected='selected'";} ?> > <?=$i?> </option>
			<? } ?>                        
        </select>
  	</li>
    <li>
  		<label>Editorial:</label>
         <textarea name="editorial" id="editorial"><?=$editorial?></textarea>
  	</li>
   
    <li>
  		<label>DOI:</label>
        <input type="text" id="doi" name="doi" value="<?=$doi?>" />
  	</li>
  	<li>
  		<label>Comentarios:</label>
        <textarea name="comentarios" id="comentarios"><?=$comentarios?></textarea>
  	</li>
    <li>
  		<label>Fecha de inserción:</label>
        <input type="text" id="fechaInsert" name="fechaInsert" value="<?=$fechaInsert?>" disabled="disabled" />
  	</li>
	</ul>
	</fieldset>
 	<input name="enviar" type="submit" id="submit" value="Enviar..." />

</form>
</body>
</html>