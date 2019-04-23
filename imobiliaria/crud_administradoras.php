<?php  
	
	include 'conexao.php';
	include_once 'menu.php';

if (isset($_GET['visualizar'])){


	$seleciona_administradora = "SELECT * FROM administradoras";
	$busca_administradora = mysqli_query($conexao,$seleciona_administradora) or die(mysqli_error);
	$verificar=mysqli_num_rows($busca_administradora);
	if($verificar > 0 ) {
		while($busca_administradoras_linhas = mysqli_fetch_array($busca_administradora)){

			$id=$busca_administradoras_linhas['idamin'];
			$cnpj=$busca_administradoras_linhas['CNPJ'];
			$endereco= $busca_administradoras_linhas['endereco'];
			$numero= $busca_administradoras_linhas['numero'];
			$complemento= $busca_administradoras_linhas['complemento'];
			$razaoSocial= $busca_administradoras_linhas['razaoSocial'];
			$bairro= $busca_administradoras_linhas['bairro'];
			?>
			<div class='form'> 
				<div class='fundo'>
				<h2>Administradora</h2>
					    <label> <br>CNPJ: </label><?php echo $cnpj; ?>
					<br><label> Endereço: </label><?php echo $endereco; ?>
					<br><label> Numero: </label><?php echo $numero; ?>
					<br><label> Complemento: </label><?php echo $complemento; ?>
					<br><label> Razão Social: </label><?php echo $razaoSocial; ?>
					<br><label> Bairro: </label><?php echo $bairro; ?>
				</div>
				<div class='surgir surgir1'> <button class='text' onclick="location.href = 'editar_administradoras.php?editar&id=<?php echo $id ?> '">Editar</button></div>					
				<div class='surgir surgir2'><button class='text' onclick="location.href = 'crud_administradoras.php?excluir&id=<?php echo $id ?> '">Excluir</button></div>
				</div>
			
		<?php	
		}
	}else{echo "<br>Não há registros<br>";}
				 
}
	
if (isset($_POST['cadastrar'])){

	$chars = array(".","/","-");
	$cnpj = str_replace($chars,"",$_POST['cnpj']);
	$endereco= $_POST['endereco'];
	$numero= $_POST['numero'];
	$complemento= $_POST['complemento'];
	$razao_social= $_POST['razao_social'];
	$bairro= $_POST['bairro'];
	
	mysqli_query($conexao,"INSERT INTO administradoras (CNPJ, endereco, numero, complemento, razaoSocial, bairro) VALUES ($cnpj, '$endereco', '$numero', '$complemento', '$razao_social', '$bairro')") or die(mysqli_error($conexao));

			echo "<script> setTimeout(function(){location.href='crud_administradoras.php?visualizar'} , 1000); </script>";
	echo " Cadastrado com sucesso";

}

if (isset ($_GET['editar'])) {
	$id = $_GET['id'];

	$sql_update= mysqli_query($conexao, "SELECT * FROM administradoras WHERE idamin = '$id'");
	while ($linha = mysqli_fetch_assoc($sql_update)) {

	$cnpj = $linha['CNPJ'];
	$endereco= $linha['endereco'];
	$numero= $linha['numero'];
	$complemento= $linha['complemento'];
	$razao_social= $linha['razaoSocial'];
	$bairro= $linha['bairro'];

	}
}

if (isset ($_GET['atualizar'])) {
	$id = $_GET['id'];

	$chars = array(".","/","-");
	$cnpj = str_replace($chars,"",$_POST['cnpj']);
	$endereco= $_POST['endereco'];
	$numero= $_POST['numero'];
	$complemento= $_POST['complemento'];
	$razaoSocial= $_POST['razao_social'];
	$bairro= $_POST['bairro'];

	mysqli_query($conexao, "UPDATE administradoras SET CNPJ='$cnpj', endereco='$endereco', numero='$numero', complemento='$complemento', razaoSocial='$razaoSocial', bairro='$bairro' WHERE idamin = $id");

	echo "<script> setTimeout(function(){location.href='crud_administradoras.php?visualizar'} , 2000); </script>";
	echo "Registro alterado com sucesso";
}


if (isset ($_GET['excluir'])) {
	$id = $_GET['id'];

	$sql_delete= mysqli_query($conexao, "DELETE FROM administradoras WHERE idamin = '$id'") or die( "<br>ERRO: Não pode excluir esse registro pois a outros dados em que ele é referenciado!<br>");
	echo "Registro excluido com sucesso";

	
	echo "<script> setTimeout(function(){location.href='crud_administradoras.php?visualizar'} , 2000); </script>";
}
?>
 <!-- <input type="button" name="voltar" value="voltar" onclick="location.href = 'index.php'"> -->