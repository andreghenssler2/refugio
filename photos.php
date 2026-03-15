<?php
require_once __DIR__ . "/config/settings.php";

$imagens = $pdo->query("SELECT * FROM galeria ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <title>Galeria - Refúgio Serrano</title>

    <style>
        body {
            font-family: Arial;
            background: #fafafa;
            padding: 40px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .grid img {
            width: 100%;
            border-radius: 10px;
            transition: .3s;
        }

        .grid img:hover {
            transform: scale(1.05);
        }
    </style>

</head>

<body>

    <h1>Galeria do Refúgio Serrano</h1>

    <div class="grid">

        <?php foreach ($imagens as $img): ?>

            <img src="<?php echo BASE_URL; ?>uploads/img/<?= $img['arquivo'] ?>" alt="<?= $img['titulo'] ?>">

        <?php endforeach; ?>

    </div>

</body>

</html>