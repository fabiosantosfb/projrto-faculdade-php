<?php

require_once ('app/model/Conexao.class.php');

class DaoUsuario extends ConexaoDb {
  private $dataAutenticacao;
  private $dataUsuario;
  private $dataEndereco;
  private $erro;
  private $fone;

  private $validarUser;
  private $validarDoc;
  private $validarTel;
  private $validarEnd;
  private $validarTlmk;

  public function __construct($usuario, $login, $endereco, $fone){
    $this->dataUsuario = $usuario;
    $this->dataAutenticacao = $login;
    $this->dataEndereco = $endereco;
    $this->fone = $fone;
  }

  public function verificarEmailExist() {
    try {
        $query =  "SELECT email FROM usuario WHERE email = :email";
        $validar = Parent::getInstanceConexao()->prepare($query);
        $validar->bindValue(":email",$this->dataAutenticacao->getEmail());
        $validar->execute();

        if ($validar->rowCount() === 1) {
          $this->erro = "Email não Disponível!";
          return false;
        } else {
          try {
              $usuario = "INSERT INTO usuario (id_usuario, email, senha, type) values (default, :email, :pwd, :type)";
              $this->validarUser = Parent::getInstanceConexao()->prepare($usuario);
              $this->validarUser->bindValue(":email",$this->dataAutenticacao->getEmail());
              $this->validarUser->bindValue(":pwd",$this->dataAutenticacao->getPassword());
              $this->validarUser->bindValue(":type",$this->dataAutenticacao->getType());
              //$this->validarUser->execute();

              return true;
            } catch (Exception $ex){
              $this->erro = "Exceção ao inserir Ususario!";
              return false;
            }
        }
    } catch (Exception $ex){
      $this->erro = "Exceção ao verificar Email!";
      return false;
    }
  }

  public function verificarCnpjExist() {
    try {
        $query =  "SELECT cnpj FROM pessoa_juridica WHERE cnpj = :cnpj";
        $validar = Parent::getInstanceConexao()->prepare($query);
        $validar->bindValue(":cnpj", $this->dataUsuario->getCnpj());
        $validar->execute();

        if ($validar->rowCount() === 1) {
          $this->erro = "Cnpj ja se encontar cadastrado no Sistema!";
          return false;
        } else {
          try {
            $pessoaJ = "INSERT INTO pessoa_juridica (nome, cnpj, usuario_id_usuario) values (:nome, :cnpj, LAST_INSERT_ID())";
            $this->validarDoc = Parent::getInstanceConexao()->prepare($pessoaJ);
            $this->validarDoc->bindValue(":nome", $this->dataUsuario->getNome());
            $this->validarDoc->bindValue(":cnpj", $this->dataUsuario->getCnpj());
            //$this->validarDoc->execute();

            return true;
          } catch (Exception $ex){
             $this->erro = "Exceção ao Inserir Cpf!";
             return false;
          }
        }
      } catch (Exception $ex){
         $this->erro = "Exceção ao Verificar Cnpj!";
         return false;
      }
  }

  public function verificarCpfExist() {
    try {
        $query =  "SELECT cpf FROM pessoa_fisica WHERE cpf = :cpf";
        $validar = Parent::getInstanceConexao()->prepare($query);
        $validar->bindValue(":cpf", $this->dataUsuario->getCpf());
        $validar->execute();

        if ($validar->rowCount() === 1) {
          $this->erro = "Cpf ja se encontar cadastrado no Sistema!";
          return false;
        } else {
          try {
            $pessoaF = "INSERT INTO pessoa_fisica (nome, cpf, rg, org, uf, data_expedicao, usuario_id_usuario) values (:nome, :cpf, :rg, :org, :uf, :data_expedicao, LAST_INSERT_ID())";
            $this->validarDoc = Parent::getInstanceConexao()->prepare($pessoaF);
            $this->validarDoc->bindValue(":nome", $this->dataUsuario->getNome());
            $this->validarDoc->bindValue(":cpf", $this->dataUsuario->getCpf());
            $this->validarDoc->bindValue(":rg", $this->dataUsuario->getRg());
            $this->validarDoc->bindValue(":org", $this->dataUsuario->getOrgExpedidor());
            $this->validarDoc->bindValue(":uf", $this->dataUsuario->getUf());
            $this->validarDoc->bindValue(":data_expedicao", $this->dataUsuario->getDataExpedicao());
            //$this->validarDoc->execute();

            return true;
          } catch (Exception $ex){
             $this->erro = "Exceção ao Inserir Cpf!";
             echo $ex;
             return false;
          }
        }
      } catch (Exception $ex){
         $this->erro = "Exceção ao Verificar Cpf!";
         echo $ex;
         return false;
      }
  }

  public function verificarTelefonelExist() {
    try {
        $query =  "SELECT telefone_numero FROM telefone WHERE telefone_numero = :telefone_numero";
        $validar = Parent::getInstanceConexao()->prepare($query);
        $validar->bindValue(":telefone_numero", $this->fone->getTelefone());
        $validar->execute();

        if ($validar->rowCount() === 1) {
          echo $this->erro = "Telefone ja se encontar cadastrado no Sistema!";
          return false;
        } else {
          try {
              $telefone = "INSERT INTO telefone (status_bloqueio, data_cadastro, data_atualizacao, telefone_numero, usuario_id_usuario) values (0, default, default, :telefone, LAST_INSERT_ID())";
              $this->validarTel = Parent::getInstanceConexao()->prepare($telefone);
              $this->validarTel->bindValue(":telefone", $this->fone->getTelefone());
              //$this->validarTel->execute();

              return true;
          } catch (Exception $ex){
            echo  "<script>alert('exceção Inserir emil!')</script>";
             $this->erro = "Exceção ao inserir Telfone!";
             echo $ex;
             return false;
          }
        }
      } catch (Exception $ex){
        $this->erro = "Exceção ao verificar Telefone!";
        echo $ex;
        return true;
      }
  }

  public function inserirEndereco() {
    try {
        $endereco = "INSERT INTO endereco (cep, rua, bairro, cidade, numero, complemento, usuario_id_usuario) values (:cep, :rua, :bairro, :cidade, :numero, :complemento, LAST_INSERT_ID())";
        $this->validarEnd = Parent::getInstanceConexao()->prepare($endereco);
        $this->validarEnd->bindValue(":cep", $this->dataEndereco->getCep());
        $this->validarEnd->bindValue(":rua", $this->dataEndereco->getRua());
        $this->validarEnd->bindValue(":bairro", $this->dataEndereco->getBairro());
        $this->validarEnd->bindValue(":cidade", $this->dataEndereco->getCidade());
        $this->validarEnd->bindValue(":numero", $this->dataEndereco->getNumero());
        $this->validarEnd->bindValue(":complemento", $this->dataEndereco->getComplemento());

        if($this->validarUser->execute()) {
          $this->validarDoc->execute();
          $this->validarTel->execute();
          $this->validarEnd->execute();

          return true;
        }
        return false;
    } catch (Exception $ex){
       $this->erro = "Exceção ao inserir Endereco!";
       echo $ex;
       return false;
    }
  }

  public function inserirTelemarketing(){
        try {
            $telemarketing = "INSERT INTO telemarketing (status_ativo, pessoa_juridica_usuario_id_usuario) values (0, LAST_INSERT_ID())";
            $this->validarTlmk = Parent::getInstanceConexao()->prepare($telemarketing);
            $this->validarTlmk->execute();
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
