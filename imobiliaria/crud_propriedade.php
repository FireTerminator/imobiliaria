<?php 
	include_once 'menu.php';
	include 'conexao.php'; 

if (isset($_GET['visualizar'])){


	$seleciona_propriedade = "SELECT *, p.nome nomep, l.nome nomel FROM pessoas_tem_lotes pl INNER JOIN pessoas p ON pl.Pessoas_idPessoa = p.idPessoa
	INNER JOIN lotes l ON pl.lotes_idlote = l.idlote";
	$busca_propriedade = mysqli_query($conexao,$seleciona_propriedade) or die(mysqli_error);
	$verificar=mysqli_num_rows($busca_propriedade);
	if($verificar > 0 ) {
		while($busca_propriedade_linhas = mysqli_fetch_array($busca_propriedade)){
			
			$id= $busca_propriedade_linhas['idPL'];
			$proprietario=$busca_propriedade_linhas['nomep'];
			$lote= $busca_propriedade_linhas['nomel'];
			$dataAquisicao= $busca_propriedade_linhas['dataAquisicao'];
			$percentual= $busca_propriedade_linhas['percentual'];
		
	?>	
			<div class=form > 
				<div class="fundo">
					<h2>Propriedade</h2>
					<label><br>Proprietario: </label> <?php echo $proprietario;?>
					<br><label> Lote: </label><?php echo $lote;?>
					<br><label> Data da Aquisição: </label> <?php echo $dataAquisicao;?>
					<br><label> Percentual: </label> <?php echo $percentual;?>
					<br><br>
				</div>
				<div class='surgir surgir1'> <button class='text' onclick="location.href = 'editar_propriedade.php?editar&id=<?php echo $id ?> '">Editar</button>
				</div>
				<div class='surgir surgir2'><button class='text' onclick="location.href = 'form_propriedade.php?excluir&id=<?php echo $id ?> '">Excluir</button>
				</div>
			</div>
			
	<?php
		}
	}else{echo "<br>Não há registros<br>";}
		 
}


if (isset($_POST['cadastrar'])){

	$select_pessoa= $_POST['select_pessoa'];
	$select_lote= $_POST['select_lote'];
	$data_aquisicao= $_POST['data_aquisicao'];
	$percentual= $_POST['percentual'];

	mysqli_query($conexao,"INSERT INTO pessoas_tem_lotes (Pessoas_idPessoa, lotes_idlote, dataAquisicao, percentual) VALUES ('$select_pessoa', '$select_lote', '$data_aquisicao', '$percentual')") or die( mysqli_error($conexao));

			echo "<script> setTimeout(function(){location.href='crud_propriedade.php?visualizar'} , 1000); </script>";
	echo " Cadastrado com sucesso"; 
}

if (isset ($_GET['editar'])) {
	$id = $_GET['id'];

	$sql_update= mysqli_query($conexao, "SELECT p.nome nomep, p.idPessoa, l.nome nomel, l.idlote, pl.dataAquisicao, pl.percentual FROM pessoas_tem_lotes pl
		INNER JOIN pessoas p ON pl.Pessoas_idPessoa = p.idPessoa
		INNER JOIN lotes l ON pl.lotes_idlote = l.idlote
		WHERE idPL = '$id'");
	while ($linha = mysqli_fetch_assoc($sql_update)) {

	$select_pessoa_id=$linha['idPessoa'];
	$select_pessoa_nome=$linha['nomep'];
	$select_lote_id=$linha['idlote'];
	$select_lote_nome=$linha['nomel'];
	$dataAquisicao=$linha['dataAquisicao'];
	$percentual=$linha['percentual'];
	}
}

if (isset ($_GET['atualizar'])) {
	$id = $_GET['id'];

	$select_pessoa= $_POST['select_pessoa'];
	$select_lote= $_POST['select_lote'];
	$data_aquisicao= $_POST['data_aquisicao'];
	$percentual= $_POST['percentual'];

		mysqli_query($conexao,"UPDATE pessoas_tem_lotes SET Pessoas_idPessoa='$select_pessoa', lotes_idlote='$select_lote', dataAquisicao='$data_aquisicao', percentual='$percentual' WHERE idPL = $id") or die( mysqli_error($conexao));

	echo "<script> setTimeout(function(){location.href='crud_propriedade.php?visualizar'} , 2000); </script>";
	echo "Registro alterado com sucesso";
}

if (isset ($_GET['excluir'])) {
	$id = $_GET['id'];

	echo "<script> setTimeout(function(){location.href='crud_propriedade.php?visualizar'} , 2000); </script>";

	$sql_delete= mysqli_query($conexao, "DELETE FROM pessoas_tem_lotes WHERE idPL = '$id'") or die( "<br>ERRO: Não pode excluir esse registro pois a outros dados em que ele é referenciado!<br>");
	
	echo "registro excluido com sucesso";
}
 ?>