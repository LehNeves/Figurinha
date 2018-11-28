<?php
    include 'verificar.php';

    if(!gerarUltimoAcesso($dateTime, $conexao)){
        echo "<script>alert('Erro ao passar Ultimo Acesso');</script>";
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Inicial</title>
    </head>
    <body>
        
        <a href=""><button>Ganhar Figurinhas</button></a>

    </body>
</html>