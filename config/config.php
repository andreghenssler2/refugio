<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once __DIR__ . '/../mod/core/db.php';

    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    header('Content-Type: text/html; charset=utf-8');
    // Gera um nonce (para inline scripts opcionais)

    $nonce = base64_encode(random_bytes(16));

    // HTTPS detecta automaticamente
    $is_https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;

    setcookie("REFUGIO_SESSION", session_id(), [
        'expires' => time() + 3600,
        'path' => '/',
        'domain' => $_SERVER['HTTP_HOST'],
        'secure' => $is_https,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);

    if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
        $https = 'https://';
    } else {
        $https = 'http://'; 
    }
    if (isset($_SERVER['HTTP_HOST']) === TRUE) {
        $host = $_SERVER['HTTP_HOST'];
        if($host == "localhost") {
            $host .= "/refugio";
        }else{
            $host .= $host;
        }
    }
    

    define('BASE_URL', $https . $host . '/');
    define('ASSETS_URL', BASE_URL . 'assets/');
    define('ASSETS_CSS_URL', BASE_URL . 'assets/css/');
    define('ASSETS_JS_URL', BASE_URL . 'assets/js/');
    define('UPLOADS_IMG_URL', BASE_URL . 'uploads/img/');
    define('IMG_URL', BASE_URL . 'img/');
    
    
