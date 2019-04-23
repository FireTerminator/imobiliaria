<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include_once "menu.php";
	include_once "crud_pessoas.php"; ?>
	<title>Editar Pessoa</title>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#cpf").mask("999.999.999-99");
			$("#telefone").mask("(99)999999999");

		});
	</script>
</head>
<body>
<form name="form" method="POST" action="crud_pessoas.php?atualizar&id=<?php echo $id ?>">
	<div class="form">
		<h2>Editar Pessoa</h2>
		<div>
			<label>Nome:</label>
			<input type="text" name="nome" maxlength="100" value="<?php echo $nome;?>" required>
		</div>
		<div>
			<label>CPF:</label>
			<input type="text" name="cpf" id="cpf"  value="<?php echo $cpf;?>" required>
		</div>
		<div>
			<label>Data de nascimento:</label>
			<input type="date" name="dataNasc"  value="<?php echo $dataNasc;?>" required>
		</div>
		<div>
			<label>Av./Rua:</label>
			<input type="text" name="AvRua" maxlength="100"  value="<?php echo $AvRua;?>" required >
		</div>
		<div>
			<label>Nº:</label>
			<input type="number" name="num" min="1" max="999999999999999"  value="<?php echo $num;?>" required>
		</div>
		<div>
			<label>Complemento:</label>
			<input type="text" name="complemento" maxlength="15"  value="<?php echo $complemento;?>" required>
		</div>
		<div>
			<label>Telefone:</label>
			<input type="text" name="telefone" id="telefone"  value="<?php echo $telefone;?>" required>
		</div>
	
		<button class="button" name="gravar" style="vertical-align:middle"><span>Editar </span></button>
	</div>
</form>
</body>
</html>