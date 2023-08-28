<?php
 include ("Profesor.php");
 include ("Estudiante.php");
 session_start();
 
 if(isset($_GET['borrar'])){
	 session_destroy();
 }
 
 $perfil = $_GET['perfil'];
 
 if($perfil == "profesor"){
	if(isset($_SESSION['p']))
		header("location: menuProfesor.php");	
	else
		header("location: formAltaProfesor.php");
 }else if($perfil == "estudiante"){
	if(isset($_SESSION['e']))
		header("location: menuEstudiante.php");	
	else
		header("location: formAltaEstudiante.php"); 
 }

 
	
?>
<h2>Sistema de calificaciones</h2>
<h4>Bienvenido</h4>
<table>
<form action="index.php" method="GET" >
	<tr>
    	<td><label>Perfil:</label></td>
        <td><input type="radio" name="perfil" value="profesor" /> Profesor <br />
        	<input type="radio" name="perfil" value="estudiante" /> Estudiante</td>
    </tr>
   	<tr><td></td><td><input type="submit" name="boton" value="Ingresar" /></td></tr>
</form>
</table>
<br /><br />
<a href="index.php?borrar">Borrar Perfiles</a>

