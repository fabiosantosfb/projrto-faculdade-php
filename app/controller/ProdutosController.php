<?php

class ProdutosController {

  function home()
  {
    include 'app/view/home.php';
  }

  function lista() {
    include 'app/view/lista-telemarketing.php';
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
    include_once ('app/controller/DataValidator.php');

    $validate = new DataValidator();

    $erro =  $validate->set('email', $_POST['email'])->is_required()->is_email();
    $erro =  $validate->set('pwd', $_POST['pwd'])->is_required();

    if ($validate->validate()){

        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        include ('app/model/Logar.class.php');
        include ('app/model/Dao/DaoLogin.class.php');

          $login = new Login();
          $login->setEmail($email);
          $login->setPassword($pwd);

        $d_logar = new DaoLogin($login);
        if(!$d_logar->loginDb()){
              $msg_erro = $d_logar->getErro();
              echo "<script>alert('Erro $msg_erro')</script>";
              self::login();
        } else {
          header("Location: /?controller=produtos&action=user");
        }
    } else {
      $array = $validate->get_errors();
      foreach ($array as $key => $value) {
        echo "<script>alert('Erro $key')</script>";
      }
        self::login();
    }
  }

  function logout() {
    include_once ('app/model/Session.class.php');
      $session = new   Session();
      $session->destroiSession();

      self::home();
  }

  function user(){
    include 'app/view/user-pages.php';
  }

  function next()
  {
      include_once ('app/controller/DataValidator.php');

      $validate = new DataValidator();
      // ---- DADOS PESSOAL JURIDICA ----- //
      $erro =  $validate->set('cnpj', $_POST['cnpj'])->is_required();
      $erro =  $validate->set('r_social', $_POST['r_social'])->is_required();

      $erro =  $validate->set('email', $_POST['email'])->is_required()->is_email();
      $erro =  $validate->set('pwd', $_POST['pwd'])->is_required();
      $erro =  $validate->set('pwdconf', $_POST['pwdconf'])->is_required()->is_equals($_POST['pwd'], true);

      if($validate->validate()){
          include ('app/model/Empresa.class.php');
          include ('app/model/Logar.class.php');
          include ('app/model/Dao/DaoUsuario.class.php');

          $insertEmpresa = new DaoUsuario(new Empresa($_POST['cnpj'], $_POST['r_social']), new Login($_POST['email'], $_POST['pwd']));

          if($insertEmpresa->inserirPessoaJuridica()) {
              self::add();
          } else {
            self::home();
          }
      } else {
        $array = $validate->get_errors();
        foreach ($array as $key => $value) {
            echo "<script>alert('Erro - $key')</script>";
        }
        self::home();
      }
  }

  function add()
  {
      include_once ('app/controller/DataValidator.php');

      $validate = new DataValidator();

      $erro =  $validate->set('cep', $_POST['cep'])->is_required();
      $erro =  $validate->set('numero', $_POST['numero'])->is_required();
      $erro =  $validate->set('complemento', $_POST['complemento'])->is_required();
      $erro =  $validate->set('cidade', $_POST['cidade'])->is_required();
      $erro =  $validate->set('rua', $_POST['rua'])->is_required()->is_email();
      $erro =  $validate->set('bairro', $_POST['bairro'])->is_required();

      require('app/model/banco-produto.php');

      if($validate->validate()){
          if(insereEndereco($_POST['cep'], $_POST['cidade'], $_POST['rua'], $_POST['bairro'], $_POST['numero'], $_POST['complemento'])) {
              self::lista();
          } else {
            $msg = mysqli_error($conexao);
            echo "Não inserio Pessoa Juridica no banco:  $msg";
            self::home();
          }
      } else {
        $array = $validate->get_errors();
        foreach ($array as $key => $value) {
            echo "<script>alert('Erro - $key')</script>";
        }
        self::home();
      }
  }

  function remove($id)
  {
    require('app/model/banco-produto.php');


    if(!empty($_POST['id_telemarketing'])){

      $id = $_POST['id_telemarketing'];

    if(removeProduto($conexao, $id)) {
      $msgRet = "Produto $id removido com sucesso!";
    } else {
      $msg = mysqli_error($conexao);
      $msgRet = "O produto $id não foi adicionado:  $msg";
    }
    mysqli_close($conexao);
    header("Location: /?controller=produtos&action=lista");
    ProdutosController::lista();
  }}

  function ativar()
  {
    require('app/model/banco-produto.php');

    if(!empty($_POST['id_telemarketing'])){

      $id = $_POST['id_telemarketing'];

    if(ativarProduto($conexao, $id, $ativa=1)) {
      $msgRet = "Produto $id removido com sucesso!";
    } else {
      $msg = mysqli_error($conexao);
      $msgRet = "O produto $id não foi adicionado:  $msg";
    }
    mysqli_close($conexao);
    header("Location: /?controller=produtos&action=lista");
    ProdutosController::lista();
  }}

  function desativar()
  {
    require('app/model/banco-produto.php');

    if(!empty($_POST['id_telemarketing'])){

      $id = $_POST['id_telemarketing'];

    if(ativarProduto($conexao, $id, $ativa=0)) {
      $msgRet = "Produto $id removido com sucesso!";
    } else {
      $msg = mysqli_error($conexao);
      $msgRet = "O produto $id não foi adicionado:  $msg";
    }
    mysqli_close($conexao);
    header("Location: /?controller=produtos&action=lista");
    ProdutosController::lista();
  }}

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
