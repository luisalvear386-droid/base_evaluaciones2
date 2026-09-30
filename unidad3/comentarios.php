<?php

$nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''), ENT_QUOTES, 'UTF-8');
$apellido = htmlspecialchars(trim($_POST['apellido'] ?? ''), ENT_QUOTES, 'UTF-8');
$mail = filter_var(trim($_POST['mail'] ?? ''), FILTER_VALIDATE_EMAIL);
$comentario = htmlspecialchars(trim($_POST['comentario'] ?? ''), ENT_QUOTES, 'UTF-8');

if ($nombre === '' || $apellido === '' || $mail === false || $comentario === '') {
	header("Location: unidad3.php");
	exit;
}

$fecha = date("d/m/Y");
$hora = date("H:i");

$texto = "<div class='comentario'>";
$texto .= "<strong>Nombre:</strong> $nombre<br>";
$texto .= "<strong>Apellido:</strong> $apellido<br>";
$texto .= "<strong>Mail:</strong> $mail<br>";
$texto .= "<strong>Comentario:</strong> $comentario<br>";
$texto .= "<strong>Fecha:</strong> $fecha - <strong>Hora:</strong> $hora";
$texto .= "</div>\n";

$f = fopen(__DIR__ . "/comentarios.txt", "a");

fputs($f, $texto);

fclose($f);

header("Location: unidad3.php");

?>