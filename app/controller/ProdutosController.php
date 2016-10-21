<?php

/**
 * Controller Produtos
 */
class ProdutosController {

  function home()
  {
    include 'app/view/Produtos.php';
  }

  function cadastra() {
    include 'app/view/produto-formulario.tpl';
  }

  function lista() {
    include 'app/view/produto-lista.php';
  }

  function adiciona($nome, $preco)
  {
      require_once('app/model/banco-produto.php');

      $nome = $_POST['nome'];
      $preco = $_POST['preco'];

      if(insereProduto($conexao, $nome, $preco)) {
        $msgRet = "Produto $nome adicionado com sucesso! \n Preço: R$ $preco ";
      } else {
        $msg = mysqli_error($conexao);
        $msgRet = "O produto $nome não foi adicionado:  $msg";
      }
      mysqli_close($conexao);

      ProdutosController::cadastra();

  }

  function remove($id)
  {
    require('app/model/banco-produto.php');
    echo "id passado $id ";
    // $id = $_POST['param'];
    // echo "id passado $id ";

    if(removeProduto($conexao, $id)) {
      $msgRet = "Produto $id removido com sucesso!";
    } else {
      $msg = mysqli_error($conexao);
      $msgRet = "O produto $id não foi adicionado:  $msg";
    }
    // header("Location: app/view/produto-lista.php");

    ProdutosController::lista();

  }
}
?>
