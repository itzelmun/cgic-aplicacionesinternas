<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="utf-8"/>
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
body{
	text-align:justify;
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

<br />
<br />

<ul>
<?
//$consulta = mysql_query("SELECT * FROM articulos ORDER BY id DESC");
$consulta = mysql_query("SELECT titulo, autores, editorial FROM articulos ORDER BY autores");

 
	$i=1;
	  while($registros = mysql_fetch_array($consulta))
	  	{
			//$id = $registros['id'];
			//$fuente = $registros['fuente'];
			$titulo = trim($registros['titulo']);
			$autores = $registros['autores'];
			//$apellido = $registros['nombreCompleto'];
			$nombre = $registros['nombre'];			
			//$area = $registros['area'];
			//$year = $registros['year'];  
			$editorial = $registros['editorial'];
			//$vigente = $registros['vigente'];
			//$doi = $registros['doi'];
			//$comentarios = $registros['comentarios'];
			
 ?>
	
    	<li><?=$autores." \"".$titulo."\". ".$editorial?></li>
        <br />
  		
	<? $i++; 
	  } ?>

</ul>

</body>
</html>
