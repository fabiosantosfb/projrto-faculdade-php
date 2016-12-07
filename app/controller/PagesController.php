<?php

class PagesController {
  private $tipoCadastro;
  private $login;
  private $fone;
  private $endereco;
  private $pessoa;

  private $erro;
  private $erro_form;

  private static $PagesController = null;

  public static function getPagesController() {
    if (empty(self::$PagesController)) {
      self::$PagesController = new PagesController();
    }
    return self::$PagesController;
  }
  public function page_form_login() {
    $HOME = '<a class="navbar-brand" href="pessoa-fisica">Procon Paraiba</a>';
    $PESSOA = '<ul class="list-inline">
                        <li><a href="pessoa-fisica">Pessoa Fisica</a></li>
                        <li><a href="pessoa-juridica">Pessoa Juridica</a></li>
                    </ul>';
    $LOGIN = '';

    require_once ('app/view/view-form-login.php');
  }

  public function page_form_pessoafisica() {
    $HOME = '<a class="navbar-brand" href="pessoa-juridica">Procon Paraiba</a>';
    $PESSOA = '<ul class="list-inline"><li><a href="pessoa-juridica">Pessoa Juridica</a></li></ul>';
    $LOGIN = '<li><a href="login">Logar</a></li>';

    require_once ('app/view/view-form-pf.php');
  }

  public function page_form_pessoajuridica() {
    $HOME = '<a class="navbar-brand" href="pessoa-fisica">Procon Paraiba</a>';
    $PESSOA = '<ul class="list-inline"><li><a href=pessoa-fisica>Pessoa Fisica</a></li></ul>';
    $LOGIN = '<li><a href="login">Logar</a></li>';

    require_once ('app/view/view-form-pj.php');
  }

  public function home() {
    $LOGIN = '<li><a href="login">Logar</a></li>';
    $PESSOA = '<ul class="list-inline"><li><a href="pessoa-fisica">Pessoa Fisica</a></li></ul>';

    require_once ('app/view/view-form-pj.php');
  }

  public function userPessoaFisica() {
    $PESSOA = '<ul class="list-inline"><li><a href="pessoa-juridica">Pessoa Fisica</a></li></ul>';
    $LOGIN = '<li><a href="">Bem vindo</a></li>
              <ul class="list-inline">
                <li><a href="logout">Sair</a></li>
              </ul>';

    $pessoaFisica = Selection::getInstanceSelection();
    $pessoa = $pessoaFisica->selectionPessoaFisica($_SESSION['id']);
    $endereco = $pessoaFisica->seachAddress($_SESSION['id']);
    $telefone = $pessoaFisica->seachTelefone($_SESSION['id']);

    require_once ('app/view/view-pf-pages.php');

  }

  public function userPessoaJuridica() {
    $PESSOA = '<ul class="list-inline"><li><a href="">Pessoa Juridica</a></li></ul>';
    $LOGIN = '<li><a href="">Bem vindo</a></li>
              <ul class="list-inline">
                <li><a href="logout">Sair</a></li>
              </ul>';

    $pessoaJuridica = Selection::getInstanceSelection();
    $pessoa = $pessoaJuridica->selectionPessoaJuridica($_SESSION['id']);
    $endereco = $pessoaJuridica->seachAddress($_SESSION['id']);
    $telefone = $pessoaJuridica->seachTelefone($_SESSION['id']);

    require_once ('app/view/view-pj-pages.php');
  }

  public function userAdmin() {

    $HOME = '<a class="navbar-brand" href="admin">Administrador</a>';
    $PESSOA = '<ul class="list-inline">
                        <li><a href="pessoa-f">Pessoa Fisica</a></li>
                        <li><a href="pessoa-j">Pessoa Juridica</a></li>
                    </ul>';
    $LOGIN = '<li><a href="">Bem vindo</a></li>
              <ul class="list-inline">
                <li><a href="logout">Sair</a></li>
              </ul>';
    $listar = Listar::getInstanceListar();
    $listastl = $listar->listarTelemarketing();

    include_once ('app/view/partlals/header.php');
    require_once ('app/view/view-admin/admin.php');
  }

  public function pessoaFisica() {
    $HOME = '<a class="navbar-brand" href="admin">Administrador</a>';
    $PESSOA = '<ul class="list-inline">
                        <li><a href="pessoa-j">Pessoa Juridica</a></li>
                        <li><a href="admin">Telemarketing</a></li>
                    </ul>';
    $LOGIN = '<li><a href="">Bem vindo</a></li>
              <ul class="list-inline">
                <li><a href="logout">Sair</a></li>
              </ul>';
    $listar = Listar::getInstanceListar();
    $listaspf = $listar->listarPessoa();

    include_once ('app/view/partlals/header.php');
    require_once ('app/view/view-admin/pessoa-fisica.php');
  }

  public function pessoaJuridica() {
    $HOME = '<a class="navbar-brand" href="admin">Administrador</a>';
    $PESSOA = '<ul class="list-inline">
                        <li><a href="pessoa-f">Pessoa Fisica</a></li>
                        <li><a href="admin">Telemarketing</a></li>
                    </ul>';
    $LOGIN = '<li><a href="">Bem vindo</a></li>
              <ul class="list-inline">
                <li><a href="logout">Sair</a></li>
              </ul>';
    $listar = Listar::getInstanceListar();
    $listaspj = $listar->listarPessoaJuridica();

    include_once ('app/view/partlals/header.php');
    require_once ('app/view/view-admin/pessoa-juridica.php');
  }

  public function logar() {
    $validate = new DataValidator();

    $erro =  $validate->set('email', $_POST['email'])->is_required()->is_email();
    $erro =  $validate->set('senha', $_POST['senha'])->is_required();

    if ($validate->validate()){
        $this->login = Login::getInstanceLogin();
        $this->login->setEmail($_POST['email']);
        $this->login->setPassword($_POST['senha']);

        $d_logar = new DaoLogin($this->login);
        if(!$d_logar->loginDb()){
          $erro = $d_logar->getErro();
          return false;
        } else {
          if($_SESSION['type_user'] == 'pf') {
            header("Location: /session-pf");
            die;
          } else if($_SESSION['type_user'] == 'pj'){
            header("Location: /session-pj");
            die;
          } else if($_SESSION['type_user'] == 'admin'){
            header("Location: /admin");
            die;
          }
        }
    } else {
      self::getErroForm($validate);
      $this->erro_form = true;
      return false;
    }
  }

  function logout() {
      include_once ('app/model/Session.class.php');
      $session = Session::getInstanceSession();
      $session->setIdSession(null);
      $session->setNameSession(null);
      $session->gerarSession(false);
      $session->destroiSession();

      header("Location: /login");
      die;
  }

  function cadastroPessoaJuridica(){
    $validate = new DataValidator();
    $validate->set('cnpj', $_POST['cnpj'])->is_required();

    $this->tipoCadastro = "pessoajuridica";

    if(!$validate->validate()){
        self::getErroForm($validate);
        $this->erro_form = true;
        //Retorna pagina de formulario pessoa juridica
        return false;
    } else {
        if(!self::cadastrar()) {
          //Retorna pagina de formulario pessoa juridica com erro nos dados de endereço ou login
          return false;
        } else {
          header("Location: /login");
          die;
        }
    }
    return true;
  }

  function cadastroPessoaFisica(){

    $validate = new DataValidator();
    $validate->set('cpf', $_POST['cpf'])->is_required();
    $validate->set('rg', $_POST['rg'])->is_required();
    $validate->set('dataexpedicao', $_POST['dataexpedicao'])->is_required();
    $validate->set('orgao_expedidor', $_POST['orgao_expedidor'])->is_required();
    $validate->set('uf', $_POST['uf'])->is_required();

    $this->tipoCadastro = "pessoafisica";

    if(!$validate->validate()){
      echo '<script>alert("Formulario valido pf!")</script>';
      self::getErroForm($validate);
      $this->erro_form = true;
      //Retorna pagina de formulario pessoa fisica
      return false;
    } else {
        if(!self::cadastrar()) {
          //Retorna pagina de formulario pessoa fisica com erro nos dados de endereço ou login
          return false;
        } else {
          //Retorna pagina de formulario pessoa juridica com erro nos dados de endereço ou login
          header("Location: /login");
          die;
        }
    }
  }

  function cadastrar() {

      $validate = new DataValidator();

      $validate->set('type', $_POST['type'])->is_required();
      $validate->set('nome', $_POST['nome'])->is_required();
      $validate->set('email', $_POST['email'])->is_required()->is_email();
      $validate->set('telefone', $_POST['telefone'])->is_required();
      $validate->set('senha', $_POST['senha'])->is_required();
      $validate->set('repetir_senha', $_POST['repetir_senha'])->is_required()->is_equals($_POST['senha'], true);

      $validate->set('cep', $_POST['cep'])->is_required();
      $validate->set('cidade', $_POST['cidade'])->is_required();
      $validate->set('rua', $_POST['rua'])->is_required();
      $validate->set('bairro', $_POST['bairro'])->is_required();

      if($validate->validate()) {
          include_once ('app/model/PessoaJuridica.class.php');
          include_once ('app/model/PessoaFisica.class.php');
          include_once ('app/model/Telefone.class.php');
          include_once ('app/model/Endereco.class.php');

          $this->fone = Telefone::getInstanceTelefone();
          $this->fone->setTelefone($_POST['telefone']);

          $this->login = Login::getInstanceLogin();
          $this->login->setEmail($_POST['email']);
          $this->login->setPassword($_POST['senha']);
          $this->login->setType($_POST['type']);

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

          if($this->tipoCadastro == "pessoajuridica") {
              $this->pessoa = PessoaJuridica::getInstancePessoaJuridica();
              $this->pessoa->setCnpj($_POST['cnpj']);
              $this->pessoa->setNome($_POST['nome']);

              if(!empty($_POST['telemarketing'])){
                $this->pessoa->setTelemarketing(true);
              }
          } else if($this->tipoCadastro == "pessoafisica") {
              $this->pessoa = PessoaFisica::getInstancePessoaFisica();
              $this->pessoa->setCpf($_POST['cpf']);
              $this->pessoa->setNome($_POST['nome']);
              $this->pessoa->setRg($_POST['rg']);
              $this->pessoa->setDataExpdicao($_POST['dataexpedicao']);
              $this->pessoa->setOrgExpedidor($_POST['orgao_expedidor']);
              $this->pessoa->setUf($_POST['uf']);
          }

          if(self::insertUsuario($this->pessoa, $this->login, $this->endereco, $this->tipoCadastro, $this->fone))
            return true;

          return false;
        } else {
          self::getErroForm($validate);
          $this->erro_form = true;
          return false;
        }
  }

  function insertUsuario($pessoa, $login, $endereco, $tipoCadastro, $fone) {
      include_once ('app/dao/DaoInserirUsuario.class.php');
      $insertUsuario = new DaoUsuario($pessoa, $login, $endereco, $fone);

      if($tipoCadastro == "pessoajuridica" && $pessoa->getCnpj() != null) { // ---- VERIFICAR SE E PESSOA JURIDICAR ----- //
          try{
            if($insertUsuario->verificarEmailExist()) {
              if($insertUsuario->verificarTelefonelExist()) {
                if($insertUsuario->verificarCnpjExist()) {
                  if($insertUsuario->inserirEndereco()) {
                    if($pessoa->getTelemarketing()) {
                      if(!$insertUsuario->inserirTelemarketing()) {
                        $this->erro = $insertUsuario->getErro();
                        return false;
                      }
                    }
                    return true;
                  }
                }
              }
            }
            $this->erro = $insertUsuario->getErro();
          } catch (Exception $ex){
            $this->erro = "Exeção no Cadastro de Pessoa Fisica!";
            return false;
          }
      } else if($tipoCadastro == "pessoafisica" && $pessoa->getCpf() != null) {
            try {
              if($insertUsuario->verificarEmailExist()){
                if($insertUsuario->verificarTelefonelExist()){
                  if($insertUsuario->verificarCpfExist()){
                    if($insertUsuario->inserirEndereco()){
                        return true;
                    }
                  }
                }
              }
              $this->erro = $insertUsuario->getErro();
              return false;
            } catch (Exception $ex){
              $this->erro = "Exeção no Cadastro de Pessoa Fisica!";
              return false;
            }
      }
  }

  function remove($id) {
    include_once ('app/dao/DaoSelecionarUsuario.class.php');

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
    include_once ('app/dao/DaoSelecionarUsuario.class.php');

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
    include_once ('app/dao/DaoSelecionarUsuario.class.php');

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
    include_once ('app/dao/DaoSelecionarUsuario.class.php');

    if(!searchTelemarketing($conexao, $id)) {
      $msgRet = "Produto $id removido com sucesso!";
    }
      mysqli_close($conexao);
      header("Location: /?controller=produtos&action=lista");
      ProdutosController::lista();
    }

    function getErroForm($validate){
      $array = $validate->get_errors();
      foreach ($array as $key => $value) { }

      $this->erro = $key;
    }

    function erros() {
      return $this->erro;
    }
  }
