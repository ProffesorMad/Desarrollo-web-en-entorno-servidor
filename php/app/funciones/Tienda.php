<?php
session_start();
$productos = [
        'lechuga' => ['unidades' => 200, 'precio' => 0.90],
        'tomates' => ['unidades' => 2000, 'precio' => 2.15],
        'cebollas' => ['unidades' => 3200, 'precio' => 0.49],
        'fresas' => ['unidades' => 4800, 'precio' => 4.50],
        'manzanas' => ['unidades' => 2500, 'precio' => 2.10],
];

if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = $productos;
}

$factura = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productos = $_SESSION['productos']; // traer stock actual
    $total_general = 0;
    $detalle_factura = "";

    foreach ($productos as $nombre => $info) {
        $cantidad = isset($_POST[$nombre]) ? intval($_POST[$nombre]) : 0;

        if ($cantidad > 0) {
            $stock = $info['unidades'];
            $precio = $info['precio'];

            if ($stock <= 0) {
                $detalle_factura .= "<p style='color:red;'>$nombre está agotado.</p>";
            } elseif ($cantidad > $stock) {
                $detalle_factura .= "<p style='color:red;'>No hay suficientes unidades de $nombre. Solo quedan $stock disponibles.</p>";
            } else {
                $total = $cantidad * $precio;
                $total_general += $total;
                $productos[$nombre]['unidades'] -= $cantidad;

                $detalle_factura .= "
                    <tr>
                        <td>" . ucfirst($nombre) . "</td>
                        <td>$cantidad</td>
                        <td>" . number_format($precio, 2) . " €</td>
                        <td>" . number_format($total, 2) . " €</td>
                    </tr>
                ";
            }
        }
    }

    $_SESSION['productos'] = $productos;

    if ($total_general > 0) {
        $factura = "
            <h3>Factura de compra</h3>
            <table border='1' cellpadding='5' cellspacing='0'>
                <tr style='background-color:#c8f0c8;'>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Total</th>
                </tr>
                $detalle_factura
                <tr style='font-weight:bold; background-color:#e2ffe2;'>
                    <td colspan='3'>TOTAL</td>
                    <td>" . number_format($total_general, 2) . " €</td>
                </tr>
            </table>
            <p style='color:green;'>Compra realizada con éxito.</p>
        ";
    } else {
        $factura .= "<p style='color:red;'>No se realizó ninguna compra válida.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Verduras</title>
    <style>
        body { font-family: Arial; margin: 40px; background-color: #f5fff5; }
        h2 { color: #2b6e2b; }
        table { border-collapse: collapse; width: 70%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #c8f0c8; }
        input[type=number] { width: 80px; }
        button { background-color: #2b6e2b; color: white; padding: 8px 15px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #248424; }
    </style>
</head>
<body>

<h2>Tienda de Verduras</h2>
<form method="post">
    <table>
        <tr>
            <th>Producto</th>
            <th>Precio (€)</th>
            <th>Unidades disponibles</th>
            <th>Comprar</th>
        </tr>
        <?php foreach ($_SESSION['productos'] as $nombre => $info): ?>
            <tr>
                <td><?= ucfirst($nombre) ?></td>
                <td><?= number_format($info['precio'], 2) ?></td>
                <td><?= $info['unidades'] ?></td>
                <td>
                    <?php if ($info['unidades'] > 0): ?>
                        <input type="number" name="<?= $nombre ?>" min="0" max="<?= $info['unidades'] ?>" value="0">
                    <?php else: ?>
                        <span style="color:red;">Agotado</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <button type="submit">Realizar compra</button>
</form>

<?= $factura ?>

</body>
</html>
