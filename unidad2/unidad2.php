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
		<h2>Eventos</h2>
	</section>

	<section>
	<h2>Calculadora de fecha</h2>

	<form action="calculo_fecha.php" method="post">

		<label>Día:</label>
		<input type="number" name="dia" min="1" max="31">

		<br><br>

		<label>Mes:</label>
		<input type="number" name="mes" min="1" max="12">

		<br><br>

		<label>Año:</label>
		<input type="number" name="anio" min="2026">

		<br><br>

		<input type="submit" value="Calcular">

	</form>

	<?php

	if (isset($_GET['dias'])) {
		echo "<h3>Faltan " . $_GET['dias'] . " días para esa fecha.</h3>";
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