<!DOCTYPE html>
<html>
<head>
	<?php include "menu.php";
	include "crud_administradoras.php";
	?>
	<meta charset="utf-8">
 
	<title>Editar Administradora</title>
	<script type="text/javascript"> 

		$(document).ready(function() {    
        $("#cnpj").mask("99.999.999/9999-99");
 		});
 	</script>	

</head>
<body>

<form name=form1 method="POST" action="crud_administradoras.php?atualizar&id=<?php echo $id ?>">
	<div class="form">
		<h2>Editar Administradora</h2>
		<div>
			<label>CNPJ:</label>
			<input class="campo" type="text" name="cnpj"  id="cnpj" value="<?php echo $cnpj;?>" required>
		</div>
		<div>
		<label>Endereço:</label>
		<input class="campo" type="text" name="endereco" maxlength="50" value="<?php echo $endereco;?>" required>
		</div>
		<div>
		<label>Numero:</label>
		<input class="campo" type="number" name="numero" maxlength="15" value="<?php echo $numero;?>" required>
		</div>
		<div>
		<label>Complemento:</label>
		<input class="campo" type="text" name="complemento" maxlength="15" value="<?php echo $complemento;?>" required>
		</div>
		<div>
		<label>Razão social:</label>
		<input placeholder="nome comercial da empresa" class="campo" type="text" name="razao_social" maxlength="100" value="<?php echo $razao_social;?>" required>
		</div>
		<div>
		<label>Bairro:</label>
		<input class="campo" type="text" name="bairro" maxlength="50" value="<?php echo $bairro;?>" required>
		</div>
		 <button type='text' class="button" name="editar" style="vertical-align:middle"><span>Editar </span></button>
			
	</div>
 </form>
</body>
</html>