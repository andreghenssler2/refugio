<?php
require_once __DIR__.'/../core/auth.php';
require_once __DIR__.'/../core/db.php';

$reservas = $pdo->query("SELECT COUNT(*) FROM reservas")->fetchColumn();
?>

<h1>Painel Refúgio Serrano</h1>

<ul>
<li>Total reservas: <?= $reservas ?></li>
<li><a href="reservas.php">Reservas</a></li>
<li><a href="calendario.php">Calendário</a></li>
<li><a href="booking.php">Integração Booking</a></li>
</ul>