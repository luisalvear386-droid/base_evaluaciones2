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
		<h2>Registro e ingreso de usuarios</h2>

		<div class="administrador-productos">
			<div class="cargar-producto">
				<h3>Crear cuenta</h3>
				<form class="formulario-registro" action="cargarusuario.php" method="post">
					<label for="email-registro">Email:</label>
					<input id="email-registro" type="email" name="email" required>

					<br>

					<label for="contrasena-registro">Contraseña:</label>
					<input id="contrasena-registro" type="password" name="contrasena" minlength="6" required>

					<br>

					<input type="submit" value="Registrarme">
				</form>
			</div>

			<div class="productos-cargados">
				<h3>Ingresar</h3>
				<form class="formulario-ingreso" action="verificarusuario.php" method="post">
					<label for="email-ingreso">Email:</label>
					<input id="email-ingreso" type="email" name="email" required>

					<br>

					<label for="contrasena-ingreso">Contraseña:</label>
					<input id="contrasena-ingreso" type="password" name="contrasena" required>

					<br>

					<input type="submit" value="Ingresar">
				</form>
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