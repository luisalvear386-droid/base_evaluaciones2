<?php

require_once 'usuario.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$contrasena = $_POST['contrasena'] ?? '';
$mensaje = 'Email o contraseña incorrectos.';
$tipoMensaje = 'mensaje-error';

if ($email !== false && $email !== null && $contrasena !== '') {
	$usuario = new usuario($email, $contrasena);

	if ($usuario->verificar()) {
		$mensaje = 'Ingreso exitoso.';
		$tipoMensaje = 'mensaje-exito';
	}
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../estilos.css">
	<title>Ingreso de usuario</title>
</head>
<body>
	<div class="container">
		<header>
			<h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
			<nav><?php include '../botonera.php'; ?></nav>
		</header>
		<section>
			<h2>Ingreso de usuario</h2>
			<p class="<?php echo $tipoMensaje; ?>"><?php echo htmlspecialchars($mensaje); ?></p>
			<a href="unidad8.php">Volver a la unidad 8</a>
		</section>
	</div>
</body>
</html>