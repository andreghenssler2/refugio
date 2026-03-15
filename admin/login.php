<?php
    if(!file_exists('install/criado.txt')){
        header("Location: install/");
    }
?>
<?php $msg = ""; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
        session_start();
        require_once __DIR__ . '/../config/settings.php';
    ?>
 <title>Admin - Refúgio Serrano</title>


</head>

<body class="admin_login">

    <div class="login-box">

        <div class="logo">Refúgio Serrano</div>

        <h2>Painel Administrativo</h2>

        <?php if ($msg): ?>
            <div class="erro"><?= $msg ?></div>
        <?php endif; ?>

        <form method="POST">

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">Entrar</button>

        </form>

    </div>

</body>

</html>
<?php
// echo password_hash("123456", PASSWORD_DEFAULT);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $sql->execute([$email]);

    if ($sql->rowCount() > 0) {

        $user = $sql->fetch(PDO::FETCH_ASSOC);

        if (password_verify($senha, $user['senha'])) {
            $_SESSION['admin'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['acesso'] = password_hash($user['nome'].rand(100000, 900000), PASSWORD_DEFAULT);


            header("Location: dashboard.php");
            exit;

        } else {
            $msg = "Senha incorreta";
        }

    } else {
        $msg = "Usuário não encontrado";
    }
}
?>