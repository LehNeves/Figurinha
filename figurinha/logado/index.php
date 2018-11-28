<?php
    include 'verificar.php';
    include '../bd/conexao.php';
    echo "<script>alert('Bem vindo $nomeUser');</script>";

    $update = "UPDATE `usuarios` SET `ultimoAcesso` = '2018/11/28 15:08:42' WHERE `nome` = 'admin'";
    print_r($update);   

?>