<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Documento sin título</title>
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
</style>
</head>

<body>
<center>
<h2>Agencia de Autos</h2>
<a href="form_alta.php">Registrar auto</a>
<br /><br />
<table border="1">
	<tr>
    	<th>No.</th>
    	<th>Marca</th>
        <th>Modelo</th>
        <th>Año</th>
        <th>Tipo</th>
        <th>Color</th>
        <th>Pais</th>
        <th>Equipo</th>
        <th width="25%">Comentarios</th>
        <th>Acciones</th>
    </tr>
<?php
	include "conexion.php"; //incluir la conexion
	//definir la consulta SQL
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