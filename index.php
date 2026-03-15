<?php
include("config/settings.php");
if (!isset($_SESSION['acesso'])) {
    include_once "mod/core/auth.php ";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php

        include("config/headers.php");
    ?>
    <title>Refúgio Serrano</title>
    <meta name="description" content="Descanso cercado pela natureza, com conforto e tranquilidade">
    <meta name="keywords"
        content="descanso, natureza, tranquilidade, cabanas, refúgio, sao chico, são francisco de paula" />
    <link rel="canonical" href="https://refugioserrano.com.br" />
    <link rel="next" href="https://refugioserrano.com.br">
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Refúgio Serrano" />
    <meta property="og:url" content="https://refugioserrano.com.br" />
    <meta property="og:site_name"
        content="Descanso cercado pela natureza, com conforto e tranquilidade | Refúgio Serrano" />
    <meta property="og:image" content="" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="720" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary" />


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NS86HB6NY7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-NS86HB6NY7');
    </script>

</head>

<body>
    <!-- MENU -->

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">

        <div class="container">

            <a class="navbar-brand fw-bold" href="#">
                Refugio Serrano - São Francisco de Paula
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item"><a class="nav-link" href="#sobre">Sobre</a></li>

                    <li class="nav-item"><a class="nav-link" href="#chales">Chalés</a></li>

                    <li class="nav-item"><a class="nav-link" href="#galeria">Galeria</a></li>

                    <li class="nav-item"><a class="nav-link" href="#localizacao">Localização</a></li>

                </ul>

                <a href="https://www.booking.com/" class="btn btn-success ms-3">
                    Reservar
                </a>

            </div>
        </div>

    </nav>

    <!-- HERO -->

    <section class="hero">

        <div class="overlay"></div>

        <div class="container text-center hero-content" data-aos="fade-up">

            <h1 class="display-3 fw-bold">
                Refúgio Serrano
            </h1>

            <p class="lead mb-4">
                Chalé aconchegante em meio à natureza
            </p>

            <a href="https://www.booking.com/" class="btn btn-book btn-lg">
                Reservar Agora
            </a>

        </div>

    </section>

    <!-- SOBRE -->

    <section class="section" id="sobre">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6" data-aos="fade-right">

                    <h2>Um refúgio na serra</h2>

                    <p>
                        O Refúgio Serrano é o lugar ideal para quem busca tranquilidade,
                        natureza e conforto.
                    </p>

                    <p>
                        Aproveite chalés aconchegantes, café da manhã especial e
                        uma experiência única em meio às montanhas.
                    </p>

                </div>

                <div class="col-md-6" data-aos="fade-left">

                    <img src="<?php echo UPLOADS_IMG_URL; ?>IMG-20260205-WA0008.jpg" class="img-fluid rounded">

                </div>

            </div>

        </div>

    </section>

    <!-- CHALES -->

    <section class="section bg-light" id="chales">

        <div class="container text-center">

            <h2 class="mb-5">Nossos Chalés</h2>

            <div class="row">

                <div class="col-md-4" data-aos="zoom-in">

                    <div class="card shadow">

                        <img src="<?php echo UPLOADS_IMG_URL; ?>cabana.jpeg" class="card-img-top">

                        <div class="card-body">

                            <h5>Chalé Casal</h5>

                            <p>Perfeito para momentos românticos.</p>

                            <a href="https://www.booking.com/" class="btn btn-success">
                                Ver disponibilidade
                            </a>

                        </div>

                    </div>

                </div>

                <div class="col-md-4" data-aos="zoom-in">

                    <div class="card shadow">

                        <img src="<?php echo UPLOADS_IMG_URL; ?>cabana1.jpeg" class="card-img-top">

                        <div class="card-body">

                            <h5>Chalé com Lareira</h5>

                            <p>Conforto e charme para noites frias.</p>

                            <a href="https://www.booking.com/" class="btn btn-success">
                                Reservar
                            </a>

                        </div>

                    </div>

                </div>

                <div class="col-md-4" data-aos="zoom-in">

                    <div class="card shadow">

                        <img src="<?php echo UPLOADS_IMG_URL; ?>cabana2.jpeg" class="card-img-top">

                        <div class="card-body">

                            <h5>Chalé Família</h5>

                            <p>Espaço ideal para relaxar com quem você ama.</p>

                            <a href="https://www.booking.com/" class="btn btn-success">
                                Reservar
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- GALERIA -->

    <section class="section" id="galeria">

        <div class="container text-center">

            <h2 class="mb-5">Galeria</h2>

            <div class="row gallery">

                <div class="col-md-4 mb-4" data-aos="fade-up">
                    <img src="<?php echo UPLOADS_IMG_URL; ?>foto (6).jpg" class="img-fluid">
                </div>

                <div class="col-md-4 mb-4" data-aos="fade-up">
                    <img src="<?php echo UPLOADS_IMG_URL; ?>cabana.jpeg" class="img-fluid">
                </div>

                <div class="col-md-4 mb-4" data-aos="fade-up">
                    <img src="<?php echo UPLOADS_IMG_URL; ?>cabana2.jpeg" class="img-fluid">
                </div>

                <div class="col-md-4 mb-4" data-aos="fade-up">
                    <img src="<?php echo UPLOADS_IMG_URL; ?>cabana2.jpeg" class="img-fluid">
                </div>

            </div>

        </div>

    </section>
    <section class="container py-5">

        <h2 class="text-center mb-5">Reserve sua estadia</h2>

        <div class="row g-4">

            <div class="col-md-6">

                <div class="card shadow h-100">

                    <div class="card-body text-center">

                        <h4>Refúgio Serrano</h4>

                        <p>
                            Hospedagem completa com chalés aconchegantes
                            e café da manhã.
                        </p>

                        <a href="https://www.booking.com/hotel/br/refugio-serrano-sao-francisco-de-paula1.pt-br.html"
                            target="_blank" class="btn btn-success w-100">

                            Ver disponibilidade

                        </a>

                    </div>

                </div>
            </div>

            <div class="col-md-6">

                <div class="card shadow h-100">

                    <div class="card-body text-center">

                        <h4>Chalé Refúgio Serrano</h4>

                        <p>
                            Chalé privativo ideal para casal
                            em meio à natureza.
                        </p>

                        <a href="https://www.booking.com/hotel/br/refugio-serrano-chale.pt-pt.html" target="_blank"
                            class="btn btn-success w-100">

                            Reservar Chalé

                        </a>

                    </div>

                </div>
            </div>

        </div>

    </section>

    <!-- CTA -->

    <section class="cta text-center">

        <div class="container" data-aos="zoom-in">

            <h2>Reserve sua experiência na serra</h2>

            <p class="mb-4">
                Garanta sua hospedagem agora mesmo
            </p>

            <a href="https://www.booking.com/" class="btn btn-light btn-lg">
                Reservar no Booking
            </a>

        </div>

    </section>

    <!-- MAPA -->

    <section class="section" id="localizacao">

        <div class="container text-center">

            <h2 class="mb-4">Localização</h2>

            <div class="ratio ratio-16x9">

                <iframe src="https://www.google.com/maps?q=Cabana+Refugio+Serrano&output=embed" loading="lazy">
                </iframe>

            </div>

        </div>

    </section>

    <!-- FOOTER -->

    <footer class="bg-dark text-light text-center p-4">

        <p>
            © 2026 Refúgio Serrano
        </p>

    </footer>

    <!-- WHATSAPP -->

    <a href="https://wa.me/5551989756962" class="whatsapp">

        <i class="fab fa-whatsapp"></i>

    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

</body>

</html>