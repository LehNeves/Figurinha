<?php
    //Chamar o arquivo verificar para poder saber se realmente está logado 
    include 'verificar.php';

    $figOutroUser = $_SESSION['figOutroUser'];

    if(empty($_POST['figEsteUser'])){
        echo "<script>alert('Erro ao receber Figurinhas do Checkbox');window.location.href='index.php';</script>";
        die();
    }

    $figEsteUser = $_POST['figEsteUser'];
?>