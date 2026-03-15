<?php

$msg = "";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php
    // session_start();
    require_once __DIR__ . '/../config/settings.php';
    ?>
    <title>Integrações - Refúgio Serrano</title>

    <link rel="stylesheet" href="../assets/css/admin/admin.css">
    <script src="../assets/js/menu.js"></script>

    <style>
        .box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .box h2 {
            margin-top: 0;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-top: 5px;
        }

        .btn {
            background: #2563eb;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 15px;
        }

        .btn:hover {
            background: #1e40af;
        }

        .success {
            background: #dcfce7;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .linkbox {
            background: #f9fafb;
            padding: 10px;
            border-radius: 6px;
            word-break: break-all;
            margin-top: 10px;
        }
    </style>

</head>

<body>
    <?php
require_once "../mod/components/menu.php";
// require_once "core/db.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $booking = $_POST['booking_ical'] ?? "";
    $airbnb = $_POST['airbnb_ical'] ?? "";

    $sql = $pdo->prepare(" UPDATE configuracoes SET booking_ical=?, airbnb_ical=? WHERE id=1 ");

    $sql->execute([$booking, $airbnb]);

    $msg = "Integrações salvas com sucesso!";
}

$config = $pdo->query("SELECT * FROM configuracoes WHERE id=1")->fetch(PDO::FETCH_ASSOC);

$booking_ical = $config['booking_ical'] ?? "";
$airbnb_ical = $config['airbnb_ical'] ?? "";

$export_url = BASE_URL."api/exportar_calendario.php";

?>
    <div class="main">

        <h1>🔗 Integrações</h1>

        <?php if ($msg): ?>
            <div class="success"><?= $msg ?></div>
        <?php endif; ?>

        <form method="POST">

            <div class="box">

                <h2>🏨 Booking</h2>

                <p>Cole aqui o link iCal do Booking.</p>

                <input type="text" name="booking_ical" value="<?= htmlspecialchars($booking_ical) ?>"
                    placeholder="https://admin.booking.com/hotel/hoteladmin/ical.html?...">

            </div>

            <div class="box">

                <h2>🏠 Airbnb</h2>

                <p>Cole aqui o link iCal do Airbnb.</p>

                <input type="text" name="airbnb_ical" value="<?= htmlspecialchars($airbnb_ical) ?>"
                    placeholder="https://www.airbnb.com/calendar/ical/...">

            </div>

            <button class="btn">Salvar Integrações</button>

        </form>

        <div class="box">

            <h2>📤 Exportar Calendário do Site</h2>

            <p>Use este link para sincronizar seu calendário com Booking ou Airbnb.</p>

            <div class="linkbox">

                <?= $export_url ?>

            </div>

        </div>

        <div class="box">

            <h2>🔄 Sincronização automática</h2>

            <p>Para manter as reservas sincronizadas, configure um cron job no servidor:</p>

            <pre>

*/15 * * * * php /caminho/site/cron/importar_booking.php
*/15 * * * * php /caminho/site/cron/importar_airbnb.php

</pre>

        </div>

    </div>

</body>

</html>
