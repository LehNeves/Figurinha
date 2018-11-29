<?php
    include 'verificar.php';

    $dateTime = date('Y/m/d', time());

    for($i = 0; $i <= 4; $i++){
        $aleatorio = rand(1, 10);
        ganharFigurinhas($conexao, $idUser, $aleatorio);
    }

    echo "<script>alert('Parabéns! Voce Ganhou as figurinhas do dia, volte amanhã.');</script>";

    $select = "SELECT figurinhas.* 
    FROM figurinhas, usuariosfigurinhas, usuarios 
    WHERE usuarios.id = $idUser 
    AND usuarios.id = usuariosfigurinhas.usuarios_id 
    AND usuariosfigurinhas.figurinha_id = figurinhas.id
    ORDER BY usuariosfigurinhas.id DESC LIMIT 5";

    $vetor = buscarFigurinhas($select, $idUser, $conexao);

    if($vetor != -1){
        foreach ($vetor as $key => $valor) {
            echo "<img src='img/$valor[caminho]' alt=''>";
        }
    }else{
        echo "<p>Voce não possui nenhuma figurinha</p>";
    }
    
        
?>