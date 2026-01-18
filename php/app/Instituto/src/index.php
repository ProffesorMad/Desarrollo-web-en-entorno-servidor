<?php

use Instituto\Clases\Alumno;

require_once __DIR__ . "/../vendor/autoload.php";

$datos = Faker\Factory::create(locale: "es_ES");

$alumnos = [];

for ($n = 0; $n < 20; $n++) {
    $name = $datos->firstName();
    $email = $datos->email();
    $alumnos[] = new Alumno($name, $email);
}

foreach ($alumnos as $alumno) {
    echo "<h1>$alumno</h1>";
}
