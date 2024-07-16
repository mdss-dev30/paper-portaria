<?php
	//chama o arquivo de conexão com o BD
	require_once "conexao.php";
	
	// Atualiza a data de saída do visitante
	$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
	
	$sql = "UPDATE visita SET datasaida=now() WHERE codigo='$codigo'";
	
	if(mysqli_query($link, $sql)){	
		mysqli_close($link);
		echo "<script>alert('Gravação efetuada com sucesso!'); window.location='index2.php?p=cadastrosaida'</script>";
		
			} else{
			mysqli_close($link);
			echo "<script>alert('Não foi possivel realizar a gravação!'); window.location='index2.php?p=cadastrosaida'</script>";
			}
?>