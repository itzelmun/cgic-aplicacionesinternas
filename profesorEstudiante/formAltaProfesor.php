<?php
 include("Profesor.php");
 //include("Estudiante.php");
 session_start();
	
	if(isset($_GET['boton'])){
		$nombre = $_GET['nombre'];
		$apellidos = $_GET['apellidos'];
		$nivel = $_GET['nivel'];
		$ptc = $_GET['ptc'];
		
		$p = new Profesor($nombre, $apellidos, $nivel, $ptc); //crear objeto
		$_SESSION['p'] = $p; //asegurar persistencia
		header("location: menuProfesor.php");
	}
	
	if(isset($_GET['m'])){
		$mNombre = $_SESSION['p']->nombre;
		$mApellidos = $_SESSION['p']->apellidos;
		$mNivel = $_SESSION['p']->nivelEstudios;
		$mPtc = $_SESSION['p']->esPTC;
	}
	
?>
<h2>Sistema de calificaciones</h2>
<h4>Bienvenido Profesor</h4>
<table>
<form action="formAltaProfesor.php" method="GET" >
	<tr>
    	<td><label>Nombre:</label></td>
        <td><input type="text" name="nombre" <? echo (isset($_GET['m'])) ? "value='$mNombre'" : "" ?> /></td>
    </tr>
    <tr>
    	<td><label>Apellidos:</label></td>
        <td><input type="text" name="apellidos" <? echo (isset($_GET['m'])) ? "value='$mApellidos'" : "" ?> /></td>
    </tr>
    <tr>
    	<td><label>Nivel de estudios:</label></td>
        <td><select name="nivel">
        		<option value="Licenciatura" <? echo ($mNivel == "Licenciatura") ? "selected='selected'" : "" ?>>Licenciatura</option>
                <option value="Maestria" <? echo ($mNivel == "Maestria") ? "selected='selected'" : "" ?>>Maestría</option>
                <option value="Doctorado" <? echo ($mNivel == "Doctorado") ? "selected='selected'" : "" ?>>Doctorado</option>
            </select> </td>
    </tr>
    <tr>
    	<td><label>Profesor de tiempo completo:</label></td>
        <td><input type="radio" name="ptc" value="si" <? echo ($mPtc == "si") ? "checked='checked'" : "" ?> /> Si <br />
        	<input type="radio" name="ptc" value="no" <? echo ($mPtc == "no") ? "checked='checked'" : "" ?> /> No</td>
    </tr>
   	<tr><td></td><td><input type="submit" name="boton" value="Ingresar" /></td></tr>
</form>
</table>