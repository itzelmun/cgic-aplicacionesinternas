<?php

	class Estudiante{
		//atributos
		public $nombre;
		public $apellidos;
		public $calMat;
		public $calEsp;
		public $calFis;
		
		//constructor
		public function __construct($nombre, $apellidos){
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
		}
		
		//métodos	
		public function verInformacion(){
			echo "<b>INFORMACIÓN DEL ESTUDIANTE</b><br />
				  Nombre: ".$this->nombre." ".$this->apellidos."<br />";
		}
		
		public function verCalificaciones(){
			$promedio = ($this->calMat + $this->calEsp + $this->calFis) / 3;
			$estatus = ($promedio >= 8) ? "Aprobado" : "Reprobado";
				  
			echo "<b>REPORTE DE CALIFICACIONES</b><br />
				  <table>
				  	<tr>
						<td>Matemáticas:</td>
						<td>".$this->calMat."</td>
					</tr>
					<tr>
						<td>Español:</td>
						<td>".$this->calEsp."</td>
					</tr>
					<tr>
						<td>Física:</td>
						<td>".$this->calFis."</td>
					</tr>
					<tr>
						<td>Promedio final:</td>
						<td><b>".$promedio."</b></td>
					</tr>
					<tr>
						<td>Tu estatus es:</td>
						<td><b>".$estatus."</b></td>
					</tr>
				  </table>";
		}
		
		public function registrarCalificaciones($matematicas, $espanol, $fisica){
			$this->calMat = $matematicas;
			$this->calEsp = $espanol;
			$this->calFis = $fisica;
		}
	}
	
	
?>
