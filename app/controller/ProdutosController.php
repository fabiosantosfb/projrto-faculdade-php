<?php

class ProdutosController {
  private $pessoa;
  private $login;
  private $insertUsuario;
  private $endereco;

  function home()
  {
    include 'app/view/home.php';
  }

  function lista() {
    include 'app/view/lista-telemarketing.php';
  }

  function proximo($pessoa) {
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

        include ('app/model/Logar.class.php');
        include ('app/model/Dao/DaoLogin.class.php');

        $d_logar = new DaoLogin(new Login($_POST['email'], $pwd), $_POST['pwd']);

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

  function cadastrar() {
      include_once ('app/controller/DataValidator.php');

      $validate = new DataValidator();
      // ---- DADOS PESSOAL JURIDICA ----- //
      $erro =  $validate->set('cnpj', $_POST['cnpj'])->is_required();
      $erro =  $validate->set('nome', $_POST['nome'])->is_required();

      $erro =  $validate->set('email', $_POST['email'])->is_required()->is_email();
      $erro =  $validate->set('tel', $_POST['tel'])->is_required();
      $erro =  $validate->set('pwd', $_POST['pwd'])->is_required();
      $erro =  $validate->set('pwdconf', $_POST['pwdconf'])->is_required()->is_equals($_POST['pwd'], true);

      $erro =  $validate->set('cep', $_POST['cep'])->is_required();
      $erro =  $validate->set('numero', $_POST['numero'])->is_required();
      $erro =  $validate->set('complemento', $_POST['complemento'])->is_required();
      $erro =  $validate->set('cidade', $_POST['cidade'])->is_required();
      $erro =  $validate->set('rua', $_POST['rua'])->is_required();
      $erro =  $validate->set('bairro', $_POST['bairro'])->is_required();

      if($validate->validate()){
          require_once ('conecta.php');
          include_once ('app/model/PessoaJuridica.class.php');
          include_once ('app/model/Telefone.class.php');
          include_once ('app/model/Endereco.class.php');
          include_once ('app/model/Dao/DaoUsuario.class.php');

          $this->pessoa = new PessoaJuridica($_POST['cnpj'], $_POST['nome']);
          $this->login = new Telefone($_POST['tel'], $_POST['email'], $_POST['pwd']);
          $this->endereco = new Endereco($_POST['cep'], $_POST['rua'], $_POST['bairro'], $_POST['cidade'],  $_POST['numero'], $_POST['complemento']);

          $this->insertUsuario = new DaoUsuario($this->pessoa, $this->login, $this->endereco);

          if($this->insertUsuario->insertUsuario($conexao)) {
            self::login();
          } else {
            $this->insertUsuario->getErro();
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

  function remove($id) {
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
    }
  }

  function ativar() {
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
      }
  }

  function desativar() {
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
    }
  }

  function search($id) {
    require('app/model/banco-produto.php');

    if(!searchTelemarketing($conexao, $id)) {
      $msgRet = "Produto $id removido com sucesso!";
    }
    mysqli_close($conexao);
    header("Location: /?controller=produtos&action=lista");
    ProdutosController::lista();
  }
}
