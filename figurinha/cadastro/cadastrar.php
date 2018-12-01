<?php
    //Verificar se o numero de caractere bate com o do banco de dados
    if(strlen($_POST['nome']) == 0 or strlen($_POST['nome']) > 50){
        echo "<script>alert('O numero de caracteres do Nome não podem ser aceitos!');window.location.href='../index.html';</script>";
        die();
    }
    if(strlen($_POST['email']) == 0 or strlen($_POST['email']) > 50){
        echo "<script>alert('O numero de caracteres do Email não podem ser aceitos!');window.location.href='../index.html';</script>";
        die();
    }
    if(strlen($_POST['login']) == 0 or strlen($_POST['login']) > 15){
        echo "<script>alert('O numero de caracteres do Login não podem ser aceitos!');window.location.href='../index.html';</script>";
        die();
    }
    if(strlen($_POST['senha']) == 0 or strlen($_POST['senha']) > 30){
        echo "<script>alert('O numero de caracteres da Senha não podem ser aceitos!');window.location.href='../index.html';</script>";
        die();
    }
    //Começa a receber os dados digitados pelo usuario
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    include "../bd/conexao.php";
    //verifica se há usuarios com email e login existente no banco de dados, se houver não é feito o cadastro 
    //do novo usuario
    $select = "SELECT * FROM usuarios WHERE login = '$login'";
    $select2 = "SELECT * FROM usuarios WHERE email = '$email'";
    $Rs =  mysqli_query($conexao, $select);
    $Rs2 =  mysqli_query($conexao, $select2);
    if(mysqli_num_rows($Rs) > 0){
        echo "<script>alert('Esse Login já existe');window.location.href='index.html';</script>";
        die();
    }elseif(mysqli_num_rows($Rs2) > 0){
        echo "<script>alert('Esse Email já existe');window.location.href='index.html';</script>";
        die();
    }
    //fazendo os codigos sql para inserção no banco de dados
    $insert = "INSERT INTO usuarios VALUES (null, '$nome', '$email', '$login', '$senha', '0-0-0 0:0:0', '0-0-0')";
    if(mysqli_query($conexao, $insert)){
        session_start();
        $_SESSION['nome'] = $nome;
        $select = "SELECT `id` FROM `usuarios` WHERE `nome` = '$nome' ORDER BY 'id' DESC LIMIT 1";
        $resultado = mysqli_query($conexao, $select);
        if($resultado){
            $res = mysqli_fetch_assoc($resultado);
            $_SESSION['id'] = $res['id'];
        }
        echo "<script>window.location.href='../logado';</script>";
    }else{
        echo "<script>alert('Dados não aceito pelo Banco de Dados');window.location.href='index.html';</script>";
    }
    mysqli_close($conexao);
?>  