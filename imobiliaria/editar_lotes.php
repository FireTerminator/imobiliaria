<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<?php include_once "menu.php"; 
	include_once "crud_lotes.php" ?>
	<title>Editar Lote</title>
</head>
<body>
	<form method="POST" action="crud_lotes.php?atualizar&id=<?php echo $id; ?>">
	<div class="form">
		<h2>Editar Lote</h2>
		<div>
			<label>Condominio:</label>
			<select name="select_condominio" required>
				<?php

				$seleciona_condominio = "SELECT * FROM condominios";
				$busca_condominio = mysqli_query($conexao,$seleciona_condominio) or die(mysqli_error);
				
				while($busca_condominio_linhas = mysqli_fetch_array($busca_condominio)){
				
					$id_condominio= $busca_condominio_linhas['idcondominio'];
					$nome_condominio= $busca_condominio_linhas['nome'];
					
					?>
					<option value=" <?php echo $id_condominio;?>"<?php if ($select_condominio_id ==$id_condominio) {
						echo"selected='selected'";
					}?>> <?php echo $nome_condominio ?> </option>";
					<?php
				}
				
			?>

			</select>
		</div>
		<div>
			<label>Nome:</label>
			<input type="text" name="nome" required value="<?php echo $nome; ?>">
		</div>
		<div>
			<label>Descrição:</label>
			<textarea name="descricao" placeholder="Descreva seu lote..." required><?php echo $descricao; ?></textarea>
		</div>
		<div>
			<label>Tamanho:</label>
			<input type="number" step="0.01" name="tamanho" required value=<?php echo $tamanho; ?> >
		</div>
	
		<button class="button" name="gravar" style="vertical-align:middle"><span>Editar </span></button>
		</div>
	</form>
</body>
</html>