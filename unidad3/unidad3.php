<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="../estilos.css">
</head>

<body>

<div class="container">
	<header>
		<h1>Programación en PHP y MySQL - Nivel Avanzado</h1>

		<nav>
			<?php include("../botonera.php"); ?>
		</nav>
	</header>

	<section>
		<h2>Comentarios</h2>

		<form action="comentarios.php" method="post">

			<label>Nombre:</label>
			<input type="text" name="nombre">

			<br><br>

			<label>Apellido:</label>
			<input type="text" name="apellido">

			<br><br>

			<label>Mail:</label>
			<input type="email" name="mail">

			<br><br>

			<label>Comentario:</label>
			<textarea name="comentario"></textarea>

			<br><br>

			<input type="submit" value="Enviar">

		</form>

		<hr>

		<h2>Comentarios realizados</h2>

	<?php

$nombre_archivo = __DIR__ . "/comentarios.txt";

if (file_exists($nombre_archivo))
{
	$v = file($nombre_archivo);
	$cantidad = count($v);

	for ($i=0; $i<$cantidad; $i++)
	{
		echo $v[$i];
	}
}
else
{
	echo "<p>No hay comentarios.</p>";
}

?>

	</section>

	<aside>
	</aside>

	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>

</div>
</body>
</html>