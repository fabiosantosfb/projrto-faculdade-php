<?php

/**
 * Controller Produtos
 */
class ProdutosController {

  function home()
  {
    include 'app/view/Produtos.php';
  }

  function lista() {
    include 'app/view/produto-lista.php';
  }

  function adiciona($cnpj, $r_social, $rua, $uf, $bairro, $cidade, $cep, $email, $numero, $complemento, $pwd, $pws_conf)
  {
      require_once('app/model/banco-produto.php');

      $cnpj = $_POST['cnpj'];
      $r_social = $_POST['r_social'];
      $rua = $_POST['rua'];
      $uf = $_POST['uf'];
      $bairro = $_POST['bairro'];
      $cidade = $_POST['cidade'];
      $cep = $_POST['cep'];
      $email = $_POST['email'];
      $numero = $_POST['numero'];
      $complemento = $_POST['complemento'];
      $pwd = $_POST['pwd'];
      $pwd_repet = $_POST['pws_conf'];

      if(insereProduto($conexao, $cnpj, $r_social, $rua, $numero, $uf, $bairro, $cidade, $cep, $email, $complemento, $pwd)) {
          header("Location: /?controller=produtos&action=lista");
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

    if(removeProduto($conexao, $id)) {
      $msgRet = "Produto $id removido com sucesso!";
    } else {
      $msg = mysqli_error($conexao);
      $msgRet = "O produto $id não foi adicionado:  $msg";
    }
    mysqli_close($conexao);
    header("Location: /?controller=produtos&action=lista");
    ProdutosController::lista();
  }

  function ativar($id)
  {
    require('app/model/banco-produto.php');

    if(ativarProduto($conexao, $id, $ativa=1)) {
      $msgRet = "Produto $id removido com sucesso!";
    } else {
      $msg = mysqli_error($conexao);
      $msgRet = "O produto $id não foi adicionado:  $msg";
    }
    mysqli_close($conexao);
    header("Location: /?controller=produtos&action=lista");
    ProdutosController::lista();
  }

  function desativar($id)
  {
    require('app/model/banco-produto.php');

    if(ativarProduto($conexao, $id, $ativa=0)) {
      $msgRet = "Produto $id removido com sucesso!";
    } else {
      $msg = mysqli_error($conexao);
      $msgRet = "O produto $id não foi adicionado:  $msg";
    }
    mysqli_close($conexao);
    header("Location: /?controller=produtos&action=lista");
    ProdutosController::lista();
  }
}
