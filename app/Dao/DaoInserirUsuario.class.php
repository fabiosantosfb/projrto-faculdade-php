<?php

require_once ('conecta.php');

class DaoUsuario extends ConexaoDb {
  private $dataAutenticacao;
  private $dataUsuario;
  private $dataEndereco;
  private $erro;

  public function __construct($usuario, $login, $endereco){
    $this->dataUsuario = $usuario;
    $this->dataAutenticacao = $login;
    $this->dataEndereco = $endereco;
  }

  public function verificarEmailExist() {
    try {
        $query =  "SELECT email FROM usuario WHERE email = :email";
        $validar = Parent::getInstance()->prepare($query);
        $validar->bindValue(":email",$this->dataAutenticacao->getEmail());
        $validar->execute();

        if ($validar->rowCount() === 1) {
          $this->erro = "Email não Disponível!";
          return true;
        } else {
          try {
              $usuario = "INSERT INTO usuario (id_usuario, email, senha) values (default, :email, :pwd)";
              $validarUser = Parent::getInstance()->prepare($usuario);
              $validarUser->bindValue(":email",$this->dataAutenticacao->getEmail());
              $validarUser->bindValue(":pwd",$this->dataAutenticacao->getPassword());
              $validarUser->execute();
              return false;
            } catch (Exception $ex){
              $this->erro = "Exceção ao inserir Ususario!";
              return true;
            }
        }
    } catch (Exception $ex){
      $this->erro = "Exceção ao verificar Email!";
      return true;
    }
  }

  public function verificarCnpjExist() {
    try {
        $query =  "SELECT cnpj FROM pessoa_juridica WHERE cnpj = :cnpj";
        $validar = Parent::getInstance()->prepare($query);
        $validar->bindValue(":cnpj", $this->dataUsuario->getCnpj());
        $validar->execute();

        if ($validar->rowCount() === 1) {
          $this->erro = "Cnpj ja se encontar cadastrado no Sistema!";
          return true;
        } else {
          try {
            $pessoaJ = "INSERT INTO pessoa_juridica (nome, cnpj, usuario_id_usuario) values (:nome, :cnpj, LAST_INSERT_ID())";
            $validarCnpj = Parent::getInstance()->prepare($pessoaJ);
            $validarCnpj->bindValue(":nome", $this->dataUsuario->getNome());
            $validarCnpj->bindValue(":cnpj", $this->dataUsuario->getCnpj());
            $validarCnpj->execute();
            return false;
          } catch (Exception $ex){
             $this->erro = "Exceção ao Inserir Cpf!";
             return true;
          }
        }
      } catch (Exception $ex){
         $this->erro = "Exceção ao Verificar Cnpj!";
         return true;
      }
  }

  public function verificarCpfExist() {
    try {
        $query =  "SELECT cpf FROM pessoa_fisica WHERE cpf = :cpf";
        $validar = Parent::getInstance()->prepare($query);
        $validar->bindValue(":cpf", $this->dataUsuario->getCpf());
        $validar->execute();

        if ($validar->rowCount() === 1) {
          $this->erro = "Cpf ja se encontar cadastrado no Sistema!";
          return true;
        } else {
          try {
            $pessoaF = "INSERT INTO pessoa_fisica (nome, cpf, rg, org, uf, data_expedicao, usuario_id_usuario) values (:nome, :cpf, :rg, :org, :uf, :data_expedicao, LAST_INSERT_ID())";
            $validarCpf = Parent::getInstance()->prepare($pessoaF);
            $validarCpf->bindValue(":nome", $this->dataUsuario->getNome());
            $validarCpf->bindValue(":cpf", $this->dataUsuario->getCpf());
            $validarCpf->bindValue(":rg", $this->dataUsuario->getRg());
            $validarCpf->bindValue(":org", $this->dataUsuario->getOrgExpedidor());
            $validarCpf->bindValue(":uf", $this->dataUsuario->getUf());
            $validarCpf->bindValue(":data_expedicao", $this->dataUsuario->getDataExpedicao());
            $validarCpf->execute();
            return false;
          } catch (Exception $ex){
             $this->erro = "Exceção ao Inserir Cpf!";
             return true;
          }
        }
      } catch (Exception $ex){
         $this->erro = "Exceção ao Verificar Cpf!";
         return true;
      }
  }

  public function verificarTelefonelExist() {
    try {
        $query =  "SELECT telefone_numero FROM telefone WHERE telefone_numero = :telefone_numero";
        $validar = Parent::getInstance()->prepare($query);
        $validar->bindValue(":telefone_numero", $this->dataAutenticacao->getTelefone());
        $validar->execute();

        if ($validar->rowCount() === 1) {
          $this->erro = "Telefone ja se encontar cadastrado no Sistema!";
          return true;
        } else {
          try {
              $telefone = "INSERT INTO telefone (status_bloqueio, data_cadastro, data_atualizacao, telefone_numero, usuario_id_usuario) values (0, default, default, :telefone, LAST_INSERT_ID())";
              $validarTel = Parent::getInstance()->prepare($telefone);
              $validarTel->bindValue(":telefone", $this->dataAutenticacao->getTelefone());
              $validarTel->execute();
              return false;
          } catch (Exception $ex){
             $this->erro = "Exceção ao inserir Telfone!";
             return true;
          }
        }
      } catch (Exception $ex){
        $this->erro = "Exceção ao verificar Telefone!";
        return true;
      }
  }

  public function inserirEndereco() {
    try {
      $endereco = "INSERT INTO endereco (cep, rua, bairro, cidade, numero, complemento, usuario_id_usuario) values (:cep, :rua, :bairro, :cidade, :numero, :complemento, LAST_INSERT_ID())";
        $validarEnd = Parent::getInstance()->prepare($endereco);
        $validarEnd->bindValue(":cep", $this->dataEndereco->getCep());
        $validarEnd->bindValue(":rua", $this->dataEndereco->getRua());
        $validarEnd->bindValue(":bairro", $this->dataEndereco->getBairro());
        $validarEnd->bindValue(":cidade", $this->dataEndereco->getCidade());
        $validarEnd->bindValue(":numero", $this->dataEndereco->getNumero());
        $validarEnd->bindValue(":complemento", $this->dataEndereco->getComplemento());

        $validarEnd->execute();
        return true;
    } catch (Exception $ex){
       $this->erro = "Exceção ao inserir Endereco!";
       return false;
    }
  }

  public function inserirTelemarketing(){
        try {
            $telemarketing = "INSERT INTO telemarketing (status_ativo, pessoa_juridica_usuario_id_usuario) values (0, LAST_INSERT_ID())";
            $validarTlmk = Parent::getInstance()->prepare($telemarketing);
            $validarTlmk->execute();
            return true;
          } catch (Exception $ex){
            $this->erro = "Exceção ao Inserir telemarketing!";
            return false;
          }
  }

  public function getErro() {
    return $this->erro;
  }
}
