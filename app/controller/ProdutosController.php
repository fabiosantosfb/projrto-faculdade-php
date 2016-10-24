<?php

class ProdutosController {

  function home()
  {
    include 'app/view/home.php';
  }

  function lista() {
    include 'app/view/produto-lista.php';
  }

  function proximo() {
    include 'app/view/endereco.php';
  }

  function empresa() {
      self::home();
  }

  function login() {
     include 'app/view/login.php';
  }

  function logar() {
    if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        include ('app/model/Logar.class.php');
        include ('app/model/Dao/DaoLogin.class.php');

        $d_logar = new DaoLogin(new Login($email, $pwd));
        if(!$d_logar->loginDb()){
              $msg_erro = $d_logar->getErro();
              echo "<script>alert('Erro $msg_erro')</script>";
              self::login();
        } else {
          header("Location: /?controller=produtos&action=user");
        }
    } else {
        echo "<script>alert('Campos em Branco!')</script>";
        self::login();
    }
  }

  function logout() {
    include_once ('app/model/Session.class.php');
    Session::destroiSession();
    self::home();
  }

  function user(){
    include 'app/view/user-pages.php';
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

  function search($id)
  {
    require('app/model/banco-produto.php');

    if(!searchTelemarketing($conexao, $id)) {
      $msgRet = "Produto $id removido com sucesso!";
    }
    mysqli_close($conexao);
    header("Location: /?controller=produtos&action=lista");
    ProdutosController::lista();
  }
}
