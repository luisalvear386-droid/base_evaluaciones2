<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: unidad5.php');
    exit;
}

$captchaIngresado = filter_input(INPUT_POST, 'captcha', FILTER_VALIDATE_INT);
$captchaEsperado = $_SESSION['captcha_resultado'] ?? null;
unset($_SESSION['captcha_resultado']);

if ($captchaEsperado === null || $captchaIngresado === false || !hash_equals((string) $captchaEsperado, (string) $captchaIngresado)) {
    header('Location: unidad5.php?mensaje=captcha');
    exit;
}

$nombre = trim($_POST['nombre'] ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$email = trim($_POST['email'] ?? '');
$consulta = trim($_POST['consulta'] ?? '');

if ($nombre === '' || $apellido === '' || $consulta === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: unidad5.php?mensaje=datos');
    exit;
}

require_once '../conect.php';

$sentencia = mysqli_prepare(
    $conexion,
    'INSERT INTO consultas (nombre, apellido, email, consulta) VALUES (?, ?, ?, ?)'
);
mysqli_stmt_bind_param($sentencia, 'ssss', $nombre, $apellido, $email, $consulta);
mysqli_stmt_execute($sentencia);
mysqli_stmt_close($sentencia);
mysqli_close($conexion);

header('Location: unidad5.php?mensaje=enviada');
exit;
