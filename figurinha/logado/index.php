<?php
    //Chamar o arquivo verificar para poder saber se realmente está logado 
    include 'verificar.php';
    if(!gerarUltimoAcesso($conexao)){
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
        <a href="ganhar.php"><button name='ganhar'>Ganhar Figurinhas</button></a>
        <a href="deslogar.php"><button name='deslogar'>Sair</button></a>
    </body>
</html>