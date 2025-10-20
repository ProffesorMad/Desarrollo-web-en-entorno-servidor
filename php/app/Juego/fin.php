<?php
$resultado = $_GET['resultado'] ?? '';
$jugadas = isset($_GET['jugadas']) ? (int)$_GET['jugadas'] : '?';
$intervalo = isset($_GET['intervalo']) ? $_GET['intervalo'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Fin del Juego</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Poppins', sans-serif; background:#eef2f6; margin:0; display:flex; align-items:center; justify-content:center; height:100vh; }
        .box { background:#fff; padding:24px; width:420px; border-radius:14px; box-shadow:0 8px 30px rgba(0,0,0,.08); text-align:center; }
        h1 { margin:0 0 8px; }
        .success { color:#3ccf91; font-weight:700; }
        .fail { color:#ff557f; font-weight:700; }
        .btn { margin-top:14px; background:#6a5af9; color:#fff; border:0; padding:10px 14px; border-radius:10px; font-weight:600; cursor:pointer; }
    </style>
</head>
<body>
<div class="box">
    <h1>Fin del Juego</h1>

    <?php if ($resultado === 'acertado'): ?>
        <p class="success">🎉 ¡He acertado tu número en <?= htmlspecialchars($jugadas) ?> intentos!</p>
    <?php else: ?>
        <p class="fail">😅 No he podido adivinar tu número o el rango se volvió inconsistente.</p>
        <p>Jugadas realizadas: <?= htmlspecialchars($jugadas) ?></p>
    <?php endif; ?>

    <form action="index.php" method="post">
        <input type="hidden" name="intervalo" value="<?= htmlspecialchars($intervalo) ?>">
        <button class="btn" type="submit">Volver a jugar</button>
    </form>
</div>
</body>
</html>
