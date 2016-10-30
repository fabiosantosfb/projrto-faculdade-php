<?php

class PagesController {
  private $pessoa;
  private $login;
  private $insertUsuario;
  private $endereco;

  function login() {
     $HOME = '<a class="navbar-brand" href="/?controller=pages&action=pessoajuridica">Procon Paraiba</a>';
     $PESSOA = '<a class="navbar" href="/?controller=pages&action=pessoajuridica">Pessoa Jurídica</a>';
     $HOME = '<a class="navbar-brand" href="/?controller=pages&action=pessoajuridica">Procon Paraiba</a>';
     $LOGIN = '';

     include 'app/view/login.php';
  }

  function telemarketing() {
     include_once ('app/view/telemarketing-pages.php');
  }

  function userPessoaJuridica() {
    include_once ('app/view/user-pj-pages.php');
  }

  function userPessoaFisica() {
    include ('app/view/user-pf-pages.php');
  }

  function adminAdministrador() {
    include_once 'app/view/view-admin/admin.php';
  }

  function adminTelemarketing() {
    include_once 'app/view/view-admin/telemarketing.php';
  }

  function adminpessoafisica() {
    include_once 'app/view/view-admin/pessoa-fisica.php';
  }

  function adminpessoajuridica() {
    include_once ('app/model/Dao/DaoListarUsuarios.class.php');
      $list_arry = array();

      $listar = Listar::getInstanceListar();
      $list_arry = $listar->listarPessoaJuridica();
      var_dump($list_arry);
    include_once 'app/view/view-admin/pessoa-juridica.php';

  }

  function page404() {
    include 'app/view/404.php';
  }

  function pessoafisica() {
    $LOGIN = '<li><a href="/?controller=pages&action=login">Login</a></li>';
    $PESSOA = '<a class="navbar" href="/?controller=pages&action=pessoajuridica">Pessoa Jurídica</a>';
    $HOME = '<a class="navbar-brand" href="/?controller=pages&action=pessoajuridica">Procon Paraiba</a>';

    include 'app/view/home-form-pf.php';
  }

  function pessoajuridica() {
    $LOGIN = '<li><a href="/?controller=pages&action=login">Login</a></li>';
    $PESSOA = '<a class="navbar" href="/?controller=pages&action=pessoafisica">Pessoa Física</a>';
    $HOME = '<a class="navbar-brand" href="/?controller=pages&action=pessoafisica">Procon Paraiba</a>';

    include 'app/view/home-form-pj.php';
  }

  function logar() {
    include_once ('app/controller/DataValidator.php');

    $validate = new DataValidator();

    $erro =  $validate->set('email', $_POST['email'])->is_required()->is_email();
    $erro =  $validate->set('pwd', $_POST['pwd'])->is_required();

    if ($validate->validate()){
        include ('app/model/Logar.class.php');
        include ('app/model/Dao/DaoLogin.class.php');
        include ('app/model/Dao/DaoSelecionarUsuario.class.php');

        $this->login = Login::getInstanceLogin();
        $this->login->setEmail($_POST['email']);
        $this->login->setPassword($_POST['pwd']);

        $d_logar = new DaoLogin($this->login);

        if(!$d_logar->loginDb()){
              $msg_erro = $d_logar->getErro();
              echo "<script>alert('Erro $msg_erro')</script>";
              self::login();
        } else {
          $selecionaUser =  new Selection($this->login->getId());
          $selecionaUser->typeUser();

          if($selecionaUser->getTypeUser() === "pessoa_fisica"){
            self::userPessoaFisica();
          } else if($selecionaUser->getTypeUser() === "pessoa_juridica") {
            self::userPessoaJuridica();
          } else if($selecionaUser->getTypeUser() === "telemarketing"){
            self::telemarketing();
          } else if($selecionaUser->getTypeUser() === "admin"){
            self::adminAdministrador();
          }
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
      $session = Session::getInstanceSession();
      $session->setIdSession(null);
      $session->setNameSession(null);
      $session->gerarSession(false);
      $session->destroiSession();

      self::login();
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
          include_once ('app/model/Dao/DaoInserirUsuario.class.php');

          $this->pessoa = new PessoaJuridica($_POST['cnpj'], $_POST['nome']);
          $this->login = new Telefone($_POST['tel'], $_POST['email'], $_POST['pwd']);
          $this->endereco = new Endereco($_POST['cep'], $_POST['rua'], $_POST['bairro'], $_POST['cidade'],  $_POST['numero'], $_POST['complemento']);

          $this->insertUsuario = new DaoUsuario($this->pessoa, $this->login, $this->endereco);

          if($this->insertUsuario->insertUsuario($conexao)) {
            self::login();
          } else {
            $this->insertUsuario->getErro();
              self::userPessoaFisica();
          }
        } else {
          $array = $validate->get_errors();
          foreach ($array as $key => $value) {
              echo "<script>alert('Erro - $key')</script>";
          }
          self::userPessoaFisica();
        }
  }

  function remove($id) {
    include_once ('app/model/Dao/DaoSelecionarUsuario.class.php');

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
    include_once ('app/model/Dao/DaoSelecionarUsuario.class.php');

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
    include_once ('app/model/Dao/DaoSelecionarUsuario.class.php');

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
    include_once ('app/model/Dao/DaoSelecionarUsuario.class.php');

    if(!searchTelemarketing($conexao, $id)) {
      $msgRet = "Produto $id removido com sucesso!";
    }
    mysqli_close($conexao);
    header("Location: /?controller=produtos&action=lista");
    ProdutosController::lista();
  }
}
