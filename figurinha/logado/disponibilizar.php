<?php
    //Chamar o arquivo verificar para poder saber se realmente está logado 
    include 'verificar.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Disponibilizar para Troca</title>
    </head>
    <body>
        <p>
            <form action="disponibilizarBd.php" method="post">
                <?php
                    $select = "SELECT figurinhas.*
                    FROM figurinhas, usuariosfigurinhas, usuarios 
                    WHERE usuarios.id = '$idUser' 
                    AND usuarios.id = usuariosfigurinhas.usuarios_id 
                    AND usuariosfigurinhas.figurinha_id = figurinhas.id
                    AND usuariosfigurinhas.disponivel = 1";
                    $vetor = buscarFigurinhas($select, $idUser, $conexao);
                    if($vetor != -1){
                        foreach ($vetor as $key => $value) {
                            echo "<input type='checkbox' name='array[]' value='".$value['id']."'>".$value['nome']."</br>";
                        }
                    }else{
                        echo "<p>Voce não possui nenhuma figurinha disponivel para troca!</p>";
                    }
                ?>
                <button type="submit" name="trocar">Trocar</button>
            </form>
        </p>
    </body>
</html>