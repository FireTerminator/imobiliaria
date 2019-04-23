<!DOCTYPE html>
<html>
<head>
  <title></title>
  
  <?php include "conexao.php" ?>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css.css">
  <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="jquery.maskedinput.js"></script>

</head>
<body>
<div class="menu">
  <ul class="menu-list">
    <li><a href="index.php">Home</a></li>
    <li>
      <a href="#">Administradoras</a>
       <ul class="sub-menu">
        <li><a href="form_administradoras.php">Cadastrar</a></li>
        <li><a href="crud_administradoras.php?visualizar">Visualizar</a></li>
      </ul>
    </li>
    <li>
      <a href="#">Condominios</a>
        <ul class="sub-menu">
          <li><a href="form_condominios.php">Cadastrar</a></li>
          <li><a href="crud_condominios.php?visualizar">Visualizar</a></li>
        </ul>
     </li>
    <li>
      <a href="#">Pessoas</a>
        <ul class="sub-menu">
          <li><a href="form_pessoas.php">Cadastrar</a></li>
          <li><a href="crud_pessoas.php?visualizar">Visualizar</a></li>
        </ul>
      </li>
    <li>
      <a href="#">Lotes</a>
      <ul class="sub-menu">
        <li><a href="form_lotes.php">Cadastrar</a></li>
        <li><a href="crud_lotes.php?visualizar">Visualizar</a></li>
        </ul>
    </li>
    <li>
      <a href="#">Propriedade</a>
      <ul class="sub-menu">
        <li><a href="form_propriedade.php">Cadastrar</a></li>
        <li><a href="crud_propriedade.php?visualizar">Visualizar</a></li>
        </ul>
    </li>
        <li>
      <a href="#">Alugueis</a>
      <ul class="sub-menu">
        <li><a href="form_alugueis.php">Cadastrar</a></li>
        <li><a href="crud_alugueis.php?visualizar">Visualizar</a></li>
        </ul>
    </li>

  </ul>
</div>

</body>
</html>

