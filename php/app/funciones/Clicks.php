<?php
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de Clicks por Nombre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        input, button {
            padding: 5px 10px;
            font-size: 16px;
        }
        #result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Formulario de nombres</h2>
<form method="post" action="">
    <input type="text" name="name" placeholder="Escribe un nombre">
    <button type="submit">Acceder</button>
</form>

<div id="result">
    <?php
    if (!empty($_SESSION['clicks'])) {
        foreach ($_SESSION['clicks'] as $name => $count) {
            echo htmlspecialchars($name) . " $count click" . ($count > 1 ? "s" : "") . "<br>";
        }
    }
    ?>
</div>

</body>
</html>
