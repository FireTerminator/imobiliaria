<?php
//function conectarAoBanco(){
	$servidor= "localhost";
	$usuario = "root";
	$senha   = "";
	$banco   = "imobiliaria";
	$conexao = mysqli_connect($servidor, $usuario,$senha) or die ("Erro ao conectar ao banco");
	mysqli_select_db ($conexao, $banco);
	//return $conexao;
//}

?>