<?php

class PagesController {
    private $tipoCadastro;
    private $login;
    private $fone;
    private $endereco;
    private $pessoa;
    private $_msg;

    private $erro_login = 0;
    private $erro_reCaptcha = 0;
    private $id;
    private $type;
    private $update = null;
    private $qtd_telefone = 0;

    private static $PagesController;

    public static function getPagesController() {
        if (empty(self::$PagesController)) {
            self::$PagesController = new PagesController();
        }
        return self::$PagesController;
    }
    /*
    *FUNÇÃO PAGE FORMULARIO DE LOGIN
    */
    public function page_form_login() {
        require_once ('app/view/view-form-login.php');
    }
    /*
    *FUNÇÃO PAGE FORMULARIO DE PESSOA FISICA
    */
    public function page_form_pessoafisica() {
        require_once ('app/view/view-form-pf.php');
    }
    /*
    *FUNÇÃO PAGE FORMULARIO DE PESSOA JURIDICA
    */
    public function page_form_pessoajuridica() {
        require_once ('app/view/view-form-pj.php');
    }

    public function page_form_recuperar_pwd() {
        require_once ('app/view/view-form-page-recuperar-pwd.php');
    }
    /*
    *FUNÇÃO PAGE INICIAL
    */
    public function home() {
        $HOME = '<a class="nav-item is-active" href="pessoa-fisica"><span>Pessoa Física</span></a>';
        $PESSOA = '<a class="nav-item" href="pessoa-juridica"><span>Pessoa Jurídica</span></a>';
        $LOGIN = '<a class="nav-item" href="login"><span>ENTRAR</span></a>';

        require_once ('app/view/view-form-pj.php');
    }
    /*
    *FUNÇÃO PAGE SESSÃO DE PESSOA FISICA
    */
    public function userPessoaFisica() {
        $pessoaFisica = Selection::getInstanceSelection();
        $pessoa = $pessoaFisica->selectionUsuario($_SESSION['id']);
        $dados = $pessoaFisica->selectionPessoaFisica($_SESSION['id']);
        $telefone = $pessoaFisica->selectionTelefone($_SESSION['id']);

        require_once ('app/view/view-pf-pages.php');
    }
    /*
    *FUNÇÃO PAGE DA SESSÃO DE PESSOA JURIDICA
    */
    public function userPessoaJuridica() {
        $pessoaJuridica = Selection::getInstanceSelection();
        $pessoa = $pessoaJuridica->selectionUsuario($_SESSION['id']);
        $dados = $pessoaJuridica->selectionPessoaJuridica($_SESSION['id']);
        $telefone = $pessoaJuridica->selectionTelefone($_SESSION['id']);

        require_once ('app/view/view-pj-pages.php');
    }
    /*
    *FUNÇÃO PAGE DA SESSÃO DE LISTAGEM PARA TELEMARKETING
    */
    public function listagemTelemarketing() {
        $HOME = '';
        $pessoaJuridica = Selection::getInstanceSelection();
        $telemarketing = $pessoaJuridica->selectionPessoaJuridica($_SESSION['id']);

        $listar = Listar::getInstanceListar();
        $listagemPf = $listar->listarTelefonePf();
        $listagemPj = $listar->listarTelefonePj();

        require_once ('app/view/view-telemarketing.php');
    }
    /*
    *FUNÇÃO PAGE DO ADMINISTRADOR
    */
    public function userAdmin() {
        $listar = Listar::getInstanceListar();
        $usuario = $listar->listarTelemarketing();

        require_once ('app/view/view-admin/admin.php');
    }
    /*
    *FUNÇÃO PAGE DE DADOS PESSOA FISICA PARA O ADIMINISTRADOR
    */
    public function pessoaFisica() {
        $HOME = '<a class="nav-item" href="admin"><span>Liberação Telemarketing</span></a>';
        $PESSOA = '<a class="nav-item is-active" href="pessoa-f"><span>Pessoa Física</span></a><a class="nav-item" href="pessoa-j"><span>Pessoa Jurídica</span></a>';
        $LOGIN = '<a class="nav-item" href="logout"><span>SAIR</span></a>';

        $listar = Listar::getInstanceListar();
        $usuario = $listar->listarPessoa();

        require_once ('app/view/view-admin/pessoa-fisica.php');
    }
    /*
    *FUNÇÃO DE DADOS PESSOA JURIDICA PARA O ADIMINISTRADOR
    */
    public function pessoaJuridica() {
        $HOME = '<a class="nav-item" href="admin"><span>Liberação Telemarketing</span></a>';
        $PESSOA = '<a class="nav-item" href="pessoa-f"><span>Pessoa Física</span></a><a class="nav-item is-active" href="pessoa-j"><span>Pessoa Jurídica</span></a>';
        $LOGIN = '<a class="nav-item" href="logout"><span>SAIR</span></a>';

        $listar = Listar::getInstanceListar();
        $usuario = $listar->listarPessoaJuridica();
        //$usuario = $listar->listarTelemarketing();

        require_once ('app/view/view-admin/pessoa-juridica.php');
    }
    /*
    *
    */
    public function recuperarPwd() {
        if(!isset($_SESSION['erro-email-rec'])) {
            $link = Bcrypt::hash($_POST['email_rec'], null, "link");
            $_link = $link."&s=".session_id();

            $link_link = "http://naoperturbe.procon.pb.gov.br/redirect?RecuperarPwD=".$_link ;

            $email = new Mail($_POST['email_rec'], $link_link);
            //$email->to = $_POST['email_rec'];
            //$email->link = $link_link;

            $this->_msg = $email->prepareHeader();
            self::page_form_recuperar_pwd();
        }
    }

    public function linkRecuperarPwd() {
        $_read = array('404' => 'message is-danger','301' => 'message is-primary');

        if(isset($_GET['RecuperarPwD'])) {
            if(!empty($_GET['s']) && $_GET['s'] == session_id()) {
                require_once('app/view/redefinir-senha.php');
                die;
            }
            $class = $_read['301'];
            $_msg = "Tempo Esgotado para Redefinir Senha!";
        } else {
            $class = $_read['404'];
            $_msg = "Erro 404!";
        }
        require_once('app/view/view-erro-404.php');
        exit;
    }
    /*
    *FUNÇÃO PARA LOGIN DAS SESSOES DE USUARIO
    */
    public function logar() {

        $validate = new DataValidator();

        $this->erro =  $validate->set('email', $_POST['email'])->is_required()->is_email();
        $this->erro =  $validate->set('senha', $_POST['senha'])->is_required();

        if ($validate->validate()){
            $this->login  = Login::getInstanceLogin();
            $this->login->setEmail($_POST['email']);
            $this->login->setPassword($_POST['senha']);
            $d_logar = new DaoLogin($this->login);
            if(!$d_logar->loginDb()){
                $this->erro_login = 1;
                self::page_form_login();
                die;
            } else {
                header('Location: /');
            }
        } else {
            self::getErroForm($validate);
            self::$erro_form['email'] = "email";
            return false;
        }
    }
    /*
    *FUNÇÃO PARA LOGIN DAS SESSOES DE USUARIO COM reCAPTCHA
    */
    public function logar_reCAPTCHA() {

        $validate = new DataValidator();

        $this->erro =  $validate->set('email', $_POST['email'])->is_required()->is_email();
        $this->erro =  $validate->set('senha', $_POST['senha'])->is_required();

        if ($validate->validate()) {

            if(self::isReCaptcha($_POST['g-recaptcha-response'])) {
                $this->login  = Login::getInstanceLogin();
                $this->login->setEmail($_POST['email']);
                $this->login->setPassword($_POST['senha']);

                $d_logar = new DaoLogin($this->login);
                if(!$d_logar->loginDb()) {
                    $this->erro_login = 1;
                    self::page_form_login();
                    die;
                } else {
                    header('Location: /');
                }

            } else {
                $this->erro_login = 1;
                self::page_form_login();
                die;
            }
        } else {
            self::getErroForm($validate);
            self::$erro_form['email'] = "email";
            return false;
        }
    }
    /*
    *FUNÇÃO SAIR DA SESSÃO
    */
    function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['type_user']);
        session_destroy();
        header("Location: /login");
        die;
    }
    /*
    *FUNÇÃO CADASTRO PESSOA JURIDICA OU TELEMARKETING
    */
    function cadastroPessoaJuridica(){
        $this->tipoCadastro = "pessoajuridica";
        // print_r($_POST);
        if(isset($_SESSION['erro-cnpj']) || isset($_SESSION['erro-rua']) || isset($_SESSION['erro-bairro']) || isset($_SESSION['erro-cidade']) || isset($_SESSION['erro-telefone']) || isset($_SESSION['erro-telefone_2']) || isset($_SESSION['erro-email']) || isset($_SESSION['erro-repetir-senha']) ) {
            self::page_form_pessoajuridica();
        } else {
            if(!self::cadastrar($_POST['g-recaptcha-response'])) {
                self::page_form_pessoajuridica();
            } else {
                header("Location: /login");
                die;
            }
        }
        return true;
    }

    /*
    *FUNÇÃO CADASTRO PESSSOA FISICA
    */
    function cadastroPessoaFisica(){
        $validate = new DataValidator();

        $erro_validate = $validate->set('uf', $_POST['uf'])->is_required()->is_alpha()->max_length(3)->min_length(1)->validate();
        if(!$erro_validate) self::startSessionError('erro-uf'); else  self::unsetSessionError('erro-uf');
        $erro_validate = $validate->set('orgao_expedidor', $_POST['orgao_expedidor'])->is_required()->is_alpha()->validate();
        if(!$erro_validate) self::startSessionError('erro-org'); else  self::unsetSessionError('erro-org');
        $erro_validate = $validate->set('dataexpedicao', $_POST['dataexpedicao'])->is_required()->is_date()->validate();
        if(!$erro_validate) self::startSessionError('erro-data'); else  self::unsetSessionError('erro-data');

        $this->tipoCadastro = "pessoafisica";

        if(isset($_SESSION['erro-uf']) || isset($_SESSION['erro-org']) || isset($_SESSION['erro-data']) || isset($_SESSION['erro-rg']) || isset($_SESSION['erro-cpf']) || isset($_SESSION['erro-rua']) ||
        isset($_SESSION['erro-bairro']) || isset($_SESSION['erro-cidade']) || isset($_SESSION['erro-telefone']) || isset($_SESSION['erro-telefone_2']) || isset($_SESSION['erro-email']) || isset($_SESSION['erro-repetir-senha'])){
            self::page_form_pessoafisica();
        } else {
            if(!self::cadastrar($_POST['g-recaptcha-response'])) {
                self::page_form_pessoaFisica();
            } else {
                header("Location: /login");
                die;
            }
        }
    }
    /*
    *FUNÇÃO CADASTRO DE TODOS USUARIO
    */
    function cadastrar($recaptcha_response) {

        $this->erro_reCaptcha = 0;

        $validate = new DataValidator();

        $erro_validate = $validate->set('cidade', $_POST['cidade'])->is_required()->validate();
        if(!$erro_validate) self::startSessionError('erro-cidade'); else  self::unsetSessionError('erro-cidade');
        $erro_validate = $validate->set('rua', $_POST['rua'])->is_required()->validate();
        if(!$erro_validate) self::startSessionError('erro-rua'); else  self::unsetSessionError('erro-rua');
        $erro_validate = $validate->set('bairro', $_POST['bairro'])->is_required()->validate();

        if(!$erro_validate) self::startSessionError('erro-bairro'); else  self::unsetSessionError('erro-bairro');
        $erro_validate = $validate->set('senha', $_POST['senha'])->is_required()->validate();
        if(!$erro_validate) self::startSessionError('erro-senha'); else  self::unsetSessionError('erro-senha');
        $erro_validate = $validate->set('repetir_senha', $_POST['repetir_senha'])->is_required()->is_equals($_POST['senha'], true)->validate();
        if(!$erro_validate) self::startSessionError('erro-repetir-senha'); else  self::unsetSessionError('erro-repetir-senha');
        $erro_validate = $validate->set('type', $_POST['type'])->is_required()->validate();
        $erro_validate = $validate->set('nome', $_POST['nome'])->is_required()->validate();
        if(!$erro_validate) self::startSessionError('erro-nome'); else  self::unsetSessionError('erro-nome');

        if(!isset($_SESSION['erro-termo']) || !isset($_SESSION['erro-cidade']) || !isset($_SESSION['erro-rua']) || !isset($_SESSION['erro-bairro']) || !isset($_SESSION['erro-repetir-senha']) || !isset($_SESSION['erro-nome'])) {

            if (self::isReCaptcha($recaptcha_response)) {

                $this->fone = Telefone::getInstanceTelefone();

                if(!empty($_POST['telefone'])) {
                  $this->fone->setTelefone($_POST['telefone']);
                  $this->qtd_telefone = $this->qtd_telefone + 1;
                }
                if(!empty($_POST['telefone_2'])) {
                  $this->fone->setTelefone($_POST['telefone_2']);
                  $this->qtd_telefone = $this->qtd_telefone + 1;
                }

                $hash = Bcrypt::hash($_POST['senha']);

                $this->login = Login::getInstanceLogin();
                $this->login->setPassword($hash);

                $this->login->setEmail($_POST['email']);
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

                    if(isset($_POST['telemarketing'])){
                        $this->login->setType('tlm');
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
                if(self::insertUsuario($this->pessoa, $this->login, $this->endereco, $this->tipoCadastro, $this->fone, $this->qtd_telefone))
                {return true;} else {return false;}

            } else {
                $this->erro_reCaptcha = 1;
                self::getErroForm($validate);
                return false;
            }

        } else {
            self::getErroForm($validate);
            return false;
        }
    }

    /*
    *FUNÇÃO INSERIR DADOS CADASTRO
    */
    function insertUsuario($pessoa, $login, $endereco, $tipoCadastro, $fone, $qtd_t) {

        $insertUsuario = new DaoUsuario($pessoa, $login, $endereco, $fone, $qtd_t);


        if($tipoCadastro == "pessoajuridica" && $pessoa->getCnpj() != null) {
            if($insertUsuario->insertUsuario($tipoCadastro)) {
                return true;
            } $insertUsuario->getError();
            return false;
        } else if($tipoCadastro == "pessoafisica" && $pessoa->getCpf() != null) {
            if($insertUsuario->insertUsuario($tipoCadastro)){
                return true;
            } $insertUsuario->getError();
            return false;
        }
    }
    /*
    * FUÇÃO DE LISTAGEM JSON PARA TELEMARKETING
    */
    function listarRelatorio() {
        if(isset($_POST['json']) && !empty($_POST['json'])){
            self::listarJson();
            die;
        } else if(isset($_POST['xml']) && !empty($_POST['xml'])){
            self::listarXml();
            die;
        } else if(isset($_POST['csv']) && !empty($_POST['csv'])){
            self::listarCsv();
            die;
        } else if(isset($_POST['pdf']) && !empty($_POST['pdf'])){
            self::listarPdf();
            die;
        }
    }

    function listarCsv() {
      $listar = Listar::getInstanceListar();
      $listastelefone = $listar->listarRelatTelefone();
      //$listaspj = $listar->listarPessoaJuridicaRelat();
      header('Content-type: text/csv');
      header('Content-Disposition: attachment; filename="nao-perturbe.csv"');
      header('Progma: no-cache');
      header('Expires: 0');

      $outPut = fopen("php://outPut", "w");

      foreach ($listastelefone as $key) {
        fputcsv($outPut, $key);
      }

      fclose($outPut);
    }

    function listarJson() {
        header("Content-type: application/json");
        header('Content-Disposition: attachment; filename="nao-perturbe.json"');

        $listar = Listar::getInstanceListar();
        $listastelefone = $listar->listarRelatTelefone();
        //$listaspj = $listar->listarPessoaJuridicaRelat();

        $JSON = json_encode($listastelefone);
        echo $JSON;
    }

    function listarPdf(){
        $listar = Listar::getInstanceListar();
        $listastelefone = $listar->listarRelatTelefone();
        //$listaspj = $listar->listarPessoaJuridicaRelat();
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="nao-perturbe.pdf"');

        header("Content-type: unicode/utf-8");
        $pdf= new FPDF("P","pt","A4");
        $pdf->AddPage();
        $pdf->SetFont('arial','B',12);
        $pdf->Cell(0,5,"Relatorio nao pertube",0,1,'L');
        $pdf->Ln(20);

        $pdf->SetFont('arial','I',9);
        $pdf->Cell(50, 8, "", 1, 0, 'C');
        $pdf->Cell(150, 8, "NUMERO TELEFONE", 1, 0, 'L');

        $pdf->Cell(150, 8, "DATA CADASTRO", 1, 1, 'L');

        foreach ($listastelefone as $key => $value) {
            $pdf->Cell(50, 8, "", 1, 0, 'C');
            $pdf->Cell(150,8,$value['telefone_numero'],1,0,'L');
            $pdf->Cell(150,8,$value['data_cadastro'],1,1,'L');
        }

        /*foreach ($listaspj as $key => $value) {
            $pdf->Cell(50, 8, "", 1, 0, 'C');
            $pdf->Cell(150,8,$value['telefone_numero'],1,0,'L');
            $pdf->Cell(150,8,$value['data_cadastro'],1,1,'L');
        }*/
        $pdf->Ln(8);
        if($_GET['pdf-g'])
        $pdf->Output();
        else
        $pdf->Output("nao-pertube.pdf","D");
    }
    /*
    * FUÇÃO DE LISTAGEM JSON PARA TELEMARKETING
    */
    function listarXml() {
        header("Content-type: application/xml");
        header('Content-Disposition: attachment; filename="nao-perturbe.xml"');

        $listar = Listar::getInstanceListar();
        $listastelefone = $listar->listarRelatTelefone();
        //$listaspj = $listar->listarPessoaJuridicaRelat();

        $xmlstr = "<?xml version='1.0' encoding='utf-8' ?>"."<consumidor>\n</consumidor>";
        $xml = new SimpleXMLElement($xmlstr);

        $line = $xml->addChild('usuario');
        foreach ($listastelefone as $key) {
            $line->addChild("numero-telefone", $key['telefone_numero']);
            $line->addChild("data-cadastro", $key['data_cadastro']);
        }
        /*
        $line_j = $xml->addChild('usuario');
        foreach ($listaspj as $key) {
            $line_j->addChild("numero-telefone", $key['telefone_numero']);
            $line_j->addChild("data-cadastro", $key['data_cadastro']);
        }*/
        echo $xml->asXML();
    }
    /*
    *FUNÇÃO PARA HABILITAR E DESABILITAR TELEMARKETING
    */
    function update(){
        $sta = ($_POST['status'] == 1)? 0: 1;
        $updateTelemarketing = UpdateUser::getInstanceUpdateUser();
        $updateTelemarketing->update($sta,$_POST['id']);
    }

    /*
    * FUNCTION ATUALIZAR TELEFONE
    */
    function updateTelefone() {
        $validate = new DataValidator();
        $validate->set('telefone', $_POST['telefone'])->is_required()->is_phone();

        if($validate->validate()){
            $update = UpdateUser::getInstanceUpdateUser();
            $update->updTelefone($_POST['telefone'], $_POST['usuario'], $_POST['id_telefone']);
        } else {
            self::getErroForm($validate);
            self::userPessoaFisica();
        }
    }

    /*
    *FUNÇÃO PARA EXCLUIR TELEFONE
    */
    function deleteTelefone() {

      $validate = new DataValidator();
      $validate->set('telefone', $_POST['telefone']);


      if($validate->validate()){
          $update = UpdateUser::getInstanceUpdateUser();
          if($update->deleteTelefone($_POST['usuario'], $_POST['id_telefone'])){
              echo '<span class="help is-primary ocultar">Telefone removido com sucesso!</span>';
          } else {
              echo '<span class="help is-primary ocultar">Erro ao remover telefone</span>';
          }
      } else {
          self::getErroForm($validate);
          self::userPessoaFisica();
      }
    }

    /*
    * FUNCTION ATUALIZAR DADOS PESSOA FISICA
    */
    function updateDocumentoPf() {
        $validate = new DataValidator();
        $validate->set('uf', $_POST['uf'])->is_required()->is_alpha()->max_length(3)->min_length(1);
        $validate->set('orgao_expedidor', $_POST['orgao_expedidor'])->is_required()->is_alpha();
        $validate->set('dataexpedicao', $_POST['dataexpedicao'])->is_required()->is_date();
        $validate->set('rg', $_POST['rg'])->is_required()->is_rg();
        $validate->set('cpf', $_POST['cpf'])->is_required()->is_cpf();
        $validate->set('nome', $_POST['nome'])->is_required();

        if($validate->validate()){
            $update = UpdateUser::getInstanceUpdateUser();
            $update->upDocumento($_POST['nome'], $_POST['usuario'], $_POST['cpf'], $_POST['rg'], $_POST['dataexpedicao'], $_POST['orgao_expedidor'], $_POST['uf']);
        } else {
            self::getErroForm($validate);
            self::userPessoaFisica();
        }
    }
    /*
    * FUNCTION ATUALIZAR DADOS PESSOA FISICA
    */
    function updateDocumentoPj() {
        $validate = new DataValidator();
        $validate->set('cnpj', $_POST['cnpj'])->is_required()->is_cnpj();
        $validate->set('nome', $_POST['nome'])->is_required();

        if($validate->validate()){
            $update = UpdateUser::getInstanceUpdateUser();
            $update->upDocumentoPj($_POST['nome'], $_POST['usuario'], $_POST['cnpj']);
        } else {
            self::getErroForm($validate);
            self::userPessoaJuridica();
        }
    }
    /*
    * FUNCTION ATUALIZAR ENDEREÇO PESSOA FISICA
    */
    function updateAddress() {

        $validate = new DataValidator();
        $validate->set('cep', $_POST['cep'])->is_required()->is_zipCode();
        $validate->set('cidade', $_POST['cidade'])->is_required();
        $validate->set('rua', $_POST['rua'])->is_required();
        $validate->set('bairro', $_POST['bairro'])->is_required();

        if($validate->validate()){
            $update = UpdateUser::getInstanceUpdateUser();
            $update->upAddress($_POST['cep'], $_POST['cidade'], $_POST['rua'], $_POST['bairro'], $_POST['numero'], $_POST['complemento'], $_POST['id_endereco']);
        } else {
            self::getErroForm($validate);
            self::userPessoaFisica();
        }
    }

    /*
    * FUNCTION ATUALIZAR DADOS PESSOA FISICA
    */
    function updatePassword() {
        $validate = new DataValidator();

        $validate->set('senha', $_POST['senha'])->is_required();
        $validate->set('repetir_senha', $_POST['repetir_senha'])->is_required()->is_equals($_POST['senha'], true);
        $validate->set('email', $_POST['email'])->is_required()->is_email();

        if($validate->validate()){
            $update = UpdateUser::getInstanceUpdateUser();
            $hash = Bcrypt::hash($_POST['senha']);

            $update->upPassword($hash, $_POST['email'], $_POST['id']);
        } else {
            self::getErroForm($validate);
            self::userPessoaFisica();
        }
    }
    /*
    * FUNCTION ATUALIZAR DADOS PESSOA FISICA
    */
    function redefinirPassword() {
        $validate = new DataValidator();

        $validate->set('senha', $_POST['senha'])->is_required();
        $validate->set('repetir_senha', $_POST['repetir_senha'])->is_required()->is_equals($_POST['senha'], true);
        $validate->set('email', $_POST['email'])->is_required()->is_email();

        if($validate->validate()){
            $update = UpdateUser::getInstanceUpdateUser();
            $hash = Bcrypt::hash($_POST['senha']);

            if($update->redefinirPassword($hash, $_POST['email']))header("Location: /login");

        } else {
            self::getErroForm($validate);
            self::userPessoaFisica();
        }
    }
    /*
    *FUNÇÃO PARA ADICIONAR TELEFONE
    */
    function addTelefone() {

        $validate = new DataValidator();
        $validate->set('telefone', $_POST['novo_tel'])->is_required()->is_phone();

        if($validate->validate()){
            $update = UpdateUser::getInstanceUpdateUser();
            $up_date = $update->addTelefone($_POST['novo_tel'], $_POST['usuario']);
            if($up_date) {
                self::redirection();
            } else {
                self::redirection();
            }
        } else {
            self::getErroForm($validate);
            self::userPessoaFisica();
        }
    }

    function gerarTokenAcesso() {
        $validate   = new DataValidator();

        $validate->set('token', $_POST['token'])->is_required();

        if(!$validate->validate()){
            self::startSessionError('token');
            self::getErroForm($validate);
        } else {
            $_token      =   md5($_POST['token']);
            $identicador =   md5(rand(1, $_POST['id']));

            $token      = $_token."&s=".session_id();
            $link_link  = "http://localhost:3000/relatorio?doc=JSON&?id=".$identicador."&?token=".$token;

            $updateTelemarketing = UpdateUser::getInstanceUpdateUser();
            $updateTelemarketing->token($token, $_POST['id'], $identicador);
            //$data = array('token' => $_token, 'id' => $id);
            $data = ['token' => $token, 'id' => $identicador];
            print_r(json_encode($data, true));
        }
    }

    function tokenValidate(){
        $doc = $_POST['doc'];
        $pessoaJuridica = Selection::getInstanceSelection();
        $dados = $pessoaJuridica->selectionPessoaTelemarketing($_POST['id'], $_POST['token']);

        if($dados) {
            if(strtolower($doc) == "json"){
                self::listarJson();
            } else if(strtolower($doc) == "xml") {
                self::listarXml();
            } else if(strtolower($doc) == "csv") {
                self::listarCsv();
            } else {
                header("Content-type: application/json");
                echo json_encode(array('erro' => 'type doc invalid link','validate-link-json' => 'doc=JSON','validate-link-xml' => 'doc=XML','validate-link-csv' => 'doc=CSV'));
                die;
            }
        } else {
            header("Content-type: application/json");
            echo json_encode(array('erro' => 'credenciais incorreta, acesso seu perfil no portal'));
        }
    }

    function erroMethod(){
        header("Content-type: application/json");
        echo json_encode(array('erro' => 'use method POST'));
    }
    /*
    *FUNÇÃO PARA VALIDAR E SETAR OS ERROS OCORRIDO NO FORMULARIO
    */
    function getErroForm($validate){
        //self::$erro_form = true;
        $array = $validate->get_errors();
        foreach ($array as $key => $value) { }

        echo $key.'<br>';
    }

    function erroLogin() {
        return $this->erro_login;
    }

    function erroreCaptcha() {
        return $this->erro_reCaptcha;
    }

    function getErroFormulario($campo) {
        return '<span class="help is-danger ">Error no Campo '.$campo.'</span>';
    }

    function setErroFormulario() {
        return '<span class="help is-danger "></span>';
    }
    /*
    *FUNÇÃO VERIFICAR O reCAPTCHA
    */
    function isReCaptcha($Post_G_Captcha) {
      return true;
        // lib recaptcha
        require_once "recaptchalib.php";
        if (isset($Post_G_Captcha) && !empty($Post_G_Captcha)) {
            // resposta vazia
            $response = null;
            //site secret key
            $secret = '6LeQXBgUAAAAAD-4kBJevxWt1fQj6DTKDxCimuF_';
            $reCaptcha = new ReCaptcha($secret);
            $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $Post_G_Captcha);

            if($response != null && $response->success) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    /*
    *FUNÇÃO PARA LER E SETAR AS MENSAGENS DE ERROS NOS FORMULARIOS
    */
    function setMsgError($msg) {
        return '<span class="help is-danger ">'.$msg.'</span>';
    }

    function unsetMsgError() {
        return '<span class="help is-danger "></span>';
    }
    /*
    *FUNÇÃO PARA VALIDAR CAMPOS DE FORMULARIO PESSOA FISICA FORMULARIO
    */
    function ValidateExisting(){
        $validate = new DataValidator();
        $userData = new ValidateUserExisting();

        if(!empty($_POST['cpf'])){
            $validate->set('cpf', $_POST['cpf'])->is_required()->is_cpf();
            if(!$validate->validate()){
                self::startSessionError('erro-cpf');
                self::getErroForm($validate);
            } else {
                if(!$userData->validateCpfExist($_POST['cpf'])) {
                    self::startSessionError('erro-cpf');
                    self::getErroFormulario($userData->getError());
                } else {
                    self::unsetSessionError('erro-cpf');
                }
            }
        }  if (!empty($_POST['email_rec'])){
            $validate->set('email_rec', $_POST['email_rec'])->is_required()->is_email();
            if(!$validate->validate()){
                self::startSessionError('erro-email-rec');
                self::getErroForm($validate);
            } else {
                if($userData->validateEmailExist($_POST['email_rec'])) {
                    self::unsetSessionError('erro-email-rec') ;
                } else {
                    self::startSessionError('erro-email-rec');
                    $userData->getError();
                }
            }
        } if (!empty($_POST['email'])){
            $validate->set('email', $_POST['email'])->is_required()->is_email();
            if(!$validate->validate()){
                self::startSessionError('erro-email');
                self::getErroForm($validate);
            } else {
                if($userData->validateEmailExist($_POST['email'])) {
                    self::startSessionError('erro-email');
                    $userData->getError();
                } else {
                    self::unsetSessionError('erro-email');
                }
            }
        } if (!empty($_POST['rg'])){
            $validate->set('rg', $_POST['rg'])->is_required()->is_rg();
            if(!$validate->validate()){
                self::startSessionError('erro-rg');
                self::getErroForm($validate);
            } else {
                if(!$userData->validateRgExist($_POST['rg'])) {
                    $userData->getError();
                    self::startSessionError('erro-rg');
                } else {
                    self::unsetSessionError('erro-rg');
                }
            }
        } if (!empty($_POST['dataexpedicao'])){
            $validate->set('dataexpedicao', $_POST['dataexpedicao'])->is_required()->is_date();
            if(!$validate->validate()) {
                self::startSessionError('erro-dataexpedicao');
                self::getErroForm($validate);
            } else {
                self::unsetSessionError('erro-dataexpedicao');
            }
        } if (!empty($_POST['cnpj'])){
            $validate->set('cnpj', $_POST['cnpj'])->is_required()->is_cnpj();
            if(!$validate->validate()) {
                self::startSessionError('erro-cnpj');
                self::getErroForm($validate);
            }  else {
                if(!$userData->validateCnpjExist($_POST['cnpj'])) {
                    self::startSessionError('erro-cnpj');
                    $userData->getError();
                } else {
                    self::unsetSessionError('erro-cnpj');
                }
            }
        } if (!empty($_POST['telefone'])){

            $validate->set('telefone', $_POST['telefone'])->is_required()->is_phone();


            if(!$validate->validate() && !empty($_POST['telefone'])){
                self::startSessionError('erro-telefone');
                self::getErroForm($validate);
            } else {
                if(!$userData->validateTelefoneExist($_POST['telefone'])) {
                    self::startSessionError('erro-telefone');
                    $userData->getError();
                } else {
                    self::unsetSessionError('erro-telefone');
                }
            }
        }
        if (!empty($_SESSION['telefone_2']) ){
            $validate->set('telefone_2', $_POST['telefone_2'])->is_required()->is_phone();

            if(!$validate->validate() && !empty($_POST['telefone_2'])){
                self::startSessionError('erro-telefone_2');
                self::getErroForm($validate);
            } else {
                if(!$userData->validateTelefoneExist($_POST['telefone_2'])) {
                    self::startSessionError('erro-telefone_2');
                    $userData->getError();
                } else {
                    self::unsetSessionError('erro-telefone_2');
                }
            } if (!empty($_POST['cep'])){
                $validate->set('cep', $_POST['cep'])->is_required()->is_zipCode();
                if(!$validate->validate()) {
                    self::startSessionError('erro-cep');
                    self::getErroForm($validate);
                } else {
                    self::unsetSessionError('erro-cep');
                }
            }
        }
    }

    function startSessionError($campo){
        $_SESSION[$campo] = true;
    }

    function unsetSessionError($campo) {
        unset($_SESSION[$campo]);
    }

    function redirection() {
        if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'pf') {
            if(isset($_SESSION['token-user-session']) && isset($_SESSION['token-user-agent']) && isset($_SESSION['token-user-ip'])
            && Bcrypt::check('user'.$_SERVER['HTTP_USER_AGENT'], $_SESSION['token-user-agent']) && Bcrypt::check('user'.$_SERVER['REMOTE_ADDR'], $_SESSION['token-user-ip'])) {
                self::userPessoaFisica();
                die;
            }
        }
        if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'pj' || $_SESSION['type_user'] == 'tlm' ) {
            if(isset($_SESSION['token-user-session']) && isset($_SESSION['token-user-agent']) && isset($_SESSION['token-user-ip'])
            && Bcrypt::check('user'.$_SERVER['HTTP_USER_AGENT'], $_SESSION['token-user-agent']) && Bcrypt::check('user'.$_SERVER['REMOTE_ADDR'], $_SESSION['token-user-ip'])) {
                self::userPessoaJuridica();
                die;
            }
        }
        if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'tlm') {
            if(isset($_SESSION['token-user-session']) && isset($_SESSION['token-user-agent']) && isset($_SESSION['token-user-ip'])
            && Bcrypt::check('user'.$_SERVER['HTTP_USER_AGENT'], $_SESSION['token-user-agent']) && Bcrypt::check('user'.$_SERVER['REMOTE_ADDR'], $_SESSION['token-user-ip'])) {
                self::listagemTelemarketing();
                die;
            }
        }
        if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'admin') {
            if(isset($_SESSION['token-user-session']) && isset($_SESSION['token-user-agent']) && isset($_SESSION['token-user-ip'])
            && Bcrypt::check('user'.$_SERVER['HTTP_USER_AGENT'], $_SESSION['token-user-agent']) && Bcrypt::check('user'.$_SERVER['REMOTE_ADDR'], $_SESSION['token-user-ip'])) {
                self::userAdmin();
                die;
            }
        } else {
            self::logout();
            die;
        }
    }
}
