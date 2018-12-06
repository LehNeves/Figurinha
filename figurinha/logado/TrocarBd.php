<?php
    //Chamar o arquivo verificar para poder saber se realmente está logado 
    include 'verificar.php';
    $outroUser = $_SESSION['outroUser'];
    if(empty($_POST['figEsteUser'])){
        echo "<script>alert('Erro ao receber Figurinhas do Checkbox');window.location.href='index.php';</script>";
        die();
    }
    $figEsteUser = $_POST['figEsteUser'];
    $user = explode(",", $outroUser);
    $update = "UPDATE `usuariosfigurinhas` SET `usuario_id` = $user[0],`disponivel` = 1 WHERE `id` = '$figEsteUser'";
    if(!update($update, $conexao)){
        echo "<script>alert('Erro ao trocar Figurinha');window.location.href='index.php';</script>";
    }
    $update2 = "UPDATE `usuariosfigurinhas` SET `usuario_id` = $idUser,`disponivel` = 1 WHERE `id` = '$user[1]'";
    if(!update($update2, $conexao)){
        echo "<script>alert('Erro ao trocar Figurinha');window.location.href='index.php';</script>";
    }
?>