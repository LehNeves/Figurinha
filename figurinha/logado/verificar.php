<?php
    session_start();
    include '../bd/conexao.php';
    if($_SESSION['nome'] == ''){
        echo '<script>alert("Faça o login novamente!");window.location.href="../index.html";</script>';
    }
    $nomeUser = $_SESSION['nome'];

    date_default_timezone_set('America/Sao_Paulo');
    
    function gerarUltimoAcesso($conexao){
        $dateTime = date('Y/m/d H:i:s', time());
        $update = "UPDATE `usuarios` SET `ultimoAcesso` = '$dateTime' WHERE `nome` = 'admin'"; 

        $resultado =  mysqli_query($conexao, $update);
    
        return $resultado;
    }


?>