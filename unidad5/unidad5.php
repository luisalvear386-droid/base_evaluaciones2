<?php
session_start();

if (!isset($_SESSION['captcha_resultado'])) {
	$numeroA = random_int(1, 9);
	$numeroB = random_int(1, 9);
	$_SESSION['captcha_numero_a'] = $numeroA;
	$_SESSION['captcha_numero_b'] = $numeroB;
	$_SESSION['captcha_resultado'] = $numeroA + $numeroB;
} else {
	$numeroA = $_SESSION['captcha_numero_a'];
	$numeroB = $_SESSION['captcha_numero_b'];
}
$mensaje = $_GET['mensaje'] ?? '';
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
		<h2>Consultas</h2>

		<?php if ($mensaje === 'captcha'): ?>
			<p class="mensaje-error">El código de seguridad es incorrecto. Inténtalo nuevamente.</p>
		<?php elseif ($mensaje === 'datos'): ?>
			<p class="mensaje-error">Revisa los datos ingresados e inténtalo nuevamente.</p>
		<?php elseif ($mensaje === 'enviada'): ?>
			<p class="mensaje-exito">Tu consulta fue enviada correctamente.</p>
		<?php endif; ?>

		<form action="cargar.php" method="post">
			<label for="nombre">Nombre:</label>
			<input type="text" id="nombre" name="nombre" required>

			<label for="apellido">Apellido:</label>
			<input type="text" id="apellido" name="apellido" required>

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>

			<label for="consulta">Consulta:</label>
			<textarea id="consulta" name="consulta" rows="5" required></textarea>

			<label for="captcha">¿Cuánto es <?php echo $numeroA; ?> + <?php echo $numeroB; ?>?</label>
			<input type="number" id="captcha" name="captcha" required>

			<input type="submit" value="Enviar consulta">
		</form>
	</section>
	<aside></aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>