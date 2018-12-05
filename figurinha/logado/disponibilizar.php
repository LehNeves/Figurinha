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
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }   
    </style>
    <body>
        <p>
            <form action="disponibilizarBd.php" method="post">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Nome da Figurinha</th>
                    </tr>
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
                                echo '<tr>';
                                echo '<td>';
                                echo "<input type='checkbox' name='array[]' value='".$value['id']."'>";
                                echo '</td>';
                                echo '<td>';
                                echo $value['nome'];
                                echo '</td>';
                                echo '</tr>';
                            }
                        }else{
                            echo "<p>Voce não possui nenhuma figurinha disponivel para troca!</p>";
                        }
                    ?>
                </table>
                <button type='submit'>Disponibilizar</button>
                <a href="index.php"><button type='button'>Voltar</button></a>
            </form>
            
        </p>
    </body>
</html>