<?php
 include("Profesor.php");
 include("Estudiante.php");
 session_start();
	
if(!isset($_SESSION['e'])){
	echo "No existe ningún estudiante aún <br /><br />
		  <a href='menuProfesor.php'>Regresar...</a>";
}else{
	if(isset($_GET['boton'])){
		$matematicas = $_GET['matematicas'];
		$espanol = $_GET['espanol'];
		$fisica = $_GET['fisica'];
		
		$_SESSION['e']->registrarCalificaciones($matematicas, $espanol, $fisica); //asegurar persistencia
		header("location: menuProfesor.php");
	}
	
	
?>
<h2>Sistema de calificaciones</h2>
<h4>Registrar calificaciones del Estudiante</h4>
<table>
<form action="formCalificar.php" method="GET" >
    <tr>
    	<td><label>Matemáticas:</label></td>
        <td><input type="text" name="matematicas" /></td>
    </tr>
    <tr>
    	<td><label>Español:</label></td>
        <td><input type="text" name="espanol" /></td>
    </tr>
    <tr>
    	<td><label>Física:</label></td>
        <td><input type="text" name="fisica" /></td>
    </tr>
    
   	<tr><td></td><td><input type="submit" name="boton" value="Calificar" /></td></tr>
</form>
</table>
<?php } ?>