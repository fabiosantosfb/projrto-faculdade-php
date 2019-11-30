<?php

namespace App\Controller;

use App\Dao\{
	DaoSelecionarUsuario AS Selection,
	DaoLogin,
	DaoListarUsuarios AS Listar,
	DaoInserirUsuario AS DaoUsuario,
	UpdateUser,
	ValidateUserExisting
};

use App\Model\Bcrypt;
use App\Model\{
	Logar, Mail, Telefone, Endereco, PessoaFisica, PessoaJuridica
};

use App\Utils\{ DataValidator, ReCaptcha };
use App\Utils\pdf\FPDF;

class PagesController {
    private $tipoCadastro;

	/**
	 * @var Logar $login
	 */
    private $login;
	/**
	 * @var Telefone $fone
	 */
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

	/**
	 * @return PagesController
	 */
    public static function getPagesController()
	{
        if (empty(self::$PagesController)) {
            self::$PagesController = new PagesController();
        }
        return self::$PagesController = new PagesController();
    }

	/**
	 *
	 */
    public function page_form_login() {
        require_once ('/home/fabiano/Documentos/projetos/projeto-faculdade/faculdade/app/view/view-form-login.php');
    }

	/**
	 *
	 */
    public function page_form_pessoafisica() {
        require_once ('/home/fabiano/Documentos/projetos/projeto-faculdade/faculdade/app/view/view-form-pf.php');
    }

	/**
	 *
	 */
    public function page_form_pessoajuridica() {
        require_once ('/home/fabiano/Documentos/projetos/projeto-faculdade/faculdade/app/view/view-form-pj.php');
    }

	/**
	 *
	 */
    public function page_form_recuperar_pwd() {
        require_once ('/home/fabiano/Documentos/projetos/projeto-faculdade/faculdade/app/view/view-form-page-recuperar-pwd.php');
    }

	/**
	 *
	 */
    public function home() {
        $PESSOA = '<a class="nav-item" href="pessoa-juridica"><span>Pessoa Jurídica</span></a>';
        $LOGIN = '<a class="nav-item" href="login"><span>ENTRAR</span></a>';

        require_once ('/home/fabiano/Documentos/projetos/projeto-faculdade/faculdade/app/view/view-form-pj.php');
    }

	/**
	 *
	 */
    public function userPessoaFisica() {
        require_once ('/home/fabiano/Documentos/projetos/projeto-faculdade/faculdade/app/view/view-pf-pages.php');
    }

	/**
	 *
	 */
    public function userPessoaJuridica() {
		$pessoaJuridica = Selection::getInstanceSelection();
		$pessoa = $pessoaJuridica->selectionUsuario($_SESSION['id']);
		$dados = $pessoaJuridica->selectionPessoaJuridica($_SESSION['id']);
		$telefone = $pessoaJuridica->selectionTelefone($_SESSION['id']);

        require_once ('/home/fabiano/Documentos/projetos/projeto-faculdade/faculdade/app/view/view-pj-pages.php');
    }

	/**
	 *
	 */
    public function userAdmin() {
        require_once ('/home/fabiano/Documentos/projetos/projeto-faculdade/faculdade/app/view/ViewAdmin/admin.php');
    }

	/**
	 *
	 */
    public function pessoaJuridica() {
        require_once ('/home/fabiano/Documentos/projetos/projeto-faculdade/faculdade/app/view/ViewAdmin/pessoa-juridica.php');
    }

	/**
	 *
	 */
    public function recuperarPwd() {
        if(!isset($_SESSION['erro-email-rec'])) {
            $link = Bcrypt::hash($_POST['email_rec'], null, "link");
            $_link = $link."&s=".session_id();

            $link_link = "http://agenta-telefone.com/redirect?RecuperarPwD=".$_link ;

            $email = new Mail($_POST['email_rec'], $link_link);

            $this->_msg = $email->prepareHeader();
            self::page_form_recuperar_pwd();
        }
    }

	/**
	 *
	 */
    public function linkRecuperarPwd() {
        $_read = array('404' => 'message is-danger','301' => 'message is-primary');

        if(isset($_GET['RecuperarPwD'])) {
            if(!empty($_GET['s']) && $_GET['s'] == session_id()) {
                require_once('/home/fabiano/Documentos/projetos/projeto-faculdade/faculdade/app/view/redefinir-senha.php');
                die;
            }
            $class = $_read['301'];
            $_msg = "Tempo Esgotado para Redefinir Senha!";
        } else {
            $class = $_read['404'];
            $_msg = "Erro 404!";
        }
        require_once('/home/fabiano/Documentos/projetos/projeto-faculdade/faculdade/app/view/view-erro-404.php');
        exit;
    }

	/**
	 * @return bool
	 */
    public function logar() {

        $validate = new DataValidator();

        $this->erro =  $validate->set('email', $_POST['email'])->is_required()->is_email();
        $this->erro =  $validate->set('senha', $_POST['senha'])->is_required();

        if ($validate->validate()){
            $this->login  = Logar::getInstanceLogin();
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

	/**
	 *
	 */
    function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['type_user']);
        session_destroy();
        header("Location: /login");
        die;
    }

	/**
	 *
	 */
    function cadastroPessoaJuridica(){
        $this->tipoCadastro = "pessoajuridica";
        if(isset($_SESSION['erro-rua']) || isset($_SESSION['erro-bairro']) || isset($_SESSION['erro-cidade']) || isset($_SESSION['erro-telefone']) || isset($_SESSION['erro-telefone_2']) || isset($_SESSION['erro-email']) || isset($_SESSION['erro-repetir-senha']) ) {
            self::page_form_pessoajuridica();
        } else {
            if(self::cadastrar()) {
				header("Location: /login");
				die;
            } else {
				self::page_form_pessoajuridica();
            }
        }
        return;
    }

	/**
	 * @return bool
	 */
    function cadastrar() {
    	$this->fone = Telefone::getInstanceTelefone();

        $this->fone->setTelefone($_POST['telefone']);
        $hash = Bcrypt::hash($_POST['senha']);

        $this->login = Logar::getInstanceLogin();
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

        $this->pessoa = PessoaJuridica::getInstancePessoaJuridica();
        $this->pessoa->setCnpj($_POST['cnpj']);
        $this->pessoa->setNome($_POST['nome']);

        if(isset($_POST['telemarketing'])){
        	$this->login->setType('tlm');
        }

        if(self::insertUsuario($this->pessoa, $this->login, $this->endereco, $this->fone)) {
        	return true;
        } else {
        	return false;
        }
    }

	/**
	 * @param $pessoa
	 * @param $login
	 * @param $endereco
	 * @param $fone
	 * @return bool
	 */
    function insertUsuario($pessoa, $login, $endereco, $fone) {
        $insertUsuario = new DaoUsuario($pessoa, $login, $endereco, $fone);

        if($insertUsuario->insertUsuario()) {
        	return true;
        }

        $insertUsuario->getError();
        return false;
    }

	/**
	 *
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

	/**
	 *
	 */
    function listarCsv() {
      $listar = Listar::getInstanceListar();
      $listastelefone = $listar->listarRelatTelefone();

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

	/**
	 *
	 */
    function listarJson() {
        header("Content-type: application/json");
        header('Content-Disposition: attachment; filename="nao-perturbe.json"');

        $listar = Listar::getInstanceListar();
        $listastelefone = $listar->listarRelatTelefone();

        $JSON = json_encode($listastelefone);
        echo $JSON;
    }

	/**
	 *
	 */
    function listarPdf(){
        $listar = Listar::getInstanceListar();
        $listastelefone = $listar->listarRelatTelefone();

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

        $pdf->Ln(8);

        if($_GET['pdf-g'])
        	$pdf->Output();
        else
        	$pdf->Output("relatorio-registro.pdf","D");
    }

	/**
	 *
	 */
    function listarXml() {
        header("Content-type: application/xml");
        header('Content-Disposition: attachment; filename="nao-perturbe.xml"');

        $listar = Listar::getInstanceListar();
        $listastelefone = $listar->listarRelatTelefone();

        $xmlstr = "<?xml version='1.0' encoding='utf-8' ?>"."<consumidor>\n</consumidor>";
        $xml = new \SimpleXMLElement($xmlstr);

        $line = $xml->addChild('usuario');
        foreach ($listastelefone as $key) {
            $line->addChild("numero-telefone", $key['telefone_numero']);
            $line->addChild("data-cadastro", $key['data_cadastro']);
        }

        echo $xml->asXML();
    }

	/**
	 *
	 */
    function update(){
        $sta = ($_POST['status'] == 1)? 0: 1;
        $updateTelemarketing = new UpdateUser();
        $updateTelemarketing->update($sta,$_POST['id']);
    }

	/**
	 *
	 */
    function updateTelefone() {
        $validate = new DataValidator();
        $validate->set('telefone', $_POST['telefone'])->is_required()->is_phone();

        if($validate->validate()){
            $update = new UpdateUser();
            $update->updTelefone($_POST['telefone'], $_POST['usuario'], $_POST['id_telefone']);
        } else {
            self::getErroForm($validate);
            self::userPessoaFisica();
        }
    }

	/**
	 *
	 */
    function deleteTelefone() {

      $validate = new DataValidator();
      $validate->set('telefone', $_POST['telefone']);


      if($validate->validate()){
          $update = new UpdateUser();

          if($update->deleteTelefone($_POST['usuario'], $_POST['id_telefone'])){
              $this->startSessionError('add-tel', "Telefone removido com sucesso");
          } else {
              $this->startSessionError('add-tel', "Erro ao remover telefone");
          }
      } else {
          self::getErroForm($validate);
          self::userPessoaFisica();
      }
    }

	/**
	 *
	 */
    function updateDocumentoPj() {
        $validate = new DataValidator();
        $validate->set('cnpj', $_POST['cnpj'])->is_required()->is_cnpj();
        $validate->set('nome', $_POST['nome'])->is_required();

        if($validate->validate()){
            $update = new UpdateUser();
            $update->upDocumentoPj($_POST['nome'], $_POST['usuario'], $_POST['cnpj']);
        } else {
            self::getErroForm($validate);
            self::userPessoaJuridica();
        }
    }

	/**
	 *
	 */
    function updateAddress() {
        $validate = new DataValidator();
        $validate->set('cep', $_POST['cep'])->is_required()->is_zipCode();
        $validate->set('cidade', $_POST['cidade'])->is_required();
        $validate->set('rua', $_POST['rua'])->is_required();
        $validate->set('bairro', $_POST['bairro'])->is_required();

        if($validate->validate()){
            $update = new UpdateUser();
            $update->upAddress($_POST['cep'], $_POST['cidade'], $_POST['rua'], $_POST['bairro'], $_POST['numero'], $_POST['complemento'], $_POST['id_endereco']);
        } else {
            self::getErroForm($validate);
            self::userPessoaFisica();
        }
    }

	/**
	 *
	 */
    function updatePassword() {
        $validate = new DataValidator();

        $validate->set('senha', $_POST['senha'])->is_required();
        $validate->set('repetir_senha', $_POST['repetir_senha'])->is_required()->is_equals($_POST['senha'], true);
        $validate->set('email', $_POST['email'])->is_required()->is_email();

        if($validate->validate()){
            $update = new UpdateUser();
            $hash = Bcrypt::hash($_POST['senha']);

            $update->upPassword($hash, $_POST['email'], $_POST['id']);
        } else {
            self::getErroForm($validate);
            self::userPessoaFisica();
        }
    }

	/**
	 *
	 */
    function redefinirPassword() {
        $validate = new DataValidator();

        $validate->set('senha', $_POST['senha'])->is_required();
        $validate->set('repetir_senha', $_POST['repetir_senha'])->is_required()->is_equals($_POST['senha'], true);
        $validate->set('email', $_POST['email'])->is_required()->is_email();

        if($validate->validate()){
            $update = new UpdateUser();
            $hash = Bcrypt::hash($_POST['senha']);

            if($update->redefinirPassword($hash, $_POST['email']))header("Location: /login");

        } else {
            self::getErroForm($validate);
            self::userPessoaFisica();
        }
    }

	/**
	 *
	 */
    function addTelefone() {

        $validate = new DataValidator();
        $validate->set('telefone', $_POST['novo_tel'])->is_required()->is_phone();

        if($validate->validate()){
            $update = new UpdateUser();
            $update->addTelefoneDataBase($_POST['novo_tel'], $_POST['usuario']);

            self::redirection();
        } else {
            self::getErroForm($validate);
            self::redirection();
        }
    }

	/**
	 *
	 */
    function gerarTokenAcesso() {
        $validate   = new DataValidator();

        $validate->set('token', $_POST['token'])->is_required();

        if(!$validate->validate()){
            self::startSessionError('token', "Erro ao gerar token");
            self::getErroForm($validate);
        } else {
            $_token      =   md5($_POST['token']);
            $identicador =   md5(rand(1, $_POST['id']));

            $token      = $_token."&s=".session_id();
            $link_link  = "http://localhost:3000/relatorio?doc=JSON&?id=".$identicador."&?token=".$token;

            $updateTelemarketing = new UpdateUser();
            $updateTelemarketing->token($token, $_POST['id'], $identicador);
            //$data = array('token' => $_token, 'id' => $id);
            $data = ['token' => $token, 'id' => $identicador];
            print_r(json_encode($data, true));
        }
    }

	/**
	 *
	 */
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
        echo json_encode(array('erro' => 'only accept method POST'));
    }

	/**
	 * @param $validate
	 */
    function getErroForm($validate){
        $array = $validate->get_errors();
        foreach ($array as $key => $value) { }

        echo $key.'<br>';
    }

	/**
	 * @return int
	 */
    function erroLogin() {
        return $this->erro_login;
    }

	/**
	 * @return int
	 */
    function erroreCaptcha() {
        return $this->erro_reCaptcha;
    }

	/**
	 * @param $campo
	 * @return string
	 */
    function getErroFormulario($campo) {
        return '<span class="help is-danger ">Error no Campo '.$campo.'</span>';
    }

	/**
	 * @return string
	 */
    function setErroFormulario() {
        return '<span class="help is-danger "></span>';
    }

	/**
	 * @param $msg
	 * @return string
	 */
    function setMsgError($msg) {
        return '<span class="help is-danger ">'.$msg.'</span>';
    }

	/**
	 * @return string
	 */
    function unsetMsgError() {
        return '<span class="help is-danger "></span>';
    }

	/**
	 *
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

	/**
	 * @param $campo
	 * @param bool $erro
	 */
    function startSessionError($campo, $erro = true){
        $_SESSION[$campo] = $erro;
    }

	/**
	 * @param $campo
	 */
    function unsetSessionError($campo) {
        unset($_SESSION[$campo]);
    }

	/**
	 *
	 */
    function redirection() {
        if(isset($_SESSION['type_user']) && !empty($_SESSION['type_user']) && $_SESSION['type_user'] == 'pj' || $_SESSION['type_user'] == 'tlm' ) {
            if(isset($_SESSION['token-user-session']) && isset($_SESSION['token-user-agent']) && isset($_SESSION['token-user-ip'])
            && Bcrypt::check('user'.$_SERVER['HTTP_USER_AGENT'], $_SESSION['token-user-agent']) && Bcrypt::check('user'.$_SERVER['REMOTE_ADDR'], $_SESSION['token-user-ip'])) {
                self::userPessoaJuridica();
                die;
            }
        } else {
            self::logout();
            die;
        }
    }
}
