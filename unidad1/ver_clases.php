<?php

include ("../conect.php");

$result = mysqli_query($conexion, "SELECT * FROM clases");

while ($fila = mysqli_fetch_array($result)) {

	echo "Unidad: " . $fila['unidad'] . "<br>";
	echo "Fecha: " . $fila['fecha'] . "<br>";
	echo "<hr>";

}

?>