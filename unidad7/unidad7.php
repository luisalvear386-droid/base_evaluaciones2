<?php

include("producto.php");

if (isset($_POST['introducir'])) {
	$producto = new producto($_POST['nombre'], $_POST['descripcion'], $_POST['precio']);
	$producto->introducir_producto();
}

if (isset($_GET['eliminar'])) {
	$producto = new producto();
	$producto->eliminar_producto($_GET['eliminar']);
}
?>
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
		<h2>Administrador de productos</h2>

		<div class="administrador-productos">
			<div class="cargar-producto">
			<form action="unidad7.php" method="post">

				<label>Nombre:</label>
				<input type="text" name="nombre" required>

				<br><br>

				<label>Descripción:</label>
				<textarea name="descripcion" required></textarea>

				<br><br>

				<label>Precio:</label>
				<input type="number" name="precio" step="0.01" required>

				<br><br>

				<input type="submit" name="introducir" value="Cargar producto">

			</form>
			</div>

			<div class="productos-cargados">
				<h2>Productos cargados</h2>

				<?php
				$producto = new producto();
				$producto->listar_producto();
				?>
			</div>
		</div>
	</section>
	<aside>
    
  </aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>