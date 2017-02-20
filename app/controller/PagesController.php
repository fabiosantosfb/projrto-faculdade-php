<?php

class PagesController {
    private $tipoCadastro;
    private $login;
    private $fone;
    private $endereco;
    private $pessoa;

    private $erro = 0;
    private static $erro_form;
    private $id;
    private $type;
    private $update = null;

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
        $HOME = '
        <a class="nav-item" href="pessoa-fisica">
        <span>Pessoa Física</span>
        </a>';

        $PESSOA = '
        <a class="nav-item" href="pessoa-juridica">
        <span>Pessoa Jurídica</span>
        </a>';

        $LOGIN = '
        <a class="nav-item is-active" href="login">
        <span>ENTRAR</span>
        </a>';

        require_once ('app/view/view-form-login.php');
    }
    /*
    *FUNÇÃO PAGE FORMULARIO DE PESSOA FISICA
    */
    public function page_form_pessoafisica() {
        $HOME = '
        <a class="nav-item is-active" href="pessoa-fisica">
        <span>Pessoa Física</span>
        </a>';
        $PESSOA = '
        <a class="nav-item " href="pessoa-juridica">
        <span>Pessoa Jurídica</span>
        </a>';
        $LOGIN = '
        <a class="nav-item" href="login">
        <span>ENTRAR</span>
        </a>';

        require_once ('app/view/view-form-pf.php');
    }
    /*
    *FUNÇÃO PAGE FORMULARIO DE PESSOA JURIDICA
    */
    public function page_form_pessoajuridica() {
        $HOME = '
        <a class="nav-item" href="pessoa-fisica">
        <span>Pessoa Física</span>
        </a>';

        $PESSOA = '
        <a class="nav-item is-active" href="pessoa-juridica">
        <span>Pessoa Jurídica</span>
        </a>';

        $LOGIN = '
        <a class="nav-item" href="login">
        <span>ENTRAR</span>
        </a>';

        require_once ('app/view/view-form-pj.php');
    }
    /*
    *FUNÇÃO PAGE INICIAL
    */
    public function home() {
        $HOME = '
        <a class="nav-item is-active" href="pessoa-fisica">
        <span>Pessoa Física</span>
        </a>';

        $PESSOA = '
        <a class="nav-item" href="pessoa-juridica">
        <span>Pessoa Jurídica</span>
        </a>';

        $LOGIN = '
        <a class="nav-item" href="login">
        <span>ENTRAR</span>
        </a>';

        require_once ('app/view/view-form-pj.php');
    }
    /*
    *FUNÇÃO PAGE SESSÃO DE PESSOA FISICA
    */
    public function userPessoaFisica() {
        $pessoaFisica = Selection::getInstanceSelection();
        $pessoa = $pessoaFisica->selectionPessoaFisica($_SESSION['id']);
        $endereco = $pessoaFisica->seachAddress($_SESSION['id']);
        $usuario = $pessoaFisica->dadosUser($_SESSION['id']);
        $telefone = $pessoaFisica->seachTelefone($_SESSION['id']);

        require_once ('app/view/view-pf-pages.php');
    }
    /*
    *FUNÇÃO PAGE DA SESSÃO DE PESSOA JURIDICA
    */
    public function userPessoaJuridica() {
        $pessoaJuridica = Selection::getInstanceSelection();
        $pessoa = $pessoaJuridica->selectionPessoaJuridica($_SESSION['id']);
        $endereco = $pessoaJuridica->seachAddress($_SESSION['id']);
        $usuario = $pessoaJuridica->dadosUser($_SESSION['id']);
        $telefone = $pessoaJuridica->seachTelefone($_SESSION['id']);

        $telemarketing = $pessoaJuridica->selectionTelemarketing($_SESSION['id']);

        require_once ('app/view/view-pj-pages.php');
    }
    /*
    *FUNÇÃO PAGE DA SESSÃO DE LISTAGEM PARA TELEMARKETING
    */
    public function listagemTelemarketing() {
        $pessoaJuridica = Selection::getInstanceSelection();
        $telemarketing = $pessoaJuridica->selectionTelemarketing($_SESSION['id']);
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
        $listastl = $listar->listarTelemarketing();

        require_once ('app/view/view-admin/admin.php');
    }
    /*
    *FUNÇÃO PAGE DE DADOS PESSOA FISICA PARA O ADIMINISTRADOR
    */
    public function pessoaFisica() {
        $HOME = '
        <a class="nav-item" href="admin">
        <span>Liberação Telemarketing</span>
        </a>';

        $PESSOA = '
        <a class="nav-item is-active" href="pessoa-f">
        <span>Pessoa Física</span>
        </a>
        <a class="nav-item" href="pessoa-j">
        <span>Pessoa Jurídica</span>
        </a>
        ';

        $LOGIN = '
        <a class="nav-item" href="logout">
        <span>SAIR</span>
        </a>';

        $listar = Listar::getInstanceListar();
        $listaspf = $listar->listarPessoa();

        include_once ('app/view/partlals/header.php');
        require_once ('app/view/view-admin/pessoa-fisica.php');
    }
    /*
    *FUNÇÃO DE DADOS PESSOA JURIDICA PARA O ADIMINISTRADOR
    */
    public function pessoaJuridica() {
        $HOME = '
        <a class="nav-item" href="admin">
        <span>Liberação Telemarketing</span>
        </a>';

        $PESSOA = '
        <a class="nav-item" href="pessoa-f">
        <span>Pessoa Física</span>
        </a>
        <a class="nav-item is-active" href="pessoa-j">
        <span>Pessoa Jurídica</span>
        </a>
        ';

        $LOGIN = '
        <a class="nav-item" href="logout">
        <span>SAIR</span>
        </a>';

        $listar = Listar::getInstanceListar();
        $listaspj = $listar->listarPessoaJuridica();

        include_once ('app/view/partlals/header.php');
        require_once ('app/view/view-admin/pessoa-juridica.php');
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
                $this->erro = 1;
                self::page_form_login();
                die;
            } else {
                self::redirection();
            }
        } else {
            self::getErroForm($validate);
            self::$erro_form = true;
            return false;
        }
    }
    /*
    *FUNÇÃO SAIR DA SESSÃO
    */
    function logout() {
        unset ($_SESSION['id']);
        unset ($_SESSION['type_user']);
        session_destroy();
        header("Location: /login");
        die;
    }
    /*
    *FUNÇÃO CADASTRO PESSOA JURIDICA OU TELEMARKETING
    */
    function cadastroPessoaJuridica(){
        $validate = new DataValidator();
        $validate->set('cnpj', $_POST['cnpj'])->is_required()->is_cnpj();

        $this->tipoCadastro = "pessoajuridica";

        if(!$validate->validate()){
            self::getErroForm($validate);
            self::$erro_form = true;
            self::page_form_pessoajuridica();
        } else {
            if(!self::cadastrar()) {
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

        $validate->set('uf', $_POST['uf'])->is_required()->is_alpha()->max_length(3)->min_length(1);
        $validate->set('orgao_expedidor', $_POST['orgao_expedidor'])->is_required()->is_alpha();
        $validate->set('dataexpedicao', $_POST['dataexpedicao'])->is_required()->is_date();
        $validate->set('rg', $_POST['rg'])->is_required()->is_rg();
        $validate->set('cpf', $_POST['cpf'])->is_required()->is_cpf();

        $this->tipoCadastro = "pessoafisica";

        if(!$validate->validate()){
            self::getErroForm($validate);
            self::$erro_form = true;
            self::page_form_pessoafisica();
        } else {
            if(!self::cadastrar()) {
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
    function cadastrar() {
        $validate = new DataValidator();

        $validate->set('cep', $_POST['cep'])->is_required()->is_zipCode();
        $validate->set('cidade', $_POST['cidade'])->is_required();
        $validate->set('rua', $_POST['rua'])->is_required();
        $validate->set('bairro', $_POST['bairro'])->is_required();

        $validate->set('senha', $_POST['senha'])->is_required();
        $validate->set('repetir_senha', $_POST['repetir_senha'])->is_required()->is_equals($_POST['senha'], true);
        $validate->set('type', $_POST['type'])->is_required();
        $validate->set('nome', $_POST['nome'])->is_required();
        $validate->set('email', $_POST['email'])->is_required()->is_email();
        $validate->set('telefone', $_POST['telefone'])->is_required()->is_phone();

        if($validate->validate()) {

            $this->fone = Telefone::getInstanceTelefone();
            $this->fone->setTelefone($_POST['telefone']);

            $hash = Bcrypt::hash($_POST['senha']);

            $this->login = Login::getInstanceLogin();
            $this->login->setEmail($_POST['email']);
            $this->login->setPassword($hash);
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
            self::$erro_form = true;

            return false;
        }
    }

    /*
    *FUNÇÃO INSERIR DADOS CADASTRO
    */
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
                self::$erro = $insertUsuario->getErro();
            } catch (Exception $ex){
                $this->erro = "Exceção no Cadastro de Pessoa Fisica!";
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

    /*
    * FUÇÃO DE LISTAGEM JSON PARA TELEMARKETING
    */
    function listarRelatorio() {
        if(isset($_POST['json']) && !empty($_POST['json'])){
            header("Content-type: application/json");
            header('Content-Disposition: attachment; filename="nao-perturbe.json"');
            self::listarJson();
            die;
        } else if(isset($_POST['xml']) && !empty($_POST['xml'])){
            header("Content-type: application/xml");
            header('Content-Disposition: attachment; filename="nao-perturbe.xml"');
            self::listarXml();
            die;
        } else if(isset($_POST['pdf']) && !empty($_POST['pdf'])){
            header('Content-type: application/pdf');
            header('Content-Disposition: attachment; filename="nao-perturbe.pdf"');
            self::listarPdf();
            die;
        } else if(isset($_POST['pdf']) && !empty($_POST['pdf']) || isset($_GET['pdf-g']) && !empty($_GET['pdf-g'])){
            header('Content-type: application/pdf');
            header('Content-Disposition: attachment; filename="nao-perturbe.pdf"');
            self::listarPdf();
            die;
        }
    }

    function listarJson() {
        $listar = Listar::getInstanceListar();
        $listaspf = $listar->listarPessoaRelat();
        $listaspj = $listar->listarPessoaJuridicaRelat();

        $JSON = json_encode($listaspj+$listaspf);
        echo $JSON;
    }

    function listarPdf(){
        $listar = Listar::getInstanceListar();
        $listaspf = $listar->listarPessoaRelat();
        $listaspj = $listar->listarPessoaJuridicaRelat();

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

        foreach ($listaspf as $key => $value) {
            $pdf->Cell(50, 8, "", 1, 0, 'C');
            $pdf->Cell(150,8,$value['telefone_numero'],1,0,'L');
            $pdf->Cell(150,8,$value['data_cadastro'],1,1,'L');
        }

        foreach ($listaspj as $key => $value) {
            $pdf->Cell(50, 8, "", 1, 0, 'C');
            $pdf->Cell(150,8,$value['telefone_numero'],1,0,'L');
            $pdf->Cell(150,8,$value['data_cadastro'],1,1,'L');
        }
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
        $listar = Listar::getInstanceListar();
        $listaspf = $listar->listarPessoaRelat();
        $listaspj = $listar->listarPessoaJuridicaRelat();

        $xmlstr = "<?xml version='1.0' encoding='utf-8' ?>"."<consumidor>\n</consumidor>";
        $xml = new SimpleXMLElement($xmlstr);

        $line = $xml->addChild('usuario');
        foreach ($listaspf as $key) {
            $line->addChild("numero-telefone", $key['telefone_numero']);
            $line->addChild("data-cadastro", $key['data_cadastro']);
        }
        $line_j = $xml->addChild('usuario');
        foreach ($listaspj as $key) {
            $line_j->addChild("numero-telefone", $key['telefone_numero']);
            $line_j->addChild("data-cadastro", $key['data_cadastro']);
        }
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
            $update->upPassword($_POST['senha'], $_POST['email'], $_POST['id']);
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
        $validate->set('telefone', $_POST['novo_tel'])->is_required();

        if($validate->validate()){
            $update = UpdateUser::getInstanceUpdateUser();
            $up_date = $update->addTelefone($_POST['novo_tel'], $_POST['usuario']);
            if($up_date) {
                self::redirection();
            } else {
                self::redirection();
                echo '<script>alert()</script>';
            }
        } else {
            self::getErroForm($validate);
            self::userPessoaFisica();
        }

    }

    /*
    *FUNÇÃO PARA VALIDAR E SETAR OS ERROS OCORRIDO NO FORMULARIO
    */
    function getErroForm($validate){
        self::$erro_form = true;
        $array = $validate->get_errors();
        foreach ($array as $key => $value) { }

        echo $key.'<br>';
        die;
    }
    /*
    *FUNÇÃO PARA RETORNO DE ERROS OCORRIDO NO FORMULARIO OU CONSULTA DE BANCO
    */
    function erros() {
        return $this->erro;
    }

    public function redirection() {
        if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'pf') {
            self::userPessoaFisica();
            die;
        } else if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'pj') {
            self::userPessoaJuridica();
            die;
        } else if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'tlm') {
            self::listagemTelemarketing();
            die;
        } else if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'admin') {
            self::userAdmin();
            die;
        } else {
            header("Location: /login");
            die;
        }
    }
}
