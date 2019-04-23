<?php
	include_once 'menu.php';
	include 'conexao.php';

if (isset($_GET['visualizar'])){


	$seleciona_pessoa = "SELECT * FROM pessoas";
	$busca_pessoa = mysqli_query($conexao,$seleciona_pessoa) or die(mysqli_error($conexao));
	$verificar=mysqli_num_rows($busca_pessoa);
	if($verificar > 0 ) {
		while($busca_pessoa_linhas = mysqli_fetch_array($busca_pessoa)){
			
			$id=$busca_pessoa_linhas['idPessoa'];
			$nome=$busca_pessoa_linhas['nome'];
			$cpf= $busca_pessoa_linhas['CPF'];
			$dataNasc= $busca_pessoa_linhas['dataNasc'];
			$AvRua= $busca_pessoa_linhas['AvRua'];
			$num= $busca_pessoa_linhas['num'];
			$complemento= $busca_pessoa_linhas['complemento'];
			$telefone= $busca_pessoa_linhas['telefone'];
		?>
		<div class=form > 
			<div class="fundo">
				<h2>Pessoa</h2>
				<label><br>Nome: </label><?php echo $nome;?>
				<br><label> CPF: </label><?php echo $cpf;?>
				<br><label> Data de Nascimento: </label><?php echo $dataNasc;?>
				<br><label> Av/Rua: </label><?php echo $AvRua;?>
				<br><label> Numero: </label><?php echo $num;?>
				<br><label> Complemento: </label><?php echo $complemento;?>
				<br><label> Telefone: </label><?php echo $telefone?>
			</div>
			<div class='surgir surgir1'> <button class='text' onclick="location.href = 'editar_pessoas.php?editar&id=<?php echo $id ?> '">Editar</button>
			</div>
			<div class='surgir surgir2'><button class='text' onclick="location.href = 'crud_pessoas.php?excluir&id=<?php echo $id ?> '">Excluir</button>
			</div>
		</div>	
	<?php		
		}
	}else{echo "<br>Não há registros<br>";}
				 
}

if(isset($_POST['cadastrar'])){

	$chars=array(".","-","(",")");
	$nome=$_POST['nome'];
	$cpf=str_replace($chars,"", $_POST['cpf']);
	$dataNasc=$_POST['dataNasc'];
	$AvRua=$_POST['AvRua'];
	$num=$_POST['num'];
	$complemento=$_POST['complemento'];
	$telefone=$_POST['telefone'];

	mysqli_query($conexao,"INSERT INTO pessoas(nome, CPF, dataNasc, AvRua, num, complemento, telefone) Values('$nome', '$cpf', '$dataNasc', '$AvRua', '$num', '$complemento', '$telefone')") OR DIE(mysqli_error($conexao));

			echo "<script> setTimeout(function(){location.href='crud_pessoas.php?visualizar'} , 1000); </script>";
	echo " Cadastrado com sucesso";
}

if(isset($_GET['editar'])){
	$id=$_GET['id'];

	$selec_tabela = mysqli_query($conexao,"SELECT  * FROM pessoas WHERE idPessoa = '$id'");
	while ($linha=mysqli_fetch_assoc($selec_tabela)) {

	$nome=$linha['nome'];
	$cpf=$linha['CPF'];
	$dataNasc=$linha['dataNasc'];
	$AvRua=$linha['AvRua'];
	$num=$linha['num'];
	$complemento=$linha['complemento'];
	$telefone=$linha['telefone'];
	}

}

if (isset ($_GET['atualizar'])) {
	$id = $_GET['id'];

	$chars=array(".","-","(",")");
	$nome=$_POST['nome'];
	$cpf=str_replace($chars,"", $_POST['cpf']);
	$dataNasc=$_POST['dataNasc'];
	$AvRua=$_POST['AvRua'];
	$num=$_POST['num'];
	$complemento=$_POST['complemento'];
	$telefone=str_replace($chars,"", $_POST['telefone']);

	mysqli_query($conexao,"UPDATE pessoas SET nome='$nome', CPF='$cpf', dataNasc='$dataNasc', AvRua='$AvRua', num='$num', complemento='$complemento', telefone='$telefone' WHERE idPessoa = '$id'") OR DIE(mysqli_error($conexao));

	echo "<script> setTimeout(function(){location.href='crud_pessoas.php?visualizar'} , 2000); </script>";
	echo "Registro alterado com sucesso";
}

if (isset ($_GET['excluir'])) {
	$id = $_GET['id'];

	echo "<script> setTimeout(function(){location.href='crud_pessoas.php?visualizar'} , 2000); </script>";

	$sql_delete= mysqli_query($conexao, "DELETE FROM pessoas WHERE idPessoa = '$id'") or die( "<br>ERRO: Não pode excluir esse registro pois a outros dados em que ele é referenciado!<br>");

	echo "registro excluido com sucesso";
}

?>
