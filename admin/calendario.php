<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php
        // session_start();
        require_once __DIR__ . '/../config/settings.php';
    ?>

    <title>Calendário de Reservas - Refúgio Serrano</title>

    <link rel="stylesheet" href="../assets/css/admin/admin.css">
    <script src="../assets/js/menu.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    <style>
        .calendar-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        #calendar {
            max-width: 100%;
        }

        .fc-event {
            cursor: pointer;
        }
    </style>

</head>

<body>
<?php
require_once "../mod/components/menu.php";
?>
    <div class="main">

        <h1>📅 Calendário de Reservas</h1>

        <div class="calendar-box">

            <div id="calendar"></div>

        </div>

    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {

                initialView: 'dayGridMonth',

                locale: 'pt-br',

                height: 'auto',

                events: '/api/reservas.php',

                editable: true,

                selectable: true,

                select: function (info) {

                    if (confirm("Criar reserva para esta data?")) {

                        window.location =
                            "/admin/nova_reserva.php?checkin=" + info.startStr +
                            "&checkout=" + info.endStr;

                    }

                },

                eventDrop: function (info) {

                    fetch('/api/mover_reserva.php', {

                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/json'
                        },

                        body: JSON.stringify({

                            id: info.event.id,
                            checkin: info.event.startStr,
                            checkout: info.event.endStr

                        })

                    });

                }

            });

            calendar.render();

        });

    </script>

</body>

</html>