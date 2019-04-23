	<?php 
	include_once 'menu.php';
	include 'conexao.php';

if (isset($_GET['visualizar'])){


	$seleciona_lote = "SELECT *, l.nome nomel, c.nome nomec FROM lotes l
	INNER JOIN condominios c ON l.condominios_idcondominio = c.idcondominio";
	$busca_lote = mysqli_query($conexao,$seleciona_lote) or die(mysqli_error);
	$verificar=mysqli_num_rows($busca_lote);
	if($verificar > 0 ) {
		while($busca_lote_linhas = mysqli_fetch_array($busca_lote)){
			
			$id=$busca_lote_linhas['idlote'];
			$condominio= $busca_lote_linhas['nomec'];
			$nome= $busca_lote_linhas['nomel'];
			$descricao= $busca_lote_linhas['descricao'];
			$tamanho= $busca_lote_linhas['tamanho'];
		
	?>		<div class="form">
				<div class="fundo" >
					<h2>Lote</h2>
					<br><label> Condominio: </label><?php echo $condominio; ?>
					<br><label> Nome: </label><?php echo $nome; ?>
					<br><label> Descrição: </label><?php echo $descricao; ?>
					<br><label> Tamanho: </label><?php echo $tamanho; ?> m²
					<br><br><br><br>

				</div>
				<div class="surgir surgir1">
					<button class="text" onclick="location.href= 'editar_lotes.php?editar&id=<?php echo $id?> '">Editar</button>
				</div>
				<div>
					<button class="surgir surgir2 text" onclick="location.href='crud_lotes.php?excluir&id=<?php echo $id?>'">Excluir</button>
				</div>
			</div> 
	<?php
			
		}
	}else{echo "<br>Não há registros<br>";}
				 
}

if(isset($_POST['cadastrar'])){

	$nome=$_POST['nome'];
	$select_condominio=$_POST['select_condominio'];
	$descricao=$_POST['descricao'];
	$tamanho=$_POST['tamanho'];

	mysqli_query($conexao,"INSERT INTO lotes(nome, condominios_idcondominio, descricao, tamanho) Values('$nome', '$select_condominio', '$descricao', '$tamanho')") OR DIE(mysqli_error($conexao));

			echo "<script> setTimeout(function(){location.href='crud_lotes.php?visualizar'} , 1000); </script>";
	echo " Cadastrado com sucesso";
}

if (isset($_GET['editar'])) {
	$id=$_GET['id'];
	
	$select_tabela=mysqli_query($conexao,"SELECT l.nome nomel, l.descricao, l.tamanho, c.idcondominio, c.nome nomec FROM lotes l
	INNER JOIN condominios c ON l.condominios_idcondominio = c.idcondominio
	WHERE idlote='$id' ");

	while ($linha=mysqli_fetch_assoc($select_tabela)) {
		
		$nome=$linha['nomel'];
		$select_condominio_id=$linha['idcondominio'];
		$select_condominio_nome=$linha['nomec'];
		$descricao=$linha['descricao'];
		$tamanho=$linha['tamanho'];
	}
}

if (isset($_GET['atualizar'])) {
	$id=$_GET['id'];

	$nome=$_POST['nome'];
	$select_condominio=$_POST['select_condominio'];
	$descricao=$_POST['descricao'];
	$tamanho=$_POST['tamanho'];


	mysqli_query($conexao,"UPDATE lotes SET nome='$nome', condominios_idcondominio='$select_condominio', descricao='$descricao', tamanho='$tamanho' WHERE idlote='$id'") OR DIE(mysqli_error($conexao));

	echo "Registro alterado com sucesso";
	echo "<script> setTimeout(function(){location.href='crud_lotes.php?visualizar'} , 2000); </script>";
}

if (isset ($_GET['excluir'])) {
	$id = $_GET['id'];

		echo "<script> setTimeout(function(){location.href='crud_lotes.php?visualizar'} , 2000); </script>";

	$sql_delete= mysqli_query($conexao, "DELETE FROM lotes WHERE idlote = '$id'") or die( "<br>ERRO: Não pode excluir esse registro pois a outros dados em que ele é referenciado!<br>");
	echo "Registro excluido com sucesso";

}
?>
