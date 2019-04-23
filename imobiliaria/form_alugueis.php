<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<?php 
	include_once "menu.php";
	include_once "crud_alugueis.php";
?>
	<title>Cadastro de Alugueis</title>
</head>
<body>
<form name="form" method="POST" action="crud_alugueis.php">
	<div class="form"> 
		<h2>Cadastro de Alugueis</h2>
		<div>
			<label>Alugar para:</label>
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
			 
			<label>Lotes:</label>
			<select name="select_lote" required>
				<option value="">Selecione</option>

				<?php
					$seleciona_lote = "SELECT l.nome nomel , l.idlote, c.nome nomec FROM lotes l
					INNER JOIN condominios c ON l.condominios_idcondominio = c.idcondominio
					WHERE NOT EXISTS (SELECT lotes_idlote FROM alugueis a WHERE l.idlote = a.lotes_idlote)";

					$busca_lote = mysqli_query($conexao,$seleciona_lote) or die(mysqli_error);
					
					while($busca_lote_linhas = mysqli_fetch_array($busca_lote)){
					
						$id_lote= $busca_lote_linhas['idlote'];
						$nome_lote= $busca_lote_linhas['nomel'];
						$nome_condominio= $busca_lote_linhas['nomec'];
						
						echo "<option value='$id_lote'>$nome_lote $nome_condominio</option>";
					}
				?>

			</select>
			
			</div>
		<div>
			<label>Valor(Mensal):</label>
			<input type="number" name="valor" min="1" max="2147483647" required>
		</div>

			<button class="button" name="cadastrar" style="vertical-align:middle"><span>Cadastrar </span></button>		
	</div>
</form>
</body>
</html>