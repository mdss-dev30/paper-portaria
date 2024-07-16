<?php
	// chamar o arquivo de conexão com o BD
	require_once "conexao.php";

		// variáveis criadas para obter valores dos parâmetros do formulário
		$nome = mysqli_real_escape_string($link, $_REQUEST['nome']);
		$cpf = mysqli_real_escape_string($link, $_REQUEST['cpf']);
		$rg = mysqli_real_escape_string($link, $_REQUEST['rg']);
		$destino = mysqli_real_escape_string($link, $_REQUEST['destino']);
		$veiculo = mysqli_real_escape_string($link, $_REQUEST['veiculo']);
		$placa = mysqli_real_escape_string($link, $_REQUEST['placa']);
		$empresa = mysqli_real_escape_string($link, $_REQUEST['empresa']);
		$tipo = mysqli_real_escape_string($link, $_REQUEST['tipo']);
		$observacao = mysqli_real_escape_string($link, $_REQUEST['observacao']);

		// Realiza inserção do novo registro na tabela do banco de dados
		$sql = "INSERT INTO visita (nome, cpf, rg, destino, veiculo, placa, empresa, tipo, observacao) 
		VALUES ('$nome', '$cpf', '$rg', '$destino', '$veiculo', '$placa', '$empresa', '$tipo', '$observacao')";
		if(mysqli_query($link, $sql)){	
		mysqli_close($link);
		echo "<script>alert('Gravação efetuada com sucesso!'); window.location='index2.php?p=cadastroentrada'</script>";

			} else{
			mysqli_close($link);
			echo "<script>alert('Não foi possivel realizar a gravação'); window.location='index2.php?p=cadastroentrada'</script>";
			}
?>