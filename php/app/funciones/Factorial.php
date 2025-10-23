<?php

function Factorial(int $num): int {

    if ($num < 0) {
        die("<h1>No existe el factorial de números negativos.<h1>");
    }

    if ($num === 0 || $num === 1) {
        return 1;
    }

    return $num * Factorial($num - 1);
}

$num = -4;
$n = Factorial(num: $num);

echo "<h1>El factorial de $num es $n</h1>";
