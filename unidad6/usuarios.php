<?php

class usuarios
{
	private $nombre;
	private $apellido;
	private $fecha_nacimiento;

	public function __construct($nombre, $apellido, $fecha_nacimiento)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->fecha_nacimiento = $fecha_nacimiento;
	}

	private function calcular_edad()
	{
		$fecha_nacimiento = new DateTime($this->fecha_nacimiento);
		$fecha_actual = new DateTime();

		return $fecha_nacimiento->diff($fecha_actual)->y;
	}

	public function imprime_caracteristicas()
	{
		echo "Nombre: " . $this->nombre . "<br>";
		echo "Apellido: " . $this->apellido . "<br>";
		echo "Edad: " . $this->calcular_edad() . " años";
	}
}

?>