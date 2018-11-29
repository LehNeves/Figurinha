<?php
    include 'verificar.php';
    //for($i = 0; $i <= 4; $i++){
        $aleatorio = rand(0, 10);
        ganharFigurinhas($conexao, $idUser, $aleatorio);
    //}
    $select = "SELECT figurinhas.* 
    FROM figurinhas, usuariosfigurinhas, usuarios 
    WHERE usuarios.id = $idUser 
    AND usuarios.id = usuariosfigurinhas.usuarios_id 
    AND usuariosfigurinhas.figurinha_id = figurinhas.id
    ORDER BY usuariosfigurinhas.id DESC";

    $vetor = buscarFigurinhas($select, $idUser, $conexao);

    if($vetor != -1){
        foreach ($vetor as $key => $valor) {
            echo "<img src='img/$valor[caminho]' alt=''>";
        }
    }else{
        echo "<p>Voce não possui nenhuma figurinha</p>";
    }
    
        
?>