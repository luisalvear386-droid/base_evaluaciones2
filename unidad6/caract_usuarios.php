<?php

include("usuarios.php");

$usuario = new usuarios("Sergio", "klug", "2005-05-23");
$usuario2 = new usuarios("Marcos", "Ceroleni", "2006-05-23");

$usuario->imprime_caracteristicas();

echo "<hr>";

$usuario2->imprime_caracteristicas();

?>
