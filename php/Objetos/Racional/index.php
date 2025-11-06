<?php
require_once ("Racional.php");

$r1 = new Racional(num:1, den:6); // 1/6
$r2 = new Racional(num:20);       // 20/1
$r3 = new Racional(num:"7/8");    // 7/8
$r4 = new Racional();             // 1/1
$r5 = new Racional(num:5, den:5);

echo "Valor de r1 $r1";
echo "Valor de r2 $r2";
echo "Valor de r3 $r3";
echo "Valor de r4 $r4";
echo "Valor de r5 $r5";