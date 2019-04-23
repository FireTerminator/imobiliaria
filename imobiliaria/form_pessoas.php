<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include "menu.php"; ?>
	<title>Cadastro de Pessoas</title>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#cpf").mask("999.999.999-99");
			$("#telefone").mask("(99)999999999");

		});
	</script>
</head>
<body>
<form name="form" method="POST" action="crud_pessoas.php">
	<div class="form">
		<h2>Cadastro de Pessoas</h2>
		<div>
			<label>Nome:</label>
			<input type="text" name="nome" maxlength="100" required>
		</div>
		<div>
			<label>CPF:</label>
			<input type="text" name="cpf" id="cpf" required>
		</div>
		<div>
			<label>Data de nascimento:</label>
			<input type="date" name="dataNasc" required>
		</div>
		<div>
			<label>Av./Rua:</label>
			<input type="text" name="AvRua" maxlength="100" required >
		</div>
		<div>
			<label>Nº:</label>
			<input type="number" name="num" min="1" max="999999999999999" required>
		</div>
		<div>
			<label>Complemento:</label>
			<input type="text" name="complemento" maxlength="15" required>
		</div>
		<div>
			<label>Telefone:</label>
			<input type="text" name="telefone" id="telefone" required>
		</div>
	
		<button class="button" name="cadastrar" style="vertical-align:middle"><span>Cadastrar </span></button>
	</div>
</form>
</body>
</html>