<?php

require_once __DIR__ . "/../config/config.php";

header('Content-Type: application/json');

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT arquivo FROM galeria WHERE id=?");
$stmt->execute([$id]);

$img = $stmt->fetch();

if ($img) {

    $arquivo = __DIR__ . "/../uploads/img/" . $img['arquivo'];

    if (file_exists($arquivo)) {
        unlink($arquivo);
    }

    $pdo->prepare("DELETE FROM galeria WHERE id=?")->execute([$id]);

    echo json_encode(["success" => true]);
    exit;

}

echo json_encode(["success" => false]);

// header("Location: " . BASE_URL . "admin/galeria");
exit;
