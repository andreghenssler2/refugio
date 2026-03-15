

<?php
    include(__DIR__ . "/../config/settings.php");
    if(isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == true) {
        header("Location: dashboard.php");
        exit();
    }else{
        header("Location: login.php");
        exit();
    }
?>
