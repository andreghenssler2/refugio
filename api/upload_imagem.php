<?php

require_once __DIR__ . "/../config/settings.php";

$dir = __DIR__ . "/../uploads/img/";

if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

$titulo = $_POST['titulo'] ?? '';

$nome = time() . '_' . $_FILES['imagem']['name'];

$tmp = $_FILES['imagem']['tmp_name'];

move_uploaded_file($tmp, $dir . $nome);

$stmt = $pdo->prepare("INSERT INTO galeria (arquivo,titulo) VALUES (?,?)");

$stmt->execute([$nome, $titulo]);

header("Location: " . BASE_URL . "admin/galeria");