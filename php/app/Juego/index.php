<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Juego Adivina el Número - Inicio</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Poppins', sans-serif; background:#f5f5f5; margin:0; display:flex; align-items:center; justify-content:center; height:100vh; }
        .container { background:#fff; width:420px; padding:2rem 2.5rem; border-radius:14px; box-shadow:0 6px 20px rgba(0,0,0,.08); }
        h1 { margin:0 0 .25rem; font-size:1.9rem; }
        p { color:#555; margin:0 0 1.25rem; }
        fieldset { background:#f0f3f9; border-radius:10px; padding:12px 14px; border:none; }
        label { display:block; margin:8px 0; }
        .btn { margin-top:14px; background:#6a5af9; color:#fff; border:0; padding:10px 16px; border-radius:10px; font-weight:600; cursor:pointer; }
    </style>
</head>
<body>
<?php
$selected_interval = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['intervalo'])) {
    $selected_interval = $_POST['intervalo'];
}
if (isset($_GET['intervalo'])) {
    $selected_interval = $_GET['intervalo'];
}
?>
<div class="container">
    <h1>Empieza el Juego</h1>
    <p>Selecciona un intervalo y el número que has pensado. Cada partida tiene intentos distintos:</p>

    <form action="jugar.php" method="post">
        <fieldset>
            <legend style="font-weight:700; margin-bottom:8px;">Selecciona un intervalo</legend>

            <label><input type="radio" name="intervalo" value="10" <?= ($selected_interval === '10') ? 'checked' : '' ?>> 1 - 1.023 (10 intentos)</label>
            <label><input type="radio" name="intervalo" value="16" <?= ($selected_interval === '16') ? 'checked' : '' ?>> 1 - 65.535 (15 intentos)</label>
            <label><input type="radio" name="intervalo" value="20" <?= ($selected_interval === '20') ? 'checked' : '' ?>> 1 - 1.048.575 (20 intentos)</label>
        </fieldset>

        <button type="submit" class="btn">Empezar el juego</button>
    </form>
</div>
</body>
</html>
