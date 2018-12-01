<?php
    session_start();
    include '../bd/conexao.php';
    //Caso não estiver logar o if abaixo falha e o usuario deve acessar novamente.
    if($_SESSION['nome'] == ''){
        echo '<script>alert("Faça o login novamente!");window.location.href="../index.html";</script>';
        die();
    }
    $nomeUser = $_SESSION['nome'];    
    $idUser = $_SESSION['id'];
    
    //Seta o horario de acordo com a região passada
    date_default_timezone_set('America/Sao_Paulo');
    //Função que tem o objetivo de gerar Ultimo acesso e setar no banco de dados que tem como retorno um booleno
    function alterarDatas($update, $conexao){
        $resultado =  mysqli_query($conexao, $update);
        return $resultado;
    }
    function ganharFigurinhas($conexao, $idUser, $aleatorio){
        $insert = "INSERT INTO usuariosfigurinhas(usuarios_id, figurinha_id) VALUES ($idUser, $aleatorio)";

        if(mysqli_query($conexao, $insert)){
            
        }else{
            echo "<script>alert('Erro ao gerar figurinhas.');</script>";
        }
    }
    function buscarFigurinhas($select, $idUser, $conexao){
        $resultado = mysqli_query($conexao, $select);
        $vetor = Array();  
        if(mysqli_num_rows($resultado) > 0){
            foreach($resultado as $key => $valor){
                array_push($vetor, $valor);
            }
            return $vetor;
        }
        return -1;
    }
    function buscarPerfil($select, $conexao){
        $resultado = mysqli_query($conexao, $select);
        $vetor = Array();
        if(mysqli_num_rows($resultado) > 0){
            foreach($resultado as $key => $valor){
                array_push($vetor, $valor);
            }
            return $vetor;
        }
        return -1;
    }
    function verificarUltimasFigurinhas($idUser, $conexao){
        $select = "SELECT ultimaFigurinha FROM usuarios WHERE id = '$idUser'";
        $rsSelect = buscarPerfil($select, $conexao);
        foreach ($rsSelect as $key => $value) {
            foreach ($value as $key => $value2) {
                $dataUltimaFigurinha = $value2;
            }
        }
        $dateTime = date('Y/m/d', time());
        if(strtotime($dateTime) > strtotime($dataUltimaFigurinha)){
            $update = "UPDATE `usuarios` SET `ultimaFigurinha` = '$dateTime' WHERE `id` = '$idUser'";
            alterarDatas($update, $conexao);
            return 1;
        }elseif(strtotime($dateTime) == strtotime($dataUltimaFigurinha)){
            return 0;
        }
        return -1;
    }
?>