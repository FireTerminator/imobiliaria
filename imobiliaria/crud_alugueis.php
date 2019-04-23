<?php 
	include_once 'menu.php';
	include 'conexao.php'; 

if (isset($_GET['visualizar'])){


	$seleciona_aluguel = "SELECT *, p.nome nomep, l.nome nomel, a.valor FROM alugueis a INNER JOIN pessoas p ON a.Pessoas_idPessoa = p.idPessoa
	INNER JOIN lotes l ON a.lotes_idlote = l.idlote";
	$busca_aluguel = mysqli_query($conexao,$seleciona_aluguel) or die(mysqli_error($conexao));
	$verificar=mysqli_num_rows($busca_aluguel);
	if($verificar > 0 ) {
		while($busca_aluguel_linhas = mysqli_fetch_array($busca_aluguel)){
			
			$id= $busca_aluguel_linhas['idAluguel'];
			$proprietario=$busca_aluguel_linhas['nomep'];
			$lote= $busca_aluguel_linhas['nomel'];
			$valor= $busca_aluguel_linhas['valor'];

	?>	
			<div class=form >  
				<div class="fundo">
					<h2>Aluguel</h2>
					<label> <br>Alugado para: </label> <?php echo $proprietario;?>
					<br><label> Lote: </label><?php echo $lote;?>
					<br><label> valor: </label> <?php echo $valor;?>
					<br><br><br>
				</div>
				<div class='surgir surgir1'> <button class='text' onclick="location.href = 'editar_alugueis.php?editar&id=<?php echo $id ?> '">Editar</button>
				</div>
				<div class='surgir surgir2'><button class='text' onclick="location.href = 'form_alugueis.php?excluir&id=<?php echo $id ?> '">Excluir</button>
				</div>
			</div>
			
	<?php
		}
	}else{echo "<br>Não há registros<br>";}
		 
}


if (isset($_POST['cadastrar'])){

	$select_pessoa= $_POST['select_pessoa'];
	$select_lote= $_POST['select_lote'];
	$valor= $_POST['valor'];

	mysqli_query($conexao,"INSERT INTO alugueis (Pessoas_idPessoa, lotes_idlote, valor) VALUES ('$select_pessoa', '$select_lote', '$valor')") or die( mysqli_error($conexao)); 

			echo "<script> setTimeout(function(){location.href='crud_alugueis.php?visualizar'} , 1000); </script>";
	echo " Cadastrado com sucesso";
}

if (isset ($_GET['editar'])) {
	$id = $_GET['id'];

	$sql_update= mysqli_query($conexao, "SELECT p.idPessoa, p.nome nomep, l.idlote, l.nome nomel, a.valor FROM alugueis a
		INNER JOIN pessoas p ON a.Pessoas_idPessoa = p.idPessoa
		INNER JOIN lotes l ON a.lotes_idlote = l.idlote
		WHERE idAluguel = '$id'");

	while ($linha = mysqli_fetch_assoc($sql_update)) {

	$select_pessoa_id=$linha['idPessoa'];
	$select_pessoa_nome=$linha['nomep'];
	$select_lote_id=$linha['idlote'];
	$select_lote_nome=$linha['nomel'];
	$valor=$linha['valor'];
	}
}

if (isset ($_GET['atualizar'])) {
	$id = $_GET['id'];

	$select_pessoa= $_POST['select_pessoa'];
	$select_lote= $_POST['select_lote'];
	$valor= $_POST['valor'];

		mysqli_query($conexao,"UPDATE alugueis SET Pessoas_idPessoa='$select_pessoa', lotes_idlote='$select_lote', valor='$valor' WHERE idAluguel = $id") or die( mysqli_error($conexao));

	echo "<script> setTimeout(function(){location.href='crud_alugueis.php?visualizar'} , 2000); </script>";
	echo "Registro alterado com sucesso";
}

if (isset ($_GET['excluir'])) {
	$id = $_GET['id'];

	$sql_delete= mysqli_query($conexao, "DELETE FROM alugueis WHERE idAluguel = '$id'") or die( mysqli_error($conexao));
	echo "registro excluido com sucesso";
	echo "<script> setTimeout(function(){location.href='crud_alugueis.php?visualizar'} , 2000); </script>";
}
 ?>