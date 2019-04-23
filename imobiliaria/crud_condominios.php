<?php
	include_once 'menu.php';
	include 'conexao.php';


if (isset($_GET['visualizar'])){


	$seleciona_condominios = "SELECT  c.idcondominio, c.nome nomec, p.nome nomep,c.AvRua,c.num,c.complemento,c.bairro, a.razaoSocial FROM condominios c INNER JOIN pessoas p ON c.Pessoas_idPessoa = p.idPessoa
		JOIN administradoras a ON c.administradoras_idamin = a.idamin ";
	$busca_condominios = mysqli_query($conexao,$seleciona_condominios) or die(mysqli_error($conexao));
	$verificar=mysqli_num_rows($busca_condominios);
	if($verificar > 0 ) {
		while($busca_condominios_linhas = mysqli_fetch_assoc($busca_condominios)){
			$id=$busca_condominios_linhas['idcondominio'];
			$nome_condominio=$busca_condominios_linhas['nomec'];
			$nome_pessoa= $busca_condominios_linhas['nomep'];
			$razaoSocial= $busca_condominios_linhas['razaoSocial'];
			$avRua= $busca_condominios_linhas['AvRua'];
			$num= $busca_condominios_linhas['num'];
			$complemento= $busca_condominios_linhas['complemento'];
			$bairro= $busca_condominios_linhas['bairro'];

?>			<div class="form">
				<div class='fundo' >
					<h2>Condominio</h2> 
					<label><br> Nome: </label><?php echo $nome_condominio; ?>
					<br><label> Pessoa Responsavel: </label><?php echo $nome_pessoa; ?>
					<br><label> Numero: </label><?php echo $num; ?>
					<br><label> Av/Rua: </label><?php echo $avRua; ?>
					<br><label> Complemento: </label><?php echo $complemento; ?>
					<br><label> Adminstradora: </label><?php echo $razaoSocial; ?>
					<br><label> Bairro: </label><?php echo $bairro; ?>
				</div>
					<div class='surgir surgir1'> <button class='text' onclick="location.href = 'editar_condominios.php?editar&id=<?php echo $id ?> '">Editar</button>
					</div>
					<div class='surgir surgir2'><button class='text' onclick="location.href = 'form_condominios.php?excluir&id=<?php echo $id ?> '">Excluir</button>
					</div>
			</div>	
<?php
		}
	}else{echo "<br>Não há registros<br>";}
				 
}

if(isset($_POST['cadastrar'])){

	$nome=$_POST['nome'];
	$select_pessoa=$_POST['select_pesssoa'];
	$select_administradora=$_POST['select_administradora'];
	$AvRua=$_POST['AvRua'];
	$num=$_POST['num'];
	$complemento=$_POST['complemento'];
	$bairro=$_POST['bairro'];

	mysqli_query($conexao,"INSERT INTO condominios(nome, Pessoas_idPessoa, administradoras_idamin, AvRua, num, complemento, bairro) Values('$nome','$select_pessoa', '$select_administradora', '$AvRua', '$num', '$complemento', '$bairro')") OR DIE(mysqli_error($conexao));

		echo "<script> setTimeout(function(){location.href='crud_condominios.php?visualizar'} , 1000); </script>";
	echo " Cadastrado com sucesso";
}

if (isset ($_GET['editar'])) {
	$id = $_GET['id'];

	$sql_update= mysqli_query($conexao, "SELECT c.nome nomec, p.nome nomep, a.razaoSocial, a.idamin, p.idPessoa, c.AvRua, c.num, c.complemento, c.bairro  FROM condominios c 
		INNER JOIN pessoas p ON c.Pessoas_idPessoa = p.idPessoa
		INNER JOIN administradoras a ON c.administradoras_idamin = a.idamin
		WHERE idcondominio = '$id'");
	while ($linha = mysqli_fetch_assoc($sql_update)) {

	$nome=$linha['nomec'];
	$select_pessoa_nome=$linha['nomep'];
	$select_pessoa_id=$linha['idPessoa'];
	$select_administradora_nome=$linha['razaoSocial'];
	$select_administradora_id=$linha['idamin'];
	$AvRua=$linha['AvRua'];
	$num=$linha['num'];
	$complemento=$linha['complemento'];
	$bairro=$linha['bairro'];
	}
}

if (isset ($_GET['atualizar'])) {
	$id = $_GET['id'];

	$nome=$_POST['nome'];
	$select_pessoa=$_POST['select_pesssoa'];
	$select_administradora=$_POST['select_administradora'];
	$AvRua=$_POST['AvRua'];
	$num=$_POST['num'];
	$complemento=$_POST['complemento'];
	$bairro=$_POST['bairro'];

	mysqli_query($conexao, "UPDATE condominios SET nome='$nome', Pessoas_idPessoa='$select_pessoa', administradoras_idamin='$select_administradora', AvRua='$AvRua', num='$num', complemento='$complemento', bairro='$bairro' WHERE idcondominio = $id");

	echo "<script> setTimeout(function(){location.href='crud_condominios.php?visualizar'} , 2000); </script>";
	echo "Registro alterado com sucesso";
}

if (isset ($_GET['excluir'])) {
	$id = $_GET['id'];
	
	echo "<script> setTimeout(function(){location.href='crud_condominios.php?visualizar'} , 2000); </script>";
	
	$sql_delete= mysqli_query($conexao, "DELETE FROM condominios WHERE idcondominio = '$id'") or die( "<br>ERRO: Não pode excluir esse registro pois a outros dados em que ele é referenciado!<br>");
	echo "Registro excluido com sucesso";
}
?>