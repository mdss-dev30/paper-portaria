<?php
	// Conexão com banco de dados
	$link = mysqli_connect("localhost", "root", "root", "portaria");
	// Verifica se conectou com o banco de dados
		if($link === false){
			die("ERRO: Não foi possível conectar ao Banco de Dados. " . mysqli_connect_error());
		}
?>