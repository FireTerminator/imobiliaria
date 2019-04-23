<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
<?php 
	include "menu.php";
	include "crud_condominios.php";
?>
	<title>Editar Condominio</title>
</head>
<body>
<form name="form" method="POST" action="crud_condominios.php?atualizar&id=<?php echo $id ?>">
	<div class="form"> 
		<h2>Editar Condominio</h2>
		<div>
			<label>Pessoa:</label>
			<select name="select_pesssoa" required>
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
			 
			<label>Administradora:</label>
			<select name="select_administradora" required>
				<?php
					$seleciona_administradora = "SELECT * FROM administradoras";
					$busca_administradora = mysqli_query($conexao,$seleciona_administradora) or die(mysqli_error);
					
					while($busca_administradora_linhas = mysqli_fetch_array($busca_administradora)){
					
						$id_administradora= $busca_administradora_linhas['idamin'];
						$nome_administradora= $busca_administradora_linhas['razaoSocial'];
						
						?>
						<option value=" <?php echo $id_administradora;?>"<?php if ($select_administradora_id == $id_administradora) {
							echo"selected='selected'";
						}?>> <?php echo $nome_administradora ?> </option>";
						<?php
					}
				
				?>
			</select>
			</div>
		<div>
			<label>Nome:</label>
			<input type="text" name="nome" maxlength="100" value="<?php echo $nome;?>" required>
		</div>
		<div>
			<label>Av./Rua:</label>
			<input type="text" name="AvRua" maxlength="100" value="<?php echo $AvRua;?>" required>
		</div>
		<div>
			<label>Nº:</label>
			<input type="number" name="num" min="1" max="999999999999999" value="<?php echo $num;?>" required>
		</div>
		<div>
			<label>Complemento:</label>
			<input type="text" name="complemento" maxlength="15" value="<?php echo $complemento;?>" required>
		</div>
		<div>
			<label>Bairro:</label>
			<input type="text" name="bairro" maxlength="50" value="<?php echo $bairro;?>" required>
		</div>
		<button class="button" name="cadastrar" style="vertical-align:middle"><span>Editar </span></button>

		
	</div>
</form>
</body>
</html>