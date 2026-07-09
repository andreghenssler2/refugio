<?php

// Detecta se é ambiente local
$host_local = ['localhost', '127.0.0.1'];

if (in_array($_SERVER['SERVER_NAME'], $host_local)) {

    // 💻 DESENVOLVIMENTO (local)
    $db_host = 'localhost';
    $db_nome = 'andegu01_refugio';
    $db_usuario = 'root';
    $db_senha = '';

} else {

    // 🌐 PRODUÇÃO (servidor)
    $db_host = 'localhost';
    $db_nome = 'andegu01_refugio';
    $db_usuario = 'andegu01_edson';
    $db_senha = 'Refugio2024!';

}

try {

    $pdo = new PDO(
        "mysql:host=$db_host;dbname=$db_nome;charset=utf8mb4",
        $db_usuario,
        $db_senha,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    // echo "Conectado com sucesso";

} catch (PDOException $e) {

    die("Erro na conexão: " . $e->getMessage());

}