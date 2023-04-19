<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
width:300px;
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
	var conf = confirm("¿Deseas eliminar este investigador?");
	if(conf){
		return true;
	}else{
		return false;
		}
}
</script>
</head>

<body>
<? include('../conexion.php'); ?>

<a href="index.php" class="large button green">Men&uacute; principal</a>
<a href="form_agregar_sni.php" class="large button green">Agregar nuevo investigador SNI</a>
<br />
<br />

<table id="admin_sni">
	<tr id="titular">
		<td class="td_id">Id</td>
		<td class="td_descripcion">Nombre</td>
		<td class="td_link">&Aacute;rea</td>
		<td class="td_fecha">Nivel</td>
		<td class="td_acciones">Vigencia</td>
        <td class="td_udec">U de C</td>
		<td class="td_acciones">e-mail</td>     
        <td class="td_acciones">Acciones</td> 
        <td>Vigente</td>        
	</tr>

<?
$consulta = mysql_query("SELECT * FROM sniinvestigadores ORDER BY apellido ASC");
 
	$i=1;
	  while($registros = mysql_fetch_array($consulta))
	  	{
			$id = $registros['id'];
			$grado = $registros['grado'];
			$nombre = $registros['nombre'];
			$apellido = $registros['apellido'];
			$area = $registros['area'];
			$nivel = $registros['nivelsni'];
			$vigencia = $registros['vigencia'];
			$udec = $registros['udec'];
			$mail = $registros['mail'];			
			$vigente = $registros['vigente'];			
					
 ?>
	<tr>
		<td><? echo $i; ?></td>
		<td class="td_descripcionjust"><? echo $grado.' '.$apellido.', '.$nombre; ?></td>
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
		<td><? echo $nivel; ?></td>
        <td><? echo $vigencia; ?></td>
        <td><? echo $udec; ?></td>
        <td><? echo $mail; ?></td>
		<td> <a href="form_mod_sni.php?id=<?=$id ?>"> <img src="../icono_modificar.gif" alt='Modificar' title="Modificar" border='0' width='30' height='30' /> </a> <a href="eliminar_sni.php?id=<?=$id; ?>" onclick="return confirmar()"> <img src="../icono_borrado.gif" alt='Eliminar' title="Eliminar" border='0' width='30' height='30' /> </a></td>
         <td><input type="checkbox" name="vigente" id="vigente" <? if($vigente == 0){}else{echo 'checked="checked"';}?> onclick="location.href='vigente_sni.php?id=<?=$id ?>&vigente=<? if($vigente == 0){echo 1;}else{echo 0;} echo"'"; ?>" /></td>
	</tr>
	<? $i++; 
	  } ?>
</table>
</body>
</html>
