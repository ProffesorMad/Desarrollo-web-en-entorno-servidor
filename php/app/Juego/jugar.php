<?php
// Configuración de intervalos e intentos
$intervalos = [
        10 => ['max' => 1023, 'intentos' => 10],
        16 => ['max' => 65535, 'intentos' => 15],
        20 => ['max' => 1048575, 'intentos' => 20]
];

// Variables iniciales
$intervalo = null;
$jugada = 1;
$min = 1;
$max = 1;
$numero = 1;
$respuestaSeleccionada = 'mayor';
$intentos_max = 0;

// Primera jugada (desde Fracciones.php)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['intervalo']) && !isset($_POST['respuesta'])) {
    $intervalo = (int) $_POST['intervalo'];
    $min = 1;
    $max = $intervalos[$intervalo]['max'];
    $intentos_max = $intervalos[$intervalo]['intentos'];
    $jugada = 1;
    $numero = (int) floor(($min + $max) / 2);
}
// Jugadas siguientes
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['respuesta'])) {
    $intervalo = (int) $_POST['intervalo'];
    $intentos_max = $intervalos[$intervalo]['intentos'];
    $prev_jugada = (int) $_POST['jugada'];
    $min = (int) $_POST['min'];
    $max = (int) $_POST['max'];
    $prev_numero = (int) $_POST['numero'];
    $respuesta = $_POST['respuesta'];
    $respuestaSeleccionada = $respuesta;

    if ($respuesta === 'igual') {
        header("Location: fin.php?resultado=acertado&jugadas=$prev_jugada&intervalo=$intervalo");
        exit;
    }

    if ($respuesta === 'mayor') $min = $prev_numero + 1;
    elseif ($respuesta === 'menor') $max = $prev_numero - 1;

    $jugada = $prev_jugada + 1;

    if ($jugada > $intentos_max || $min > $max) {
        header("Location: fin.php?resultado=fracaso&jugadas=$prev_jugada&intervalo=$intervalo");
        exit;
    }

    $numero = (int) floor(($min + $max) / 2);
} else {
    header("Location: Fracciones.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Jugar - Adivina el número</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Poppins', sans-serif; background:#f4f6f8; margin:0; display:flex; align-items:center; justify-content:center; height:100vh; }
        .card { background:#fff; width:460px; padding:22px; border-radius:14px; box-shadow:0 8px 30px rgba(0,0,0,.08); }
        h1 { margin:0 0 .1rem; font-size:1.7rem; }
        .sub { color:#666; margin-bottom:12px; }
        .panel { background:#dbe5f4; padding:12px; border-radius:10px; margin:12px 0; font-weight:600; }
        .radio-box { background:#f8fafc; padding:12px; border-radius:10px; }
        label { display:flex; align-items:center; gap:10px; margin:10px 0; cursor:pointer; }
        input[type=radio] { width:18px; height:18px; }
        .buttons { display:flex; gap:12px; margin-top:16px; }
        .btn { flex:1; padding:10px; border-radius:10px; border:0; color:#fff; font-weight:600; cursor:pointer; }
        .play { background:#6a5af9; }
        .reset { background:#ff2fa6; }
        .back { background:#00c4b3; }
    </style>
</head>
<body>
<div class="card">
    <h1>¡Adivina el número!</h1>
    <div class="sub">Intento <?= htmlspecialchars($jugada) ?> de <?= htmlspecialchars($intentos_max) ?></div>

    <div class="panel">¿Tu número es <span style="font-size:1.15em;"><?= htmlspecialchars($numero) ?></span>?</div>

    <form action="jugar.php" method="post">
        <div class="radio-box">
            <strong>Tu número es...</strong>
            <label><input type="radio" name="respuesta" value="mayor" <?= ($respuestaSeleccionada === 'mayor') ? 'checked' : '' ?>> Mayor</label>
            <label><input type="radio" name="respuesta" value="menor" <?= ($respuestaSeleccionada === 'menor') ? 'checked' : '' ?>> Menor</label>
            <label><input type="radio" name="respuesta" value="igual" <?= ($respuestaSeleccionada === 'igual') ? 'checked' : '' ?>> Igual</label>
        </div>

        <input type="hidden" name="jugada" value="<?= htmlspecialchars($jugada) ?>">
        <input type="hidden" name="min" value="<?= htmlspecialchars($min) ?>">
        <input type="hidden" name="max" value="<?= htmlspecialchars($max) ?>">
        <input type="hidden" name="numero" value="<?= htmlspecialchars($numero) ?>">
        <input type="hidden" name="intervalo" value="<?= htmlspecialchars($intervalo) ?>">

        <div class="buttons">
            <button type="submit" class="btn play">JUGAR</button>
        </div>
    </form>

    <div style="display:flex; gap:12px; margin-top:12px;">
        <form action="index.php" method="post">
            <input type="hidden" name="intervalo" value="<?= htmlspecialchars($intervalo) ?>">
            <button type="submit" class="btn back">VOLVER</button>
        </form>

        <form action="jugar.php" method="post">
            <input type="hidden" name="intervalo" value="<?= htmlspecialchars($intervalo) ?>">
            <button type="submit" class="btn reset">REINICIAR</button>
        </form>
    </div>
</div>
</body>
</html>
