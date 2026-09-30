<?php

require_once '../conect.php';

class usuario
{
	private $email;
	private $contrasena;

	public function __construct($email, $contrasena)
	{
		$this->email = $email;
		$this->contrasena = $contrasena;
	}

	public function registrar()
	{
		global $conexion;

		$contrasenaHash = password_hash($this->contrasena, PASSWORD_DEFAULT);
		$sentencia = mysqli_prepare($conexion, 'INSERT INTO registro (email, contrasena) VALUES (?, ?)');

		if ($sentencia === false) {
			return false;
		}

		mysqli_stmt_bind_param($sentencia, 'ss', $this->email, $contrasenaHash);
		$resultado = mysqli_stmt_execute($sentencia);
		mysqli_stmt_close($sentencia);

		return $resultado;
	}

	public function verificar()
	{
		global $conexion;

		$sentencia = mysqli_prepare($conexion, 'SELECT contrasena FROM registro WHERE email = ?');

		if ($sentencia === false) {
			return false;
		}

		mysqli_stmt_bind_param($sentencia, 's', $this->email);
		mysqli_stmt_execute($sentencia);
		mysqli_stmt_bind_result($sentencia, $contrasenaHash);
		$encontrado = mysqli_stmt_fetch($sentencia);
		mysqli_stmt_close($sentencia);

		return $encontrado && password_verify($this->contrasena, $contrasenaHash);
	}
}

?>