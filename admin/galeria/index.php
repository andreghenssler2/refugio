<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
    require_once __DIR__ . "/../../config/settings.php";

    $imagens = $pdo->query("SELECT * FROM galeria ORDER BY id DESC")->fetchAll();
    ?>
    <meta charset="UTF-8">
    <title>Galeria - Refúgio Serrano</title>
    <link rel="stylesheet" href="../../assets/css/admin/admin.css">
    <script src="../../assets/js/menu.js"></script>
    <script src="../../assets/js/theme.js"></script>

    <style>
        body {
            font-family: Arial;
            background: #f5f6fa;
            padding: 40px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .upload-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .05);
        }

        .card img {
            width: 100%;
            border-radius: 8px;
        }

        .delete {
            color: red;
            text-decoration: none;
            font-size: 14px;
        }
    </style>

</head>

<body>
    <?php
    require_once "../../mod/components/menu.php";
    ?>
    <div class="main">
        <h1>📸 Galeria de Imagens</h1>

        <div class="upload-box">

            <form action="../../api/upload_imagem.php" method="POST" enctype="multipart/form-data">

                <input type="text" name="titulo" placeholder="Título da imagem">

                <br><br>

                <input type="file" name="imagem" required>

                <br><br>

                <button type="submit">Enviar imagem</button>

            </form>

        </div>

        <div class="grid">

            <?php foreach ($imagens as $img): ?>

                <div class="col-md-3 mb-4 card-img" data-id="<?= $img['id'] ?>">

                    <div class="card shadow-sm">

                        <img src="<?= BASE_URL ?>uploads/img/<?= $img['arquivo'] ?>" class="card-img-top">

                        <div class="card-body text-center">

                            <p class="card-text"><?= $img['titulo'] ?></p>

                            <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $img['id'] ?>"
                                data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Excluir
                            </button>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">Excluir imagem</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    Deseja realmente excluir esta imagem?

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="button" class="btn btn-danger" id="confirmDelete">
                        Excluir
                    </button>

                </div>

            </div>

        </div>

    </div>

</body>

</html>