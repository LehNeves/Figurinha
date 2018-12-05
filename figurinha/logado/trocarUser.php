<?php
    //Chamar o arquivo verificar para poder saber se realmente está logado 
    include 'verificar.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Selecionar Figurinhas para Troca</title>
    </head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }   
    </style>
    <body>
        <h1>Selecionar Suas Figurinhas para Troca</h1>
        <p>
            <form action="trocarBd.php" method="post">
                <table>
                    <tr>
                        <th>#</th>
                        <th>Nome da Figurinha</th>
                    </tr>
                    <?php
                        if(empty($_POST['figOutroUser'])){
                            echo "<script>alert('Erro ao receber Figurinhas do Checkbox');window.location.href='index.php';</script>";
                            die();
                        }
                        $_SESSION['figOutroUser'] = $_POST['figOutroUser'];
                        $select = "SELECT figurinhas.nome, usuariosfigurinhas.id as ufid
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
                                echo "<input type='checkbox' name='figEsteUser[]' value='".$value['ufid']."'>";
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
                <button type="submit" name="trocar">Trocar</button>
            </form>
        </p>
    </body>
</html>