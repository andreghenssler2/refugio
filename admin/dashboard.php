<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php
        // session_start();
        require_once __DIR__ . '/../config/settings.php';
    ?>
    <title>Dashboard - Refúgio Serrano</title>

    <link rel="stylesheet" href="../assets/css/admin/admin.css">
    <script src="../assets/js/menu.js"></script>

    <style>
        /* HEADER */

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h1 {
            margin: 0;
            font-size: 28px;
        }

        /* CARDS */

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .05);
            transition: .2s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .card .number {
            font-size: 32px;
            font-weight: bold;
            color: #111827;
        }

        .card .label {
            color: #6b7280;
            margin-top: 5px;
        }

        /* TABELA */

        .table-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #f3f3f3;
        }

        .status {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            color: white;
        }

        .status.confirmado {
            background: #16a34a;
        }

        .status.pendente {
            background: #f59e0b;
        }

        .status.cancelado {
            background: #dc2626;
        }
    </style>

</head>

<body>
<?php require_once "../mod/components/menu.php";?>

    <div class="main">

        <div class="topbar">

            <h1>🏔 Dashboard</h1>

            <div>
                Bem-vindo ao painel do <b>Refúgio Serrano</b>
            </div>

        </div>

        <!-- CARDS -->

        <div class="cards">

            <div class="card">
                <div class="number">12</div>
                <div class="label">Reservas totais</div>
            </div>

            <div class="card">
                <div class="number">4</div>
                <div class="label">Check-ins hoje</div>
            </div>

            <div class="card">
                <div class="number">3</div>
                <div class="label">Chalés disponíveis</div>
            </div>

            <div class="card">
                <div class="number">R$ 6.200</div>
                <div class="label">Receita do mês</div>
            </div>

        </div>

        <!-- RESERVAS RECENTES -->

        <div class="table-box">

            <h3>Reservas recentes</h3>

            <table>

                <tr>
                    <th>Hóspede</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td>João Silva</td>
                    <td>18/03</td>
                    <td>20/03</td>
                    <td><span class="status confirmado">Confirmado</span></td>
                </tr>

                <tr>
                    <td>Ana Souza</td>
                    <td>21/03</td>
                    <td>23/03</td>
                    <td><span class="status pendente">Pendente</span></td>
                </tr>

                <tr>
                    <td>Carlos Lima</td>
                    <td>25/03</td>
                    <td>27/03</td>
                    <td><span class="status cancelado">Cancelado</span></td>
                </tr>

            </table>

        </div>

    </div>

</body>

</html>
