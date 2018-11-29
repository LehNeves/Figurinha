<?php
    include 'verificar.php';
    $vetor = array();
    for($i = 0; $i <= 4; $i++){
        $aleatorio = rand(0, 10);
        array_push($vetor, $aleatorio);
        echo $vetor[$i].'</br>';
    }


    
        
?>