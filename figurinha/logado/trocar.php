<?php
    //Chamar o arquivo verificar para poder saber se realmente está logado 
    include 'verificar.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Trocar</title>
    </head>
    <body>
        <p>
            <form action="trocarBd.php" method="post">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Id Usuario</th>
                        <th>Nome da Figurinha</th>
                    </tr>
                    <?php
                        $select = "SELECT figurinhas.nome, usuarios.id, usuariosfigurinhas.id as ufid
                        FROM figurinhas, usuariosfigurinhas, usuarios 
                        WHERE usuarios.id <> '$idUser'
                        AND usuarios.id = usuariosfigurinhas.usuarios_id 
                        AND usuariosfigurinhas.figurinha_id = figurinhas.id
                        AND usuariosfigurinhas.disponivel = 0";
                        $vetor = buscarFigurinhas($select, $idUser, $conexao);
                        if($vetor != -1){
                            foreach ($vetor as $key => $value) {
                                echo '<tr>';
                                echo '<td>';
                                echo "<input type='checkbox' name='array[]' value='".$value['ufid']."'>";
                                echo '</td>';
                                echo '<td>';
                                echo $value['id'];
                                echo '</td>';
                                echo '<td>';
                                echo $value['nome'];
                                echo '</td>';
                                echo '</tr>';
                            }
                        }else{
                            echo "<p>Não há figurinhas disponiveis para troca!</p>";
                        }
                        echo '</tr>';
                    ?>
                <button type="submit">Trocar</button>
                </table>
            </form>
        </p>
    </body>
</html>