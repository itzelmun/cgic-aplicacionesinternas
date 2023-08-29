<meta charset="utf-8" />
<center>
<?php
//incluir la conexion
include "conexion.php";
//recibir criterio de búsqueda
$criterio = $_GET['criterio'];
$filtro = $_GET['filtro'];
?>
<h1>Búsquedas y Consultas</h1>
<form action="<?=$_SERVER['PHP_SELF']?>" method="get">
	Criterio de búsqueda: <input type="text" name="criterio" value="<?=$criterio?>" />
    Filtro	<select name="filtro">
    			<option value="general">General</option>
                <option value="marca">Marca</option>
                <option value="modelo">Modelo</option>
                <option value="tipo">Tipo</option>
    		</select>
    <input type="submit" value="Buscar..." />
</form>
<?php
//definir la consulta SQL
if($filtro == "general")
	 $sql = "SELECT * FROM auto WHERE marca LIKE '%$criterio%' OR modelo LIKE '%$criterio%' OR tipo LIKE '%$criterio%' OR color LIKE '%$criterio%' OR pais LIKE '%$criterio%' OR comentarios LIKE '%$criterio%'";
else if($filtro == "marca")
	 $sql = "SELECT * FROM auto WHERE marca LIKE '%$criterio%'";
else if($filtro == "modelo")
	 $sql = "SELECT * FROM auto WHERE modelo LIKE '%$criterio%'";
else if($filtro == "tipo")
	 $sql = "SELECT * FROM auto WHERE tipo LIKE '%$criterio%'";
	
//ejecutar la consulta
mysqli_set_charset($conexion, "utf8");

$consulta = mysqli_query($cnx, $sql);
//cantidad de registros
$registros = mysqli_num_rows($consulta);
?>
<br /><br />
<?php if(isset($criterio)){ ?>
	Se encontraron <b><?=$registros?></b> resultados para tu criterio de búsqueda: <b><?=$criterio?></b>
	
	<table border="1">
	<tr>
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
	//recopilar los datos
	if(mysqli_num_rows($consulta) > 0){ //si hay resultados, entonces
		while($fila = mysqli_fetch_array($consulta)){ //imprimir cada resultado
			$id = $fila['id'];
			$marca = $fila['marca'];
			$modelo = $fila['modelo'];
			$ano = $fila['ano'];
			$tipo = $fila['tipo'];
			$color = $fila['color'];
			$pais = $fila['pais'];
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
			echo "	<td>".$marca."</td>";
			echo "	<td>".$modelo."</td>";
			echo "	<td>".$ano."</td>";
			echo "	<td>".$tipo."</td>";
			echo "	<td>".$color."</td>";
			echo "	<td>".$pais."</td>";
			echo "	<td>".$equipo."</td>";
			echo "	<td>".$comentarios."</td>";
			echo "	<td><a href='form_modificar.php?id=$id'>Modificar</a> ||
				 		<a href='confirmarEliminar.php?id=$id'>Eliminar</a></td>";
			echo "</tr>";
		}
	}else{
		echo "No hay resultados para la consulta...";
	}
	
	mysqli_close($cnx); //cerrar la conexión
?>
</table>
<? } ?>
<br /><br />
<a href="index.php">Regresar...</a>
</center>