<?php

require_once "../mod/core/db.php";

header('Content-Type: text/calendar; charset=utf-8');

echo "BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//Refugio Serrano//PT
";

$sql = $pdo->query("SELECT * FROM reservas");

while ($r = $sql->fetch(PDO::FETCH_ASSOC)) {

    echo "BEGIN:VEVENT
SUMMARY:Reserva
DTSTART:" . date('Ymd', strtotime($r['data_checkin'])) . "
DTEND:" . date('Ymd', strtotime($r['data_checkout'])) . "
END:VEVENT
";

}

echo "END:VCALENDAR";