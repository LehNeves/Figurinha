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

        <?php
            $select = "SELECT figurinhas.* 
            FROM figurinhas, usuariosfigurinhas, usuarios 
            WHERE usuarios.id = $idUser 
            AND usuarios.id = usuariosfigurinhas.usuarios_id 
            AND usuariosfigurinhas.figurinha_id = figurinhas.id";
            $vetor = buscarFigurinhas($select, $idUser, $conexao);
            if($vetor != -1){
                foreach ($vetor as $key => $valor) {
                    echo "<img src='img/$valor[caminho]' alt=''>";
                }
            }else{
                echo "<p>Voce não possui nenhuma figurinha</p>";
            }
        ?>
    </body>
</html>