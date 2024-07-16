<?php
	// chamar o arquivo de conexão com o BD
	require_once "conexao.php";
	$query = "select codigo,nome,dataentrada,datasaida FROM visita where datasaida is null;";
	
	// executa a query
	$dados = mysqli_query($link, $query) or die(mysql_error());
	
	// transforma os dados em um array
	$linha = $dados -> fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon"  href="img/icone.png">
		<title>Registrar Saida</title>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body>
		<hr>
		<p><strong>Registrar saídas</strong></p>
			<?php
				// se houver alguma linha no resultado da consulta, monta a tabela que irá exibir os dados
				if($dados -> num_rows > 0) {
			?>	
			<!--Cria tabela para exibir os resultados-->
			<table class="table tables-sm table-responsive table-hover">
				<thead>
					<tr>
						<th scope="col">Nome</th>
						<th scope="col">Data da Entrada</th>
						<th scope="col">Registrar Saida</th>
					</tr>
				</thead>
				<tbody>
			<?php	
					//inicio do loop que irá exibir as linhas da tabela com os resultados
					do {
						?>
							<tr>
								<td><?=$linha['nome']?></td>
								<?php 
									$data = new DateTime($linha['dataentrada']);
									$data = $data->format('d/m/Y H:i:s');
								?>
								<td><?=$data?></td>
								<td>
									<div class="gravarsaida">
										<form action="saida.php" method="post">
											<input type="hidden" name="codigo" value=<?php echo $linha['codigo']?>>
											<button type="submit" class = "btn btn-success">Gravar Saída</button>
										</form>
									</div>
								</td>
							</tr>	
						<?php
						// loop que irá exibir todas as linhas do vetor com o resultado da consulta no banco de dados.
						}while($linha = $dados -> fetch_assoc());
				}
				// se não houver linha no resultado da consulta, exibe mensagem
				else {
					echo "<strong>Não há registro com saída pendente</strong><br><br>";
				}
			?>
				</tbody>
			</table><br>
				<hr>
		<?php

// Fecha conexão com o banco de dados
		mysqli_close($link);
		?>
		<button type="button" class = "btn btn-success" value="Atualizar" onClick="history.go(-0)">Atualizar</button>
	</body>
</html>
