<?php

	class Profesor{
		//atributos
		public $nombre;
		public $apellidos;
		public $nivelEstudios;
		public $esPTC;
				
		//constructor
		public function __construct($nombre, $apellidos, $nivelEstudios, $esPTC){
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->nivelEstudios = $nivelEstudios;
			$this->esPTC = $esPTC;
		}
		
		//métodos	
		public function verInformacion(){
			echo "<b>INFORMACIÓN DEL PROFESOR</b><br />
				  <table>
				  	<tr>
						<td>Nombre:</td>
						<td>".$this->nombre." ".$this->apellidos."</td>
					</tr>
					<tr>
						<td>Nivel:</td>
						<td>".$this->nivelEstudios."</td>
					</tr>
					<tr>
						<td>PTC:</td>
						<td>".$this->esPTC."</td>
					</tr>
				  </table>";
		}
		
		public function modificarInformacion(){
			echo "<b>INFORMACIÓN DEL PROFESOR</b><br />
				  Nombre: ".$this->nombre." ".$this->apellidos."<br />
				  Nivel: ".$this->nivelEstudios."<br />
				  PTC: ".$this->esPTC."<br />";
		}
		
		
		
		
	}
	
	
?>
