<?php
if (!extension_loaded("gd")) {
    http_response_code(500);
    exit("La extensión GD de PHP no está habilitada.");
}

$imagenBase = __DIR__ . "/php_avanzado.jpg";
$marcaAgua = __DIR__ . "/marca_de_agua.png";

$base = @imagecreatefromjpeg($imagenBase);
$agua = @imagecreatefrompng($marcaAgua);

if (!$base || !$agua) {
    http_response_code(500);
    exit("No se pudieron cargar las imágenes de la marca de agua.");
}

$anchoAgua = imagesx($agua);
$altoAgua = imagesy($agua);
$posicionX = (imagesx($base) - $anchoAgua) / 2;
$posicionY = (imagesy($base) - $altoAgua) / 2;

$opacidadMarca = 35;
imagecopymerge($base, $agua, $posicionX, $posicionY, 0, 0, $anchoAgua, $altoAgua, $opacidadMarca);

header("Content-Type: image/jpeg");
imagejpeg($base, null, 90);

imagedestroy($agua);
imagedestroy($base);
