<?php

$r1 = racional(num:1, den:6); // 1/6
$r2 = racional(num:20);       // 20/1
$r3 = racional(num:"7/8");    // 7/8
$r4 = racional();             // 1/1
$r5 = racional(den:4); // 1/4??
function racional(int|string|null $num = null, int|string|null $den = null): string {

    $num = $num ?? 1;
    $den = $den ?? 1;

    if (is_string($num)) {
        if (str_contains($num,'/')) {
            return $num;
        } else {
            $num = (int)$num;
            $den = $den ?? 1;
        }
    }

    if (is_string($den)) {
        if (str_contains($den,'/')) {
            return $den;
        } else {
            $den = (int)$den;
            $num = $num ?? 1;
        }
    }

    if (is_int($num)) {
        $den = $den ?? 1;
    }

    return "$num/$den";
}
echo "<h1>$r1</h1>";
echo "<h1>$r2</h1>";
echo "<h1>$r3</h1>";
echo "<h1>$r4</h1>";
echo "<h1>$r5</h1>";
