<?php
require_once "../mod/core/db.php";

$busca = $_GET['busca'] ?? '';
$status = $_GET['status'] ?? '';

$sql = "SELECT r.*, c.nome as chale
        FROM reservas r
        LEFT JOIN chales c ON c.id = r.chale_id
        WHERE 1=1";

$params = [];

if ($busca) {
    $sql .= " AND r.nome LIKE ?";
    $params[] = "%$busca%";
}

if ($status) {
    $sql .= " AND r.status = ?";
    $params[] = $status;
}

$sql .= " ORDER BY data_checkin DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
        // session_start();
        require_once __DIR__ . '/../config/settings.php';
        ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reservas - Refúgio Serrano</title>

    <link rel="stylesheet" href="../assets/css/admin/admin.css">
    <script src="../assets/js/menu.js"></script>
    <style>
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn:hover {
            background: #1e40af;
        }

        .filtros {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filtros input,
        .filtros select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .table-box {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            overflow: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        th {
            background: #f9fafb;
        }

        .status {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            color: white;
        }

        .confirmado {
            background: #16a34a;
        }

        .pendente {
            background: #f59e0b;
        }

        .cancelado {
            background: #dc2626;
        }
    </style>

</head>

<body>
<?php require_once "../mod/components/menu.php";?>

    <div class="main">

        <div class="topbar">

            <h1>📅 Reservas</h1>

            <a href="nova_reserva.php" class="btn">
                + Nova Reserva
            </a>

        </div>

        <!-- FILTROS -->

        <form class="filtros">

            <input type="text" name="busca" placeholder="Buscar hóspede" value="<?= htmlspecialchars($busca) ?>">

            <select name="status">

                <option value="">Todos status</option>

                <option value="confirmado" <?= $status == "confirmado" ? 'selected' : '' ?>>
                    Confirmado
                </option>

                <option value="pendente" <?= $status == "pendente" ? 'selected' : '' ?>>
                    Pendente
                </option>

                <option value="cancelado" <?= $status == "cancelado" ? 'selected' : '' ?>>
                    Cancelado
                </option>

            </select>

            <button class="btn">Filtrar</button>

        </form>

        <!-- TABELA -->

        <div class="table-box">

            <table>

                <tr>

                    <th>Hóspede</th>
                    <th>Chalé</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Pessoas</th>
                    <th>Status</th>
                    <th>Ações</th>

                </tr>

                <?php foreach ($reservas as $r): ?>

                    <tr>

                        <td><?= htmlspecialchars($r['nome']) ?></td>

                        <td><?= htmlspecialchars($r['chale']) ?></td>

                        <td><?= date("d/m/Y", strtotime($r['data_checkin'])) ?></td>

                        <td><?= date("d/m/Y", strtotime($r['data_checkout'])) ?></td>

                        <td><?= $r['pessoas'] ?></td>

                        <td>

                            <span class="status <?= $r['status'] ?>">
                                <?= ucfirst($r['status']) ?>
                            </span>

                        </td>

                        <td>

                            <a href="editar_reserva.php?id=<?= $r['id'] ?>">✏</a>

                            <a href="excluir_reserva.php?id=<?= $r['id'] ?>"
                                onclick="return confirm('Excluir reserva?')">🗑</a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </table>

        </div>

    </div>

</body>

</html>