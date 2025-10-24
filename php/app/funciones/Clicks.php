<?php

// Formulario con un campo nombre y un boton acceder al lado, cuando ponga un nombre,
// Ej: Pablo , se borre el nombre y al lado ponga Pablo 1 click, luego si vuelvo a poner
// Pablo y le doy a acceder que ponga Pablo 2 cliks y si pongo luego Daniel y le doy a acceder
// ponga Pablo 2 click Daniel 1 click

session_start();

if (!isset($_SESSION['clicks'])) {
    $_SESSION['clicks'] = [];
}

if (isset($_POST['name']) && !empty(trim($_POST['name']))) {
    $name = trim($_POST['name']);

    if (isset($_SESSION['clicks'][$name])) {
        $_SESSION['clicks'][$name] += 1;
    } else {
        $_SESSION['clicks'][$name] = 1;
    }
    
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

