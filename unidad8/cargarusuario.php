<?php

require_once 'usuario.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$contrasena = $_POST['contrasena'] ?? '';
$mensaje = 'No se pudo completar el registro.';
$tipoMensaje = 'mensaje-error';

if ($email !== false && $email !== null && strlen($contrasena) >= 6) {
	$usuario = new usuario($email, $contrasena);

	if ($usuario->registrar()) {
		$mensaje = 'Usuario registrado correctamente. Ya puede ingresar.';
		$tipoMensaje = 'mensaje-exito';
	} elseif (mysqli_errno($conexion) === 1062) {
		$mensaje = 'Ese email ya está registrado.';
	}
} else {
	$mensaje = 'Ingrese un email válido y una contraseña de al menos 6 caracteres.';
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../estilos.css">
	<title>Registro de usuario</title>
</head>
<body>
	<div class="container">
		<header>
			<h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
			<nav><?php include '../botonera.php'; ?></nav>
		</header>
		<section>
			<h2>Registro de usuario</h2>
			<p class="<?php echo $tipoMensaje; ?>"><?php echo htmlspecialchars($mensaje); ?></p>
			<a href="unidad8.php">Volver a la unidad 8</a>
		</section>
	</div>
</body>
</html>