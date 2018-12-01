<?php
	$servidor = "localhost";
	$usuario = "root";
	$password = "";
	$bancodedados = "figurinha";
	//criar a conexão
	$conexao = mysqli_connect($servidor, $usuario, $password, $bancodedados);
	//testar a conexão
	if(!$conexao){
		die("Conexão falhou!".mysqli_connect_error());
	}
?>