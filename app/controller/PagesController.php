<?php

class PagesController {
  private $tipoCadastro;
  private $login;
  private $endereco;
  private $pessoa;
  private $erro;

  function login() {
     $HOME = '<a class="navbar-brand" href="/?controller=pages&action=pessoajuridica">Procon Paraiba</a>';
     $PESSOA = '<a class="navbar" href="/?controller=pages&action=pessoajuridica">Pessoa Jurídica</a>';
     $HOME = '<a class="navbar-brand" href="/?controller=pages&action=pessoajuridica">Procon Paraiba</a>';
     $LOGIN = '';

     include 'app/view/login.php';
  }

  function listar() {
     include_once ('app/view/list-bloqueios.php');
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
    include_once ('app/Dao/DaoListarUsuarios.class.php');
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
        include_once ('app/model/Logar.class.php');
        include_once ('app/Dao/DaoLogin.class.php');
        include_once ('app/Dao/DaoSelecionarUsuario.class.php');

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

  function cadastrarpj(){
    include_once ('app/controller/DataValidator.php');

    $validate = new DataValidator();
    // ---- DADOS PESSOAL JURIDICA ----- //

    $validate->set('cnpj', $_POST['cnpj'])->is_required();

    if($validate->validate()){
        $this->tipoCadastro = "pessoa_juridica";
        self::cadastrar();
    } else {
      $array = array();
      $array = $validate->get_errors();
      foreach ($array as $key => $value) {
          echo "<script>alert('Erro - $key')</script>";
      }
      self::userPessoaJuridica();
    }
  }

  function cadastrarpf(){
    include_once ('app/controller/DataValidator.php');

    $validate = new DataValidator();
    // ---- DADOS PESSOAL FISICA ----- //
    $validate->set('cpf', $_POST['cpf'])->is_required();
    $validate->set('rg', $_POST['rg'])->is_required();
    $validate->set('exp', $_POST['exp'])->is_required();
    $validate->set('org', $_POST['rg'])->is_required();
    $validate->set('uf', $_POST['uf'])->is_required();

    if($validate->validate()){
        $this->tipoCadastro = "pessoa_fisica";
        self::cadastrar();
    } else {
      $array = array();
      $array = $validate->get_errors();
      foreach ($array as $key => $value) {
          echo "<script>alert('Erro - $key')</script>";
      }
      self::userPessoaFisica();
    }
  }

  function cadastrar() {
      include_once ('app/controller/DataValidator.php');

      $validate = new DataValidator();

      $validate->set('nome', $_POST['nome'])->is_required();
      $validate->set('email', $_POST['email'])->is_required()->is_email();
      $validate->set('tel', $_POST['tel'])->is_required();
      $validate->set('pwd', $_POST['pwd'])->is_required();
      $validate->set('pwdconf', $_POST['pwdconf'])->is_required()->is_equals($_POST['pwd'], true);

      $validate->set('cep', $_POST['cep'])->is_required();
      $validate->set('cidade', $_POST['cidade'])->is_required();
      $validate->set('rua', $_POST['rua'])->is_required();
      $validate->set('bairro', $_POST['bairro'])->is_required();

      if($validate->validate()) {
          include_once ('app/model/PessoaJuridica.class.php');
          include_once ('app/model/PessoaFisica.class.php');
          include_once ('app/model/Telefone.class.php');
          include_once ('app/model/Endereco.class.php');

          $this->login = Telefone::getInstanceTelefone();
          $this->login->setTelefone($_POST['tel']);
          $this->login->setEmail($_POST['email']);
          $this->login->setPassword($_POST['pwd']);

          $this->endereco = Endereco::getInstanceEndereco();
          $this->endereco->setCep($_POST['cep']);
          $this->endereco->setRua($_POST['rua']);
          $this->endereco->setBairro($_POST['bairro']);
          $this->endereco->setCidade($_POST['cidade']);

          if(!empty($_POST['complemento'])){
            $this->endereco->setComplemento($_POST['complemento']);
          }
          if (!empty($_POST['numero'])){
            $this->endereco->setNumero($_POST['numero']);
          }

          if($this->tipoCadastro == "pessoa_juridica") {
            echo "<script>alert('Set PJ')</script>";

              $this->pessoa = PessoaJuridica::getInstancePessoaJuridica();
              $this->pessoa->setCnpj($_POST['cnpj']);
              $this->pessoa->setNome($_POST['nome']);

              if(!empty($_POST['telemarketing'])){
                echo "<script>alert('Set telemarketing')</script>";
                $this->pessoa->setTelemarketing(true);
              }
          } else if($this->tipoCadastro == "pessoa_fisica") {
              $this->pessoa = PessoaFisica::getInstancePessoaFisica();
              $this->pessoa->setCpf($_POST['cpf']);
              $this->pessoa->setNome($_POST['nome']);
              $this->pessoa->setRg($_POST['rg']);
              $this->pessoa->setDataExpdicao($_POST['exp']);
              $this->pessoa->setOrgExpedidor($_POST['org']);
              $this->pessoa->setUf($_POST['uf']);
          }

          self::insertUsuario($this->pessoa, $this->login, $this->endereco, $this->tipoCadastro);

        } else {
          $array = array();
          $array = $validate->get_errors();
          foreach ($array as $key => $value) {
              echo "<script>alert('Erro - $key')</script>";
          }
          self::userPessoaFisica();
        }
  }

  function insertUsuario($pessoa, $login, $endereco, $tipoCadastro) {
      include_once ('app/Dao/DaoInserirUsuario.class.php');
      $insertUsuario = new DaoUsuario($pessoa, $login, $endereco);

      if($tipoCadastro == "pessoa_juridica" && $pessoa->getCnpj() != null) { // ---- VERIFICAR SE E PESSOA JURIDICAR ----- //
          try{
            if(!$insertUsuario->verificarEmailExist()) {
              if(!$insertUsuario->verificarTelefonelExist()) {
                if(!$insertUsuario->verificarCnpjExist()) {
                  if($insertUsuario->inserirEndereco()) {
                    if($pessoa->getTelemarketing()) {
                      if(!$insertUsuario->inserirTelemarketing()) {
                        $this->erro = $insertUsuario->getErro();
                        echo "<script>alert('Error telemarketing - $this->erro')</script>";
                      }
                    }
                    self::login();
                  }
                }
              }
            }
            $this->erro = $insertUsuario->getErro();
            echo   $this->erro;//"<script>alert('Error - $this->erro')</script>";
          } catch (Exception $ex){
            $this->erro = "Exeção no Cadastro de Pessoa Fisica!";
            self::pessoaJuridica();
          }
      } else if($tipoCadastro == "pessoa_fisica" && $pessoa->getCpf() != null) {
            try {
              if(!$insertUsuario->verificarEmailExist()){
                if(!$insertUsuario->verificarTelefonelExist()){
                  if(!$insertUsuario->verificarCpfExist()){
                    if($insertUsuario->inserirEndereco()){
                        self::login();
                    }
                  }
                }
              }
              $this->erro = $insertUsuario->getErro();
              echo "<script>alert('Error - $this->erro')</script>";
              self::pessoafisica();
            } catch (Exception $ex){
              $this->erro = "Exeção no Cadastro de Pessoa Fisica!";
              self::pessoafisica();
            }
      }
  }

  function remove($id) {
    include_once ('app/Dao/DaoSelecionarUsuario.class.php');

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
    include_once ('app/Dao/DaoSelecionarUsuario.class.php');

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
    include_once ('app/Dao/DaoSelecionarUsuario.class.php');

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
    include_once ('app/Dao/DaoSelecionarUsuario.class.php');

    if(!searchTelemarketing($conexao, $id)) {
      $msgRet = "Produto $id removido com sucesso!";
    }
    mysqli_close($conexao);
    header("Location: /?controller=produtos&action=lista");
    ProdutosController::lista();
  }
}
