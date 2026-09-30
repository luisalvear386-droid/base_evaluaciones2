<?php

include ("../conect.php");

$unidad = filter_input(INPUT_POST, 'unidad', FILTER_VALIDATE_INT);
$fecha = $_POST['fecha'] ?? '';

if ($unidad !== false && $unidad !== null && $fecha !== '') {
	$sentencia = mysqli_prepare($conexion, 'INSERT INTO clases (unidad, fecha) VALUES (?, ?)');
	mysqli_stmt_bind_param($sentencia, 'is', $unidad, $fecha);
	mysqli_stmt_execute($sentencia);
	mysqli_stmt_close($sentencia);
}

header("Location: unidad1.php");

?>