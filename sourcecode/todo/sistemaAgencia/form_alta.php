<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<title>Documento sin título</title>
</head>

<body>
<center>
<h2>Nuevo Auto</h2>
<a href="index.php">Regresar</a>	
<table>
<form action="alta.php" method="post">
	<tr>
    	<td><label for="marca">Marca: </label></td>
		<td><input type="text" name="marca" /></td>
    </tr>
    <tr>
    	<td><label for="modelo">Modelo: </label></td>
    	<td><input type="text" name="modelo"  /></td>
    <tr>
    	<td><label for="ano">Año:</label></td>
    	<td>
        	<select name="ano">
            <? for($i = 1990; $i <= 2017; $i++){ ?>
            	<option value="<? echo $i; ?>"><? echo $i; ?></option>
            <? } ?>
            </select>
        </td>
    </tr>
    <tr>
    	<td><label for="tipo">Tipo:</label></td>
    	<td><input type="radio" name="tipo" value="Pickup" />Pickup
        	<br />
            <input type="radio" name="tipo" value="Sedan"  />Sedan
            <br />
            <input type="radio" name="tipo" value="Coupe"  />Coupe
            <br />
            <input type="radio" name="tipo" value="Hatch Back"  />Hatch Back
            </td>
    </tr>
    <tr>
    	<td><label for="color">Color: </label></td>
    	<td><input type="text" name="color"  /></td>
    <tr>
    <tr>
    	<td><label for="pais">Pais:</label></td>
    	<td>
        	<select name="pais">
            	<option value="elije">Elije...</option>
            	<option value="Alemania">Alemania</option>
                <option value="Estados Unidos">Estados Unidos</option>
                <option value="Japon">Japon</option>
                <option value="Francia">Francia</option>
                <option value="Korea">Korea</option>
            </select>
        </td>
    </tr>
    <tr>
    	<td><label for="equipo">Equipo:</label></td>
    	<td><input type="checkbox" name="quemacocos" />Quemacocos
        	<br />
            <input type="checkbox" name="faros" />Faros de niebla
            <br />
            <input type="checkbox" name="rines" />Rines de aluminio
            </td>
    </tr>
    <tr>
    	<td><label for="comentarios">Comentarios: </label></td>
		<td><textarea name="comentarios"></textarea></td>
    </tr>
    <tr>
    	<td><input type="submit" name="enviar" value="Registrar auto..." /></td>
	</tr>
</form>
</table>
</center>
</body>
</html>