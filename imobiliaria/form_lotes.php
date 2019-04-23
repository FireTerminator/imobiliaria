<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include "menu.php"; 
	include "crud_lotes.php" ?>
	<title>Cadastro de Lotes</title>
</head>
<body>
	<form method="POST" action="crud_lotes.php">
	<div class="form">
		<h2>Cadastro de Lotes</h2>
		<div>

			<label>Condominio:</label>
			<select name="select_condominio" required>
				<option value="">Selecione</option>
				<?php

				$seleciona_condominio = "SELECT * FROM condominios";
				$busca_condominio = mysqli_query($conexao,$seleciona_condominio) or die(mysqli_error);
				
				while($busca_condominio_linhas = mysqli_fetch_array($busca_condominio)){
				
					$id_condominio= $busca_condominio_linhas['idcondominio'];
					$nome_condominio= $busca_condominio_linhas['nome'];
					
					echo "<option value='$id_condominio'>$nome_condominio</option>";
				}
				
			?>

			</select>
		</div>
		<div>
			<label>Nome:</label>
			<input type="text" name="nome" required>
		</div>

		<div>
			<label>Descrição:</label>
			<textarea name="descricao" placeholder="Descreva seu lote..." required></textarea>
		</div>
		<div>
			<label>Tamanho:</label>
			<input type="number" step="0.01" name="tamanho" required>
		</div>
	
		<button class="button" name="cadastrar" style="vertical-align:middle"><span>Cadastrar </span></button>
		</div>
	</form>
</body>
</html>