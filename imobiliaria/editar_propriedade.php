<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include_once "menu.php";
	include_once "crud_propriedade.php"; 
	?>
	<title>Editar Propriedade</title>
</head>
<body>
<form name="form" method="POST" action="crud_propriedade.php?atualizar&id=<?php echo $id ?>">
	<div class="form">
		<h2>Editar Propriedade</h2>
		<div>
			<label>Pessoa:</label>
			<select name="select_pessoa" required>
				
				<?php

					$seleciona_pessoa = "SELECT * FROM pessoas";
					$busca_pessoa = mysqli_query($conexao,$seleciona_pessoa) or die(mysqli_error);
					
					while($busca_pessoa_linhas = mysqli_fetch_array($busca_pessoa)){
						
						$id_pessoa= $busca_pessoa_linhas['idPessoa'];
						$nome_pessoa= $busca_pessoa_linhas['nome'];
						?>
						<option value=" <?php echo $id_pessoa;?>"<?php if ($select_pessoa_id ==$id_pessoa) {
							echo"selected='selected'";
						}?>> <?php echo $nome_pessoa ?> </option>";
						<?php
					}
				
				?>
			</select>
			
			<label>lote:</label>
			<select name="select_lote" required>
				<?php

					$seleciona_lote = "SELECT * FROM lotes";
					$busca_lote = mysqli_query($conexao,$seleciona_lote) or die(mysqli_error);
					
					while($busca_lote_linhas = mysqli_fetch_array($busca_lote)){
					
						$id_lote= $busca_lote_linhas['idlote'];
						$nome_lote= $busca_lote_linhas['nome'];
						
						
						?>
						<option value=" <?php echo $id_lote;?>"<?php if ($select_lote_id ==$id_lote) {
							echo"selected='selected'";
						}?>> <?php echo $nome_lote ?> </option>";
						<?php
					}
				
				?>
			</select>
			</div>
		<div>
			<label>Data de Aquisição:</label>
			<input type="date" name="data_aquisicao" value="<?php echo $dataAquisicao ?>" required>
		</div>
		<div>
			<label>percentual:</label>
			<input type="number" step=0.01 min="0" name="percentual" value="<?php echo $percentual ?>" required>
		</div>
	
		<button class="button" name="gravar" style="vertical-align:middle"><span>Editar </span></button>
	</div>
</form>
</body>
</html>