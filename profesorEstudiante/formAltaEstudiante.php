<?php
 //include("Profesor.php");
 include("Estudiante.php");
 session_start();
	
	if(isset($_GET['boton'])){
		$nombre = $_GET['nombre'];
		$apellidos = $_GET['apellidos'];
		
		$e = new Estudiante($nombre, $apellidos); //crear objeto
		$_SESSION['e'] = $e; //asegurar persistencia
		header("location: menuEstudiante.php");
	}
	
	if(isset($_GET['m'])){
		$mNombre = $_SESSION['e']->nombre;
		$mApellidos = $_SESSION['e']->apellidos;
	}
	
?>
<h2>Sistema de calificaciones</h2>
<h4>Bienvenido Estudiante</h4>
<table>
<form action="formAltaEstudiante.php" method="GET" >
	<tr>
    	<td><label>Nombre:</label></td>
        <td><input type="text" name="nombre" <? echo (isset($_GET['m'])) ? "value='$mNombre'" : "" ?> /></td>
    </tr>
    <tr>
    	<td><label>Apellidos:</label></td>
        <td><input type="text" name="apellidos" <? echo (isset($_GET['m'])) ? "value='$mApellidos'" : "" ?> /></td>
    </tr>
   	<tr><td></td><td><input type="submit" name="boton" value="Ingresar" /></td></tr>
</form>
</table>