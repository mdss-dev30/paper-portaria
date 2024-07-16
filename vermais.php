<?php
	//chama o arquivo de conexão com o BD
	require_once "conexao.php";
	
	// recebe dados do filtro
	$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';
	
	//Consulta no banco de dados o registro selecionado pelo usuário
	$query="select * from visita WHERE codigo = $codigo;";
	$dados = mysqli_query($link, $query);
	
	// transforma os dados em um array
	$linha = $dados -> fetch_assoc();
	
	//formata a data de entrada recuperada do banco de dados
	$dataent = new DateTime($linha['dataentrada']);
	$dataent = $dataent->format('d/m/Y H:i:s');
	
	//formata a data de saida recuperada do banco de dados. Se não estiver preenchida exibe valor em branco.
	$datasai = $linha['datasaida'];
	if ($datasai != "") {
		$datasai = new DateTime($linha['datasaida']);
		$datasai = $datasai->format('d/m/Y H:i:s');
	}
	// Fecha conexão com o banco de dados
	mysqli_close($link);
?>
<!--Início da exibição do resultado -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon"  href="img/icone.png">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>
	<body class="img">
		<div class="container">			
			<div class="contant">
					<header>
							<p align="center"><strong>Consulta Detalhes da Visita</strong></p>
					</header>
				
				<br><br><br><br>
				<div>
					<table>
						<tr>
							<td><p><strong>Nome:</strong></p></td>
							<td><p><?=$linha['nome']?></p><td>
						</tr>
						<tr>
							<td><p><strong>CPF:</strong></p></td>
							<td><p><?=$linha['cpf']?></p></td>
							<td><p><strong>Identidade:</strong></p></td>
							<td><p><?=$linha['rg']?></p></td>
						</tr>
						<tr>
							<td><p><strong>Veículo:</strong></p></td>
							<td><p><?=$linha['veiculo']?></p></td>
							<td><p><strong>Placa:</strong></p></td>
							<td><p><?=$linha['placa']?></p></td>
						</tr>
					</table>
				</div>
				<hr>
				<div>
					<table>
						<tr>
							<td><strong>Visita ao apartamento/sala:</strong></td>
							<td><?=$linha['destino']?></td>
						</tr>
					</table>	
				</div>
				<hr>
				<div>
					<table>
						<tr>
							<td><p><strong>Tipo:</strong></p></td>
							<td><p><?=$linha['tipo']?></p></td>
						</tr>
						<tr>
							<td><p><strong>Empresa:</strong></p></td>
							<td><p><?=$linha['empresa']?></p></td>
						</tr>
					</table>
				</div>
				<hr>
				<div>
					<table>
						<tr>
							<td><p><strong>Entrada:</strong></p></td>
							<td><p><?=$dataent?></p></td>
						</tr>
						<tr>
							<td><p><strong>Saída:</strong></p></td>
							<td><p><?=$datasai?></p></td>
						</tr>
					</table>
				<hr>
				<div>
					<table>
						<tr>
							<td><p><strong>Observação:</strong></p></td>
							<td><p><?=$linha['observacao']?></p></td>
						</tr>
					</table>
				</div>
				<hr>
				<button type="button" class = "btn btn-success" value="Voltar" onClick="history.go(-1)">Voltar</button>
				<a href="index2.php?p=consulta"><button type="button" class = "btn btn-success" value="Novo" >Nova Consulta</button></a>			
			</div>
		</div>
	</body>
</html>
