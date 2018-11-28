<?php
    session_start();
    if($_SESSION['nome'] == ''){
        echo '<script>alert("Faça o login novamente!");window.location.href="../index.html";</script>';
    }
    $nomeUser = $_SESSION['nome'];

    date_default_timezone_set('America/Sao_Paulo');
    $dateTime = date('Y/m/d H:i:s', time());

?>