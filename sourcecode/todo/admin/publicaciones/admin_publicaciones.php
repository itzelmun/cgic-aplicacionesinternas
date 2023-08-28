<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="utf-8"/>
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
body{
	text-align:center;
	}
table#admin_sni{
border-collapse:collapse;
border: 1px solid;
text-align:center;
margin:0 auto;
}
td{
border: 1px solid #000;
padding: 5px 10px;
}
tr#titular{
background:#2CA93C;
color:#FFFFFF;
}
.td_id{
width: 30px;
}
.td_descripcion{
width:100px;
}
.td_descripcionjust{
text-align:justify;
}
.td_link{
width: 200px;
}
.td_fecha{
width: 100px;
}
.td_udec{
width: 20px;
}
.td_acciones{
width: 100px;
}
/*para alternar el color entre las filas*/
tr:nth-child(odd){ background: #C0D554;}
tr:nth-child(even){ background: #FFFFFF;}



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
function confirmar(){
	var conf = confirm("¿Deseas eliminar esta publicación?");
	if(conf){
		return true;
	}else{
		return false;
		}
}
</script>
</head>

<body>
<? include('../../conexion.php'); ?>

<a href="../index.php" class="large button green">Men&uacute; principal</a>
<a href="form_agregar_publicacion.php" class="large button green">Agregar nueva publicaci&oacute;n</a>
<br />
<br />

<table id="admin_sni">
	<tr id="titular">
		<td class="td_id">Id</td>
		<td class="td_descripcion">Fuente</td>
		<td class="td_link">Título</td>
        <td class="td_fecha">Autores</td>
		<td class="td_fecha">Autor UCOL</td>
		<td class="td_acciones">Área</td>
        <td class="td_acciones">Año</td>        
        <td class="td_acciones">Editorial / Publisher</td>        
        <td class="td_acciones">Vigente</td>        
        <td class="td_acciones">DOI</td>        
        <td class="td_acciones">Comentarios</td>   
        <td class="td_acciones">Acciones</td>     
	</tr>

<?
//$consulta = mysql_query("SELECT * FROM articulos ORDER BY id DESC");
$consulta = mysql_query("SELECT a.id, a.fuente, a.titulo, a.autores, a.area, a.year, a.editorial, a.vigente, a.comentarios, sa.idArticulo, GROUP_CONCAT(si.apellido, ', ', si.nombre ORDER BY si.apellido SEPARATOR '<br>') AS nombreCompleto
FROM ((articulos AS a
INNER JOIN sniarticulos AS sa ON a.id = sa.idArticulo)
INNER JOIN sniinvestigadores AS si ON sa.idSni = si.id) GROUP BY a.id");

 
	$i=1;
	  while($registros = mysql_fetch_array($consulta))
	  	{
			$id = $registros['id'];
			$fuente = $registros['fuente'];
			$titulo = $registros['titulo'];
			$autores = $registros['autores'];
			$apellido = $registros['nombreCompleto'];
			$nombre = $registros['nombre'];			
			$area = $registros['area'];
			$year = $registros['year'];
			$editorial = $registros['editorial'];
			$vigente = $registros['vigente'];
			$doi = $registros['doi'];
			$comentarios = $registros['comentarios'];
 ?>
	<tr>
		<td><?=$i?></td>
        <td><?= $fuente; ?></td>
		<td class="td_descripcionjust"><?= $titulo; ?></td>
        <td><?=$autores?></td>
		<td><?=$apellido." ".$nombre?></td>
        <td><? switch($area){
												case "fisico":
												echo "F&iacute;sico Matem&aacute;tico y Ciencias de la Tierra";
												break;
												
												case "biologia":
												echo "Biolog&iacute;a y Qu&iacute;mica";
												break;
												
												case "medicina":
												echo "Medicina y Ciencias de la Salud";
												break;
												
												case "humanidades":
												echo "Humanidades y de la Conducta";
												break;
												
												case "sociales":
												echo "Sociales y Econ&oacute;mico Administrativas";
												break;
												
												case "biotecnologia":
												echo "Biotecnolog&iacute;a y Ciencias Agropecuarias";
												break;
												
												case "ingenieria":
												echo "Ingenier&iacute;a";
												break;		
											
											} ?></td>
        <td><?= $year; ?></td>
        <td><?= $editorial; ?></td>
        <td><input type="checkbox" name="vigente" id="vigente" <? if($vigente == 0){}else{echo 'checked="checked"';}?> onclick="location.href='vigente_publicacion.php?id=<?=$id?>&vigente=<? if($vigente == 0){echo 1;}else{echo 0;} echo"'"; ?>" /></td>
        <td><?= $doi; ?></td>
        <td><?= $comentarios; ?></td>
       
        
		<td> <a href="form_mod_publicacion.php?id=<?=$id?>"> <img src="../icono_modificar.gif" alt='Modificar' title="Modificar" border='0' width='30' height='30' /> </a> <a href="eliminar_publicacion.php?id=<?=$id; ?>" onclick="return confirmar()"> <img src="../icono_borrado.gif" alt='Eliminar' title="Eliminar" border='0' width='30' height='30' /> </a></td>
	</tr>
	<? $i++; 
	  } ?>
</table>
</body>
</html>
