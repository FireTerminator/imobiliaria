<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<?php include_once "menu.php"; ?>
	<title>Cadastro de Propriedade</title>
</head>
<body>
<form name="form" method="POST" action="crud_propriedade.php">
	<div class="form">
		<h2>Cadastro de Propriedade</h2>
		<div>
			<label>Pessoa:</label>
			<select name="select_pessoa" required>
				<option value="">Selecione</option>
				<?php

					$seleciona_pessoa = "SELECT * FROM pessoas";
					$busca_pessoa = mysqli_query($conexao,$seleciona_pessoa) or die(mysqli_error);
					
					while($busca_pessoa_linhas = mysqli_fetch_array($busca_pessoa)){
						
						$id_pessoa= $busca_pessoa_linhas['idPessoa'];
						$nome_pessoa= $busca_pessoa_linhas['nome'];
						
						echo "<option value='$id_pessoa'>$nome_pessoa</option>";
					}
				
				?>
			</select>
			
			<label>lote:</label>
			<select name="select_lote" required>
				<option value="">Selecione</option>
				<?php

					$seleciona_lote = "SELECT * FROM lotes";
					$busca_lote = mysqli_query($conexao,$seleciona_lote) or die(mysqli_error);
					
					while($busca_lote_linhas = mysqli_fetch_array($busca_lote)){
					
						$id_lote= $busca_lote_linhas['idlote'];
						$nome_lote= $busca_lote_linhas['nome'];
						
						echo "<option value='$id_lote'>$nome_lote</option>";

					}
				
				?>
			</select>
			</div>
		<div>
			<label>Data de Aquisição:</label>
			<input type="date" name="data_aquisicao" required>
		</div>
		<div>
			<label>percentual:</label>
			<input type="number" step=0.01 min="0" name="percentual" required>
		</div>
	
		<button class="button" name="cadastrar" style="vertical-align:middle"><span>Cadastrar </span></button>
	</div>
</form>
</body>
</html>