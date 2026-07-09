<?php
require_once __DIR__ . "/config/settings.php";

/*
|--------------------------------------------------------------------------
| IMAGENS ALEATÓRIAS
|--------------------------------------------------------------------------
*/
$imagens = $pdo->query("
    SELECT * 
    FROM galeria 
    ORDER BY RAND()
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php include("config/headers.php"); ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeria - Refúgio Serrano</title>

    <link rel="stylesheet" href="assets/css/style1.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

    <!-- Google -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NS86HB6NY7"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-NS86HB6NY7');
    </script>

    <style>
        body {
            background: #0f0f0f;
            color: #fff;
            overflow-x: hidden;
        }

        .hero-gal {
            padding: 120px 20px 80px;
        }

        .hero-gal h1 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 3rem;
            font-weight: 700;
        }

        .hero-gallery {
            max-width: 1600px;
            margin: auto;
        }

        /*
        |--------------------------------------------------------------------------
        | GRID ESTILO PINTEREST
        |--------------------------------------------------------------------------
        */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            grid-auto-rows: 10px;
            gap: 15px;
        }

        .grid-item {
            position: relative;
            overflow: hidden;
            border-radius: 18px;
            cursor: pointer;
        }

        .grid-item img {
            width: 100%;
            display: block;
            border-radius: 18px;
            transition: .4s ease;
        }

        /*
        |--------------------------------------------------------------------------
        | HOVER
        |--------------------------------------------------------------------------
        */
        .grid-item::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top,
                    rgba(0, 0, 0, .55),
                    transparent);
            opacity: 0;
            transition: .4s;
            z-index: 2;
            pointer-events: none;
            border-radius: 18px;
        }

        .grid-item:hover::before {
            opacity: 1;
        }

        .grid-item:hover img {
            transform: scale(1.04);
            filter: brightness(.92);
        }

        /*
        |--------------------------------------------------------------------------
        | MODAL
        |--------------------------------------------------------------------------
        */
        .modal-content {
            background: transparent;
            border: none;
        }

        .carousel-item img {
            width: 100%;
            max-height: 90vh;
            object-fit: contain;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 4rem;
            height: 4rem;
        }

        .btn-close {
            z-index: 9999;
        }

        /*
        |--------------------------------------------------------------------------
        | RESPONSIVO
        |--------------------------------------------------------------------------
        */
        @media(max-width: 992px) {

            .grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media(max-width: 768px) {

            .hero-gal h1 {
                font-size: 2rem;
            }

        }

        @media(max-width: 500px) {

            .grid {
                grid-template-columns: 1fr;
            }

        }
    </style>

</head>

<body>

    <?php include("mod/components/menu_photos.php"); ?>

    <section class="hero-gal">

        <h1 data-aos="fade-up">
            Galeria do Refúgio Serrano
        </h1>

        <div class="hero-gallery">

            <div class="grid">

                <?php foreach ($imagens as $index => $img): ?>

                    <div
                        class="grid-item"
                        data-aos="zoom-in"
                        data-slide="<?= $index ?>">

                        <img
                            src="<?php echo BASE_URL; ?>uploads/img/<?= $img['arquivo'] ?>"
                            alt="<?= $img['titulo'] ?>"
                            loading="lazy">

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

    <!-- MODAL -->
    <div class="modal fade" id="galeriaModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-xl">

            <div class="modal-content">

                <div class="modal-body p-0 position-relative">

                    <!-- FECHAR -->
                    <button
                        type="button"
                        class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>

                    <!-- CAROUSEL -->
                    <div id="carouselGaleria" class="carousel slide">

                        <div class="carousel-inner">

                            <?php foreach ($imagens as $index => $img): ?>

                                <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">

                                    <img
                                        src="<?php echo BASE_URL; ?>uploads/img/<?= $img['arquivo'] ?>"
                                        alt="<?= $img['titulo'] ?>">

                                </div>

                            <?php endforeach; ?>

                        </div>

                        <!-- ANTERIOR -->
                        <button
                            class="carousel-control-prev"
                            type="button"
                            data-bs-target="#carouselGaleria"
                            data-bs-slide="prev">

                            <span class="carousel-control-prev-icon"></span>

                        </button>

                        <!-- PRÓXIMO -->
                        <button
                            class="carousel-control-next"
                            type="button"
                            data-bs-target="#carouselGaleria"
                            data-bs-slide="next">

                            <span class="carousel-control-next-icon"></span>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- FOOTER -->
    <?php include("mod/components/footer.php"); ?>

    <!-- WHATS -->
    <a href="https://wa.me/5551989756962" class="whatsapp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init();

        /*
        |--------------------------------------------------------------------------
        | MODAL AO CLICAR
        |--------------------------------------------------------------------------
        */
        document.querySelectorAll('.grid-item').forEach(item => {

            item.addEventListener('click', function() {

                const slideIndex = this.getAttribute('data-slide');

                const modal = new bootstrap.Modal(
                    document.getElementById('galeriaModal')
                );

                modal.show();

                setTimeout(() => {

                    const carousel = bootstrap.Carousel.getOrCreateInstance(
                        document.querySelector('#carouselGaleria')
                    );

                    carousel.to(slideIndex);

                }, 200);

            });

        });

        /*
        |--------------------------------------------------------------------------
        | AJUSTAR GRID AUTOMATICAMENTE
        |--------------------------------------------------------------------------
        */
        function resizeGridItems() {

            const grid = document.querySelector('.grid');

            const rowHeight = parseInt(
                window.getComputedStyle(grid)
                .getPropertyValue('grid-auto-rows')
            );

            const rowGap = parseInt(
                window.getComputedStyle(grid)
                .getPropertyValue('gap')
            );

            document.querySelectorAll('.grid-item').forEach(item => {

                const img = item.querySelector('img');

                const resize = () => {

                    const rowSpan = Math.ceil(
                        (img.getBoundingClientRect().height + rowGap)
                        / (rowHeight + rowGap)
                    );

                    item.style.gridRowEnd = "span " + rowSpan;

                };

                if (img.complete) {

                    resize();

                } else {

                    img.onload = resize;

                }

            });

        }

        window.addEventListener('load', resizeGridItems);

        window.addEventListener('resize', resizeGridItems);
    </script>

</body>

</html>