<?php
    session_start();
    include '../bd/conexao.php';
    //Caso não estiver logar o if abaixo falha e o usuario deve acessar novamente.
    if($_SESSION['nome'] == ''){
        echo '<script>alert("Faça o login novamente!");window.location.href="../index.html";</script>';
    }
    $nomeUser = $_SESSION['nome'];
    $idUser = $_SESSION['id'];
    //Seta o horario de acordo com a região passada
    date_default_timezone_set('America/Sao_Paulo');
    //Função que tem o objetivo de gerar Ultimo acesso e setar no banco de dados que tem como retorno um booleno
    function gerarUltimoAcesso($conexao){
        $dateTime = date('Y/m/d H:i:s', time());
        $update = "UPDATE `usuarios` SET `ultimoAcesso` = '$dateTime' WHERE `nome` = 'admin'"; 

        $resultado =  mysqli_query($conexao, $update);
    
        return $resultado;
    }

    function ganharFigurinhas(){
        $select = "SELECT 'ultimoAcesso', 'ultimaFigurinha' from 'usuarios where 'id' = '$idUser'";
        

    }

?>