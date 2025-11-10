<?php
require_once("Racional.php");

$r1 = new Racional(7,3);
$r2 = new Racional(9,4);

echo "<br>";
echo "R1 = $r1 <br>";
echo "R2 = $r2 <br><br>";

echo "Suma = ".$r1->sumar($r2)."<br>";
echo "Resta = ".$r1->restar($r2)."<br>";
echo "Multiplicacion = ".$r1->multiplicar($r2)."<br>";
echo "Division = ".$r1->dividir($r2)."<br>";
