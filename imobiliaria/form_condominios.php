<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<?php 
	include "menu.php";
	include "crud_condominios.php";
?>
	<title>Cadastro de Condominios</title>
</head>
<body>
<form name="form" method="POST" action="crud_condominios.php">
	<div class="form"> 
		<h2>Cadastro de Condominios</h2>
		<div>
			<label>Pessoa:</label>
			<select name="select_pesssoa" required>
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
			 
			<label>Administradora:</label>
			<select name="select_administradora" required>
				<option value="">Selecione</option>
				<?php
					$seleciona_administradora = "SELECT * FROM administradoras";
					$busca_administradora = mysqli_query($conexao,$seleciona_administradora) or die(mysqli_error);
					
					while($busca_administradora_linhas = mysqli_fetch_array($busca_administradora)){
					
						$id_administradora= $busca_administradora_linhas['idamin'];
						$nome_administradora= $busca_administradora_linhas['razaoSocial'];
						
						echo "<option value='$id_administradora'>$nome_administradora</option>";
					}
				
				?>
			</select>
			</div>
		<div>
			<label>Nome:</label>
			<input type="text" name="nome" maxlength="100" required>
		</div>
		<div>
			<label>Av./Rua:</label>
			<input type="text" name="AvRua" maxlength="100" required>
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
			<label>Bairro:</label>
			<input type="text" name="bairro"  maxlength="50" required>
		</div>
			<button class="button" name="cadastrar" style="vertical-align:middle"><span>Cadastrar </span></button>		
	</div>
</form>
</body>
</html>