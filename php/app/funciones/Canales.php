<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Canales de TV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fafafa;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        h3 {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 8px;
            width: 70%;
            margin: 40px auto 10px;
        }
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 10px auto 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: white;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 80px;
            border-radius: 8px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
<h2>Listado de Canales de TV</h2>

<?php

$url = "https://raw.githubusercontent.com/MAlejandroR/json_tv/main/tv.json";

$contenido = file_get_contents($url);
$categorias = json_decode($contenido, true);

foreach ($categorias as $categoria) {
    echo "<h3>{$categoria['name']}</h3>";
    echo "<table>";
    echo "<tr><th>Logo</th><th>Nombre</th><th>Web</th><th>Enlaces de Streaming</th></tr>";

    foreach ($categoria['channels'] as $canal) {
        $logo = $canal['logo'] ?? '';
        $nombre = $canal['name'] ?? 'Sin nombre';
        $web = $canal['web'] ?? '#';

        echo "<tr>";
        echo "<td><img src='{$logo}' alt='logo'></td>";
        echo "<td>{$nombre}</td>";
        echo "<td><a href='{$web}' target='_blank'>Página oficial</a></td>";
        echo "<td>";


        if (!empty($canal['options'])) {
            echo "<ul>";
            foreach ($canal['options'] as $opcion) {
                $formato = strtoupper($opcion['format'] ?? '');
                $url_stream = $opcion['url'] ?? '';
                if ($url_stream) {
                    echo "<li><a href='{$url_stream}' target='_blank'>{$formato}</a></li>";
                }
            }
            echo "</ul>";
        } else {
            echo "Sin enlaces disponibles";
        }

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>
</body>
</html>
