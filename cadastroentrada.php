<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro de Entrada</title>
		<link rel="shortcut icon"  href="img/icone.png">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<script type="text/javascript" src="js/jquery.mask.min.js"></script>		
	</head>
	<body class="img">		
		<hr>
			<!--Cria formulário para cadastro de entrada-->
			<form action="insert.php" method="post">
				<table>
					<tr><td colspan="2"><strong><p>Cadastro de Entrada</p></strong></td>
					</tr>
					<tr>
					<td><p><strong>Nome*:</strong><p></td>
						<td><p><input type="text" class="form-control" name="nome" required size = 50 maxlength=45></p></td>
					</tr>
					<tr>
						<td><p><strong>CPF*:</strong></p></td>
						<td><p><input type="text" class="form-control" name="cpf" id="cpf" required size = 50 maxlength=11 placeholder="Apenas números"></p></td>
					</tr>
					<tr>
						<td><p><strong>Identidade:</strong></p></td>
						<td><p><input type="text" class="form-control" name="rg" size = 50 maxlength=15></p></td>
					</tr>
					<tr>
						<td><p><strong>Destino*:</strong></p></td>
						<td><p><input type="text" class="form-control" name="destino" required size = 50 maxlength="5" placeholder="Digite o número do apto."></p></td>
					</tr>
					<tr>
						<td><p><strong>Veículo:</strong></p></td>
						<td><p><input type="text" class="form-control" name="veiculo" size = 50 placeholder="Informe o modelo do veiculo"></p></td>
					</tr>
					<tr>
						<td><p><strong>Placa:</strong></p></td>
						<td><p><input type="text" class="form-control" name="placa" id="placa"size = 50 maxlength="8"></p></td>
					</tr>
					<tr>
						<td><p><strong>Empresa:</strong></p></td>
						<td><p><input type="text" class="form-control" name="empresa" size = 50 ></p></td>
					</tr>
					<tr>
						<td><p><strong>Tipo*:</strong></p></td>
						<td>
							<p>
								<select class="form-control" name="tipo" id="tipo" required> 
									<option value="" selected></option>   
									<option value="Prestador de Servico">Prestador de Serviço</option>
									<option value="Visitante">Visitante</option>
								</select>
							</p>
						</td>
					</tr>
					<tr>
						<td><strong>Observação:</strong></td>
						<td><textarea name="observacao" class="form-control" cols="52" rows="3" placeholder="Limite de 100 caracteres" maxlength="100"></textarea></td>
					</tr>
				</table>
				<hr>
				<strong><p><h6>   * - Campos obrigatórios</h6></p></strong>
				<button type="submit" class = "btn btn-success" name="Enviar">Enviar</button>
				<button type="button" class = "btn btn-success" onClick="history.go(-0)">Limpar</button>
			</form>	
			<!--script que cria as mascaras para os campos-->
			<script type="text/javascript">			
				$("#cpf").mask("000.000.000-00")
		</script>	
	</body>
</html>