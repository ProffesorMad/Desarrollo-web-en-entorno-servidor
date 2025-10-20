<?php
$operando_1 = $_POST["op1"];
$operando_2 = $_POST["op2"];
$operador   = $_POST["operador"];

$operacion = "$operando_1 $operador $operando_2";
$msj = "";
$resultado = null;

if(!is_numeric($operando_1) || !is_numeric($operando_2)) {
    $msj = "La operación <span style='color:green'>$operacion</span> no está permitida";
} elseif($operador == "/" && $operando_2 == 0) {
    $msj = "La división por 0 <span style='color:green'>$operacion</span> no está permitida";
} else {
    $resultado = match($operador) {
        '*' => $operando_1 * $operando_2,
        '+' => $operando_1 + $operando_2,
        '-' => $operando_1 - $operando_2,
        '/' => $operando_1 / $operando_2,
        default => "Operador no válido"
    };
    $msj = "$operacion = $resultado";
}

echo $msj;
?>
