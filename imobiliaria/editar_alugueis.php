<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<?php 
	include_once "menu.php";
	include_once "crud_alugueis.php";
?>
	<title>Editar Aluguel</title>
</head>
<body>
<form name="form" method="POST" action="crud_alugueis.php?atualizar&id=<?php echo $id ?>">
	<div class="form"> 
		<h2>Editar Aluguel</h2>
		<div>
			<label>Pessoa:</label>
			<select name="select_pessoa" required>
				<?php

					$seleciona_pessoa = "SELECT * FROM pessoas";
					$busca_pessoa = mysqli_query($conexao,$seleciona_pessoa) or die(mysqli_error);
					
					while($busca_pessoa_linhas = mysqli_fetch_array($busca_pessoa)){
						
						$id_pessoa= $busca_pessoa_linhas['idPessoa'];
						$nome_pessoa= $busca_pessoa_linhas['nome'];
						
						echo "<option value='$id_pessoa'>$nome_pessoa</option>";

						?>
						<option value=" <?php echo $id_pessoa;?>"<?php if ($select_pessoa_id ==$id_pessoa) {
							echo"selected='selected'";
						}?>> <?php echo $nome_pessoa ?> </option>";
						<?php
					}
				
				?>
			</select>
			 
			<label>Lotes:</label>
			<select name="select_lote" required>
				<?php
					$seleciona_lote = "SELECT l.nome nomel , l.idlote, c.nome nomec FROM lotes l
					INNER JOIN condominios c ON l.condominios_idcondominio = c.idcondominio
					WHERE NOT EXISTS (SELECT lotes_idlote FROM alugueis a WHERE l.idlote = a.lotes_idlote) ";

					$busca_lote = mysqli_query($conexao,$seleciona_lote) or die(mysqli_error);
					
					while($busca_lote_linhas = mysqli_fetch_array($busca_lote)){
					
						$id_lote= $busca_lote_linhas['idlote'];
						$nome_lote= $busca_lote_linhas['nomel'];
						$nome_condominio= $busca_lote_linhas['nomec'];

						?>
						<option value=" <?php echo $id_lote;?>"<?php if ($select_lote_id ==$id_lote) {
							echo"selected='selected'";
						}?>> <?php echo $nome_lote.' '.$nome_condominio?> </option>";
						<?php
					}
				
				?>
			</select>
			</div>
		<div>
			<label>Valor(Mensal):</label>
			<input type="number" name="valor" min="1" max="2147483647" value="<?php echo $valor; ?>" required>
		</div>

			<button class="button" name="gravar" style="vertical-align:middle"><span>Editar </span></button>		
	</div>
</form>
</body>
</html>