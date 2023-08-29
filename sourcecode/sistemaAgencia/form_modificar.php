<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Documento sin título</title>
</head>

<body>
<center>
<h2>Modificar Auto</h2>
<?php 
include "conexion.php"; //incluir la conexión
	
	$id = $_GET['id']; //recibir id del enlace
	//definir consulta SQL
	$sql = "SELECT * FROM auto WHERE id = $id";
	mysqli_set_charset($conexion, "utf8");

	$consulta = mysqli_query($cnx, $sql); //ejecutar consulta
	//extraer los datos generados de la consulta
	$fila = mysqli_fetch_array($consulta);
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
	
?>
<a href="index.php">Regresar</a>	
<table>
<form action="modificar.php?id=<?=$id?>" method="post">
	<tr>
    	<td><label for="marca">Marca: </label></td>
		<td><input type="text" name="marca" value="<?=$marca?>" /></td>
    </tr>
    <tr>
    	<td><label for="modelo">Modelo: </label></td>
    	<td><input type="text" name="modelo" value="<?=$modelo?>"  /></td>
    <tr>
    	<td><label for="ano">Año:</label></td>
    	<td>
        	<select name="ano">
            <? for($i = 1990; $i <= 2017; $i++){ ?>
            	<option value="<? echo $i; ?>" <? if($i == $ano) echo "selected='selected'"; ?>><? echo $i; ?></option>
            <? } ?>
            </select>
        </td>
    </tr>
    <tr>
    	<td><label for="tipo">Tipo:</label></td>
    	<td><input type="radio" name="tipo" value="Pickup" <? if($tipo == "Pickup") echo "checked='checked'"; ?> />Pickup
        	<br />
            <input type="radio" name="tipo" value="Sedan" <? if($tipo == "Sedan") echo "checked='checked'"; ?> />Sedan
            <br />
            <input type="radio" name="tipo" value="Coupe" <? if($tipo == "Coupe") echo "checked='checked'"; ?> />Coupe
            <br />
            <input type="radio" name="tipo" value="Hatch Back" <? if($tipo == "Hatch Back") echo "checked='checked'"; ?> />Hatch Back
            </td>
    </tr>
    <tr>
    	<td><label for="color">Color: </label></td>
    	<td><input type="text" name="color" value="<?=$color?>" /></td>
    <tr>
    <tr>
    	<td><label for="pais">Pais:</label></td>
    	<td>
        	<select name="pais">
            	<option value="Alemania" <? if($pais == "Alemania") echo "selected='selected'"; ?>>Alemania</option>
                <option value="Estados Unidos" <? if($pais == "Estados Unidos") echo "selected='selected'"; ?> >Estados Unidos</option>
                <option value="Japon" <? if($pais == "Japon") echo "selected='selected'"; ?> >Japon</option>
                <option value="Francia" <? if($pais == "Francia") echo "selected='selected'"; ?> >Francia</option>
                <option value="Korea" <? if($pais == "Korea") echo "selected='selected'"; ?> >Korea</option>
            </select>
        </td>
    </tr>
    <tr>
    	<td><label for="equipo">Equipo:</label></td>
    	<td> 
        	<input <?=($eqQuema == true) ? "checked='checked'" : ""?> type="checkbox" name="quemacocos" />Quemacocos
        	<br />
            <input <?=($eqFaros == true) ? "checked='checked'" : ""?> type="checkbox" name="faros" />Faros de niebla
            <br />
            <input <?=($eqRines == true) ? "checked='checked'" : ""?> type="checkbox" name="rines" />Rines de aluminio
        </td>
    </tr>
    <tr>
    	<td><label for="comentarios">Comentarios: </label></td>
		<td><textarea name="comentarios"> <?=$comentarios?> </textarea></td>
    </tr>
    <tr>
    	<td><input type="submit" name="enviar" value="Modificar auto..." /></td>
	</tr>
</form>
</table>
</center>
</body>
</html>