<?php 
    //Verifica se o usuario digitou alguma coisa em login e senha, caso tenha digitado falha 
    //no primeiro if e vai pro else
    if(($_POST['login'] == '') or ($_POST['senha']) == ''){
        echo "<script>alert('Login e/ou senha vazio!');window.location.href='index.html';</script>";
    }else{
        //Verifica se existe usuario com login e senha digitado
        include "bd/conexao.php";
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";

        $consulta =  mysqli_query($conexao, $sql);
        //Caso não exista o if abaixo é true e ele não consegue acessar
        if(mysqli_num_rows($consulta)<=0){
            echo "<script>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
        }else{
            //Caso exista entra nesse else, e cria uma session com o nome do usuario cadastrado no banco de dados
            session_start();
            //Vetor criado com o retorno da consulta MySql, para que possa pegar o nome do usuario
            $vetor = mysqli_fetch_assoc($consulta);
            $_SESSION['nome'] = $vetor['nome'];
            echo "<script>window.location.href='logado/';</script>";
        }
        mysqli_close($conexao);
    }
?>