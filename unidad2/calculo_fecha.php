<?php

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$anio = $_POST['anio'];

$fecha_ingresada = mktime(0, 0, 0, $mes, $dia, $anio);
$fecha_actual = mktime(0, 0, 0, date("m"), date("d"), date("Y"));

$diferencia = $fecha_ingresada - $fecha_actual;

$dias = floor($diferencia / 86400);

header("Location: unidad2.php?dias=$dias");

?> 