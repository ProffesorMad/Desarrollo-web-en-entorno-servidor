<?php
function mcd_tradicional(int $a, int $b): int {
    while ($b != 0) {
        $resto = $a % $b;
        $a = $b;
        $b = $resto;
    }
    return $a;
}

echo "<h3>MCD tradicional</h3>";
echo "El MCD de 48 y 18 es: " . mcd_tradicional(48, 18) . "<br><br>";

$mcd_variable = function (int $a, int $b): int {
    while ($b != 0) {
        $resto = $a % $b;
        $a = $b;
        $b = $resto;
    }
    return $a;
};

echo "<h3>MCD en variable</h3>";
echo "El MCD de 48 y 18 es: " . $mcd_variable(48, 18) . "<br><br>";

$mcd_flecha = function (int $a, int $b) use (&$mcd_flecha): int {
    return $b == 0 ? $a : $mcd_flecha($b, $a % $b);
};

echo "<h3>MCD en función flecha (corregida)</h3>";
echo "El MCD de 48 y 18 es: " . $mcd_flecha(48, 18) . "<br><br>";

function mcd_recursivo(int $a, int $b): int {
    if ($b == 0) return $a;
    return mcd_recursivo($b, $a % $b);
}

?>
