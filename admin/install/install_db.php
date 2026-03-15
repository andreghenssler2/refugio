<?php

echo "<h2>Instalando banco - Refúgio Serrano</h2>";

require_once __DIR__ . "/../../config/settings.php";

try {

    /* TABELA CHALES */

    $pdo->exec("
CREATE TABLE IF NOT EXISTS chales (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");

    /* TABELA CONFIGURAÇÕES */

    $pdo->exec("
CREATE TABLE IF NOT EXISTS configuracoes (
id INT PRIMARY KEY,
booking_ical TEXT,
airbnb_ical TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");

    /* TABELA RESERVAS */

    $pdo->exec("
CREATE TABLE IF NOT EXISTS reservas (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(120),
email VARCHAR(120),
chale_id INT,
data_checkin DATE,
data_checkout DATE,
pessoas INT,
status VARCHAR(30),
origem VARCHAR(50),
criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");

    /* TABELA USUÁRIOS */

    $pdo->exec("
CREATE TABLE IF NOT EXISTS usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
email VARCHAR(120),
senha VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
");

    echo "✔ Tabelas criadas<br>";

    /* CONFIGURAÇÃO PADRÃO */

    $config = $pdo->query("SELECT id FROM configuracoes LIMIT 1")->fetch();

    if (!$config) {

        $pdo->exec("
INSERT INTO configuracoes (id, booking_ical, airbnb_ical)
VALUES (
1,
'https://ical.booking.com/v1/export?27353500acde0998ccc077fe84688d21',
''
)
");

        echo "✔ Configuração criada<br>";

    }

    /* USUÁRIO ADMIN */

    $user = $pdo->query("SELECT id FROM usuarios WHERE email='admin@email.com'")->fetch();

    if (!$user) {

        $senha = password_hash("123456", PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
INSERT INTO usuarios (nome,email,senha)
VALUES (?,?,?)
");

        $stmt->execute([
            'Admin',
            'admin@email.com',
            $senha
        ]);

        echo "✔ Usuário admin criado<br>";
        echo "Login: admin@email.com<br>";
        echo "Senha: 123456<br>";

    }

    echo "<h3>🎉 Instalação concluída</h3>";
    echo "<a href='../login.php'>Ir para login</a>";

} catch (Exception $e) {

    echo "Erro na instalação: " . $e->getMessage();

}