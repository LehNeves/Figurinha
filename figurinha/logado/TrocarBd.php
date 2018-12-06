<?php
    //Chamar o arquivo verificar para poder saber se realmente está logado 
    include 'verificar.php';

    $outroUser = $_SESSION['outroUser'];
    if(empty($_POST['figEsteUser'])){
        echo "<script>alert('Erro ao receber Figurinhas do Checkbox');window.location.href='index.php';</script>";
        die();
    }

    $figEsteUser = $_POST['figEsteUser'];

    if(count($outroUser) != count($figEsteUser)){
        echo "<script>alert('A quantidade de figurinhas não correspondem!');window.location.href='index.php';</script>";
        die();
    }
    foreach ($outroUser as $key => $value) {
        $users = explode(",", $value);
        print_r($users);
    }
    
    // 

    // if(count($figEsteUser) != count($figOutroUser)){
    //     
    // }

    // print_r($figEsteUser);

    // for ($i=0; $i <= count($figEsteUser); $i++) { 
    //     $fig1 = $figEsteUser[$i];
    //     $fig2 = $figOutroUser[$i];
    //     print_r($fig1);
    //     print_r($fig2);

    // }

?>