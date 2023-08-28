<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Documento sin título</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<style type="text/css">
	body {
	/*font-family:Georgia, "Times New Roman", Times, serif;*/
	
	/*font-family:"Courier New", Courier, monospace;*/
	/*font-family:Arial, Helvetica, sans-serif;*/
	/*font-family:Tahoma, Geneva, sans-serif;*/
	/*font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;*/
	/*font-family:"Arial Black", Gadget, sans-serif;*/
	/*font-family:"Times New Roman", Times, serif;*/
	/*font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
	/*font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;*/
	/*font-family:"MS Serif", "New York", serif;*/
	/*font-family:"Lucida Console", Monaco, monospace;*/
	/*font-family:"Comic Sans MS", cursive;*/
	
	
	font-weight:normal;
	font-size:10pt;
	color:black;
	margin:auto;
	width:800px;
	padding:0px;
	background-image: url('background.gif');
   }
   
   
      td{
	   padding: 2px;
	   }
 	th{
		text-align:center;
	}
</style>
</head>

<body>
<center>
<h2>Agencia de Autos</h2>
<a href="form_alta.php">Registrar auto</a>
<br /><br />

<?php
	//ordenar por marca
	if(isset($_GET['marcaOrden'])){		
		$orden = ($_GET['marcaOrden'] == "asc" || $_GET['marcaOrden'] == "") ? "desc" : "asc";
		$iconMarca = ($_GET['marcaOrden'] == "asc" || $_GET['marcaOrden'] == "") ? "<span class='glyphicon glyphicon-triangle-top'></span>" : "<span class='glyphicon glyphicon-triangle-bottom'></span>";
	}
	//ordenar por modelo
	if(isset($_GET['modeloOrden'])){		
		$orden = ($_GET['modeloOrden'] == "asc" || $_GET['modeloOrden'] == "") ? "desc" : "asc";
		$iconModelo = ($_GET['modeloOrden'] == "asc" || $_GET['modeloOrden'] == "") ? "<span class='glyphicon glyphicon-triangle-top'></span>" : "<span class='glyphicon glyphicon-triangle-bottom'></span>";
	}
	//ordenar por año
	if(isset($_GET['yearOrden'])){		
		$orden = ($_GET['yearOrden'] == "asc" || $_GET['yearOrden'] == "") ? "desc" : "asc";
		$iconAno = ($_GET['yearOrden'] == "asc" || $_GET['yearOrden'] == "") ? "<span class='glyphicon glyphicon-triangle-top'></span>" : "<span class='glyphicon glyphicon-triangle-bottom'></span>";
	}
	//ordenar por tipo
	if(isset($_GET['tipoOrden'])){		
		$orden = ($_GET['tipoOrden'] == "asc" || $_GET['tipoOrden'] == "") ? "desc" : "asc";
		$iconTipo = ($_GET['tipoOrden'] == "asc" || $_GET['tipoOrden'] == "") ? "<span class='glyphicon glyphicon-triangle-top'></span>" : "<span class='glyphicon glyphicon-triangle-bottom'></span>";
	}
	//ordenar por pais
	if(isset($_GET['paisOrden'])){		
		$orden = ($_GET['paisOrden'] == "asc" || $_GET['paisOrden'] == "") ? "desc" : "asc";
		$iconPais = ($_GET['paisOrden'] == "asc" || $_GET['paisOrden'] == "") ? "<span class='glyphicon glyphicon-triangle-top'></span>" : "<span class='glyphicon glyphicon-triangle-bottom'></span>";
	}
	
?>

<table border="1" width="900px">
	<tr>
    	<th>No.</th>
    	<th><a href="index.php?marcaOrden=<?=$orden?>">Marca <?=$iconMarca?></th>
        <th><a href="index.php?modeloOrden=<?=$orden?>">Modelo <?=$iconModelo?></a></th>
        <th><a href="index.php?yearOrden=<?=$orden?>">Año <?=$iconAno?></a></th>
        <th><a href="index.php?tipoOrden=<?=$orden?>">Tipo <?=$iconTipo?></a></th>
        <th>Color</th>
        <th><a href="index.php?paisOrden=<?=$orden?>">Pais <?=$iconPais?></a></th>
        <th>Equipo</th>
        <th width="25%">Comentarios</th>
        <th>Acciones</th>
    </tr>
<?php
	include "conexion.php"; //incluir la conexion
	//consultas de orden de columnas
		if(isset($_GET['marcaOrden'])) //por marca
			$sql = ($_GET['marcaOrden'] == "desc") ? "SELECT * FROM auto ORDER BY marca DESC" : "SELECT * FROM auto ORDER BY marca ASC";
			
		else if(isset($_GET['modeloOrden'])) //por modelo
			$sql = ($_GET['modeloOrden'] == "desc") ? "SELECT * FROM auto ORDER BY modelo DESC" : "SELECT * FROM auto ORDER BY modelo ASC";
			
		else if(isset($_GET['yearOrden'])) //por año
			$sql = ($_GET['yearOrden'] == "desc") ? "SELECT * FROM auto ORDER BY ano DESC" : "SELECT * FROM auto ORDER BY ano ASC";
			
		else if(isset($_GET['tipoOrden'])) //por tipo
			$sql = ($_GET['tipoOrden'] == "desc") ? "SELECT * FROM auto ORDER BY tipo DESC" : "SELECT * FROM auto ORDER BY tipo ASC";	
				
		else if(isset($_GET['paisOrden'])) //por pais
			$sql = ($_GET['paisOrden'] == "desc") ? "SELECT * FROM auto ORDER BY pais DESC" : "SELECT * FROM auto ORDER BY pais ASC";
	
		else
			$sql = "SELECT * FROM auto";
	//ejecutar la consulta
	$consulta = mysqli_query($cnx, $sql);
	//recopilar los datos
	if(mysqli_num_rows($consulta) > 0){ //si hay resultados, entonces
	$i = 1;
		while($fila = mysqli_fetch_array($consulta)){ //imprimir cada resultado
			$id = $fila['id'];
			$marca = $fila['marca'];
			$modelo = $fila['modelo'];
			$ano = $fila['ano'];
			$tipo = $fila['tipo'];
			$color = $fila['color'];
			$pais = $fila['pais'];
			switch($pais){
				case "Alemania":	$bandera = "alemania.png";
									break;
				case "Estados Unidos":	$bandera = "usa.png";
									break;
				case "Japon":	$bandera = "japon.png";
									break;
				case "Francia":	$bandera = "francia.gif";
									break;
				case "Korea":	$bandera = "korea.gif";
									break;
			}
				$eqQuema = $fila['eqQuema'];
				$eqFaros = $fila['eqFaros'];
				$eqRines = $fila['eqRines'];
			$comentarios = $fila['comentarios'];
			$equipo = "";
			if($eqQuema == true)
				$equipo .= "-Quemacocos<br />";
			if($eqFaros == true)
				$equipo .= "-Faros de niebla<br />";
			if($eqRines == true)
				$equipo .= "-Rines de aluminio";
			
			
			echo "<tr>";
			echo "	<td>".$i."</td>";
			echo "	<td>".$marca."</td>";
			echo "	<td>".$modelo."</td>";
			echo "	<td>".$ano."</td>";
			echo "	<td>".$tipo."</td>";
			echo "	<td>".$color."</td>";
			echo "	<td><img src='".$bandera."' width='30px' height='25px'/></td>";
			echo "	<td>".$equipo."</td>";
			echo "	<td>".$comentarios."</td>";
			echo "	<td><a href='form_modificar.php?id=$id'>Modificar</a> ||
				 		<a href='confirmarEliminar.php?id=$id'>Eliminar</a></td>";
			echo "</tr>";
			$i++;
		}
	}else{
		echo "No hay resultados para la consulta...";
	}
	
	mysqli_close($cnx); //cerrar la conexión
?>
</table>
<br /><br />
<a href="consultar.php">Consultas</a>
</center>
</body>
</html>