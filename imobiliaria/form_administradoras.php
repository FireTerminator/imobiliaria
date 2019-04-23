<!DOCTYPE html>
<html>
<head>
	<?php include "menu.php";
	include "crud_administradoras.php";
	?>
	<meta charset="utf-8">
 
	<title>Cadastro de Administradoras</title>
	<script type="text/javascript"> 

		$(document).ready(function() {    
        $("#cnpj").mask("99.999.999/9999-99");
 		});
 	</script>	

</head>
<body>

<form name=form1 method="POST" action="crud_administradoras.php">
	<div class="form">
		<h2>Cadastro de Administradoras</h2>
		<div>
			<label>CNPJ:</label>
			<input class="campo" type="text" name="cnpj"  id="cnpj"  required>
		</div>
		<div>
		<label>Endereço:</label>
		<input class="campo" type="text" name="endereco"  maxlength="50" required>
		</div>
		<div>
		<label>Numero:</label>
		<input class="campo" type="number" name="numero" maxlength="15" required>
		</div>
		<div>
		<label>Complemento:</label>
		<input class="campo" type="text" name="complemento" maxlength="15" required>
		</div>
		<div>
		<label>Razão social:</label>
		<input placeholder="nome comercial da empresa" maxlength="100" class="campo" type="text" name="razao_social" required>
		</div>
		<div>
		<label>Bairro:</label>
		<input class="campo" type="text" name="bairro"  maxlength="50" required>
		</div>
				<button class="button" name="cadastrar" style="vertical-align:middle"><span>Cadastrar </span></button>

	</div>
 </form>
</body>
</html>