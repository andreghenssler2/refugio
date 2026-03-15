<?php

require_once "../config/config.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$nome = $data['nome'];

$stmt = $pdo->prepare("UPDATE galeria SET titulo=? WHERE id=?");
$stmt->execute([$nome, $id]);

echo json_encode(["success" => true]);