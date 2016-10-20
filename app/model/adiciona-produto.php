<?php include("cabecalho.php") ?>
<?php include("conecta.php") ?>
<?php include("banco-produto.php") ?>
<?php
  $nome = $_GET['nome'];
  $preco = $_GET['preco'];

  if(insereProduto($conexao, $nome, $preco)) { ?>
    <p class="text-sucess">Produto <?=$nome; ?> adicionado com sucesso!</p>
    <p>Preço: R$ <?=$preco; ?></p>
 <?php
  } else {  $msg = mysqli_error($conexao); ?>
    <p class="text-danger">O produto <?=$nome; ?> não foi adicionado: <?= $msg ?> </p>
    <?php
  }
  mysqli_close($conexao);

 ?>
<?php include("rodape.php") ?>
