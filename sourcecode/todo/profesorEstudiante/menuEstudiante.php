<?php
 include("Profesor.php");
 include("Estudiante.php");
 session_start();
	
	if(isset($_GET['opc'])){
		switch($_GET['opc']){
			case "consultar":	$_SESSION['e']->verInformacion();
								break;
			case "reporte":	if($_SESSION['e']->calMat == NULL)
								echo "No han registrado tus calificaciones aún";
							else{
								$_SESSION['e']->verCalificaciones();
							}
								break;
		}
	}
	
?>
<h2>Sistema de calificaciones</h2>
<h4>Elige una opción Estudiante</h4>
<a href="menuEstudiante.php?opc=consultar">Consultar mi información</a>
<br />
<a href="menuEstudiante.php?opc=reporte">Reporte de calificaciones</a>
<br /><br /><br />
<a href="index.php">Salir</a>
