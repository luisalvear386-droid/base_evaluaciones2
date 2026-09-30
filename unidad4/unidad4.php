<!DOCTYPE html>
<html>
<head>
	<title>Unidad 4 - Marca de agua y Thumbnail</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../estilos.css">
</head>
<body>
	<main class="container">
	<header>
		<h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
		<nav>
			<?php include("../botonera.php"); ?>
		</nav>
	</header>
<section>
	<h1>Unidad 4 - Marca de agua y Thumbnail</h1>

	<h2>1) Imagen con marca de agua</h2>
	<img src="marca_agua.php" class="imagen">

	<h2>2) Thumbnail de 150x150px</h2>
	<?php
	// --- Generación del thumbnail ---
	// Nota: la imagen "unidad4.png" no vino incluida en el material de la unidad,
	// así que se usa "space.jpg" como imagen de origen para la demo.
	// Si agregás tu propia "unidad4.png" a esta carpeta, simplemente cambiá el
	// valor de $imagenOrigen por "unidad4.png" y va a funcionar igual.
	$imagenOrigen = __DIR__ . "/unidad4.png";
	$anchoThumb   = 150;
	$altoThumb    = 150;

	if (!extension_loaded("gd")) {
		echo "La extensión GD de PHP no está habilitada. Reiniciá Apache después de activarla en php.ini.";
	} elseif (file_exists($imagenOrigen)) {
		$infoImagen = @getimagesize($imagenOrigen);
		$tipoImagen = $infoImagen[2] ?? false;

		switch ($tipoImagen) {
			case IMAGETYPE_JPEG:
				$src_img = @imagecreatefromjpeg($imagenOrigen);
				break;
			case IMAGETYPE_PNG:
				$src_img = @imagecreatefrompng($imagenOrigen);
				break;
			case IMAGETYPE_GIF:
				$src_img = @imagecreatefromgif($imagenOrigen);
				break;
			default:
				$src_img = false;
		}

		if ($src_img) {
			$dst_img = @imagecreatetruecolor($anchoThumb, $altoThumb);
			$esPng = $tipoImagen === IMAGETYPE_PNG;

			// Si la imagen de origen es PNG, se preserva la transparencia
			if ($esPng) {
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img, true);
			}

			@imagecopyresized($dst_img, $src_img, 0, 0, 0, 0, $anchoThumb, $altoThumb, imagesx($src_img), imagesy($src_img));

			$thumbNombre = "unidad4_thumb." . ($esPng ? "png" : "jpg");
			$rutaThumb = __DIR__ . "/" . $thumbNombre;

			if ($esPng) {
				@imagepng($dst_img, $rutaThumb);
			} else {
				@imagejpeg($dst_img, $rutaThumb);
			}

			imagedestroy($src_img);
			imagedestroy($dst_img);

			echo "<img src=\"$thumbNombre\">";
		} else {
			echo "No se pudo procesar la imagen $imagenOrigen.";
		}

	} else {
		echo "No se encontró el archivo $imagenOrigen en esta carpeta.";
	}
	?>

</section>
</main>
</body>
</html>

