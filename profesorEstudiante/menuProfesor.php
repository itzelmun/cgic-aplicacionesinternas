<?php
 include("Profesor.php");
 include("Estudiante.php");
 session_start();
	
	if(isset($_GET['opc'])){
		switch($_GET['opc']){
			case "consultar":	$_SESSION['p']->verInformacion();
								break;
			case "modificar":	header("location: formAltaProfesor.php?m");
								break;
			case "calificar":	header("location: formCalificar.php");
								break;
		}
	}
	
?>
<h2>Sistema de calificaciones</h2>
<h4>Elige una opción Profesor</h4>
<a href="menuProfesor.php?opc=consultar">Consultar mi información</a>
<br />
<a href="menuProfesor.php?opc=modificar">Modificar mi información</a>
<br />
<a href="menuProfesor.php?opc=calificar">Calificar estudiante</a>
<br /><br /><br />
<a href="index.php">Salir</a>
