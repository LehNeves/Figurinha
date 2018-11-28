<?php
    session_start();
    if($_SESSION['nome'] == ''){
        echo '<script>alert("Faça o login novamente!");window.location.href="../index.html";</script>';
    }
    $nomeUser = $_SESSION['nome'];

    echo '<script>alert("Bem vindo $nomeUser");</script>';
?>