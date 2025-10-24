<?php

$notas = array_map(fn() => rand(0, 10), range(1, 20));

print_r($notas);

?>

<br>

<?php

$notas = [];

for ($i = 0; $i < 20; $i++) {
    $notas[] = rand(0, 100) / 10; // entre 0.0 y 10.0
}

var_dump($notas);

?>

<br>

<?php

$notas = [];
for ($i = 0; $i < 20; $i++) {
    $notas[] = rand(0, 10);
}

echo "<h3>Notas originales:</h3>";
echo implode(", ", $notas) . "<br><br>";

sort($notas);

echo "<h3>De menor a mayor:</h3>";
echo implode(", ", $notas) . "<br><br>";

rsort($notas);

echo "<h3>De Mayor a menor:</h3>";
echo implode(", ", $notas) . "<br>";

?>



