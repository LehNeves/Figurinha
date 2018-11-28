<?php
    include 'verificar.php';
    echo "<script>alert('Bem vindo $nomeUser');</script>";

    if(!gerarUltimoAcesso($dateTime, $conexao)){
        echo "<script>alert('Erro ao passar Ultimo Acesso');</script>";
    }

    
    

?>