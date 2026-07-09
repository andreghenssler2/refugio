<?php
include("../config/settings.php");
if(isset($_GET)){
    $id = $_GET['id'] ?? null;
    $local = $_GET['local'] ?? null;
    if($id == "cabana"){
        header("Location: https://www.booking.com/hotel/br/refugio-serrano-sao-francisco-de-paula1.pt-br.html");

        $local = "Cabana - ";
        
    }else if($id == "chale"){

        $local = "Chalé - ";
        header("Location: https://www.booking.com/hotel/br/refugio-serrano-chale.pt-pt.html");

    }else if($id == "chale_charme"){

        $local = "Chalé - ";
        header("Location: https://www.booking.com/hotel/br/refugio-serrano-chale.pt-pt.html");
    }
    else {
        header("Location: https://refugioserrano.com.br");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php

    include("../config/headers.php");
    ?>
    <title><?php echo $local; ?>Refúgio Serrano</title>
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
    <h1>Redirecionando...</h1>
</body>

</html>