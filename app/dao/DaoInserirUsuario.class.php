<?php

class DaoUsuario extends ConexaoDb {
    private $dataAutenticacao;
    private $dataUsuario;
    private $dataEndereco;
    private $fone;
    private $messages_errors = array();
    private static $error;

    public function __construct($usuario, $login, $endereco, $fone){
        $this->dataUsuario = $usuario;
        $this->dataAutenticacao = $login;
        $this->dataEndereco = $endereco;
        $this->fone = $fone;
        $this->messages_erros_insert();
    }

    private function messages_erros_insert() {
      $this->messages_errors = array(
        'insert_usuario'          => 'Erro ao inserir Usuario!',
        'insert_pessoa_juridica'  => 'Erro ao inserir Pessoa Juridica!',
        'insert_pessoa_fisica'    => 'Erro ao inserir Pessoa Fisica!',
        'insert_telefone'         => 'Erro ao inserir Telefone!'
      );
    }

    public function insertUsuario() {
        try {
            $validarUser = Parent::getInstanceConexao()->prepare("INSERT INTO usuario values (default, :email, :senha, :nome, :type, :cep, :rua, :bairro, :cidade, :numero, :complemento, default, default)");
            $validarUser->bindValue(":email",$this->dataAutenticacao->getEmail());
            $validarUser->bindValue(":senha",$this->dataAutenticacao->getPassword());
            $validarUser->bindValue(":nome",$this->dataUsuario->getNome());
            $validarUser->bindValue(":type",$this->dataAutenticacao->getType());
            $validarUser->bindValue(":cep", $this->dataEndereco->getCep());
            $validarUser->bindValue(":rua", $this->dataEndereco->getRua());
            $validarUser->bindValue(":bairro", $this->dataEndereco->getBairro());
            $validarUser->bindValue(":cidade", $this->dataEndereco->getCidade());
            $validarUser->bindValue(":numero", $this->dataEndereco->getNumero());
            $validarUser->bindValue(":complemento", $this->dataEndereco->getComplemento());
            $validarUser->execute();
            return true;
        } catch (Exception $ex){
            $this->setError($this->messages_errors['insert_usuario']);
            return false;
        }
    }

    public function insertPessoaJuridica() {
        try {
            $validarDoc = Parent::getInstanceConexao()->prepare("INSERT INTO pessoa_juridica values (LAST_INSERT_ID(), :cnpj, 0)");
            $validarDoc->bindValue(":cnpj", $this->dataUsuario->getCnpj());
            $validarDoc->execute();
            return true;
        } catch (Exception $ex){
          $this->setError($this->messages_errors['insert_pessoa_juridica']);
          return false;
        }
    }

    public function insertPessoaFisica() {
        try {
            $validarDoc = Parent::getInstanceConexao()->prepare("INSERT INTO pessoa_fisica values (LAST_INSERT_ID(), :cpf, :uf, :rg, :data, :orgao)");
            $validarDoc->bindValue(":cpf", $this->dataUsuario->getCpf());
            $validarDoc->bindValue(":uf", $this->dataUsuario->getUf());
            $validarDoc->bindValue(":rg", $this->dataUsuario->getRg());
            $validarDoc->bindValue(":data", $this->dataUsuario->getDataExpedicao());
            $validarDoc->bindValue(":orgao", $this->dataUsuario->getOrgExpedidor());
            $validarDoc->execute();
            return true;
        } catch (Exception $ex){
          $this->setError($this->messages_errors['insert_pessoa_fisica']);
          return false;
        }
    }

    public function insertTelefone() {
        try {
            $validarTel = Parent::getInstanceConexao()->prepare("INSERT INTO telefone values (default, LAST_INSERT_ID(), 0, :telefone, default, default)");
            $validarTel->bindValue(":telefone", $this->fone->getTelefone());
            $validarTel->execute();
            return true;
        } catch (Exception $ex){
          $this->setError($this->messages_errors['insert_telefone']);
          return false;
        }
    }

    public function setError($message) {
      self::$error = $message;
    }

    public function getError() {
      echo self::$error;
    }
}
