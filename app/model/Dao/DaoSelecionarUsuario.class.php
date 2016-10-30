<?php
require_once ('conecta.php');
include_once ('app/model/PessoaFisica.class.php');
include_once ('app/model/PessoaJuridica.class.php');

class Selection extends ConexaoDb {
  private $id;
  private $typeUser;
  private $erro;

  public function __construct($id) {
      $this->id = $id;
  }

  public function typeUser() {
    self::selectionPessoaFisica();
    self::selectionPessoaJuridica();
    self::selectionAdmin();
  }

  public function seachAddress($pessoa) {
    try{
        $queryPj = "SELECT * FROM endereco WHERE usuario_id_usuario = :id_usuario";
        $validar = Parent::getInstance()->prepare($queryPj);
        $validar->bindValue(":id_usuario",$this->id);
        $validar->execute();

        return $this->listEndereco($validar->fetch(PDO::FETCH_ASSOC), $pessoa);

    } catch (Exception $pJ){
      $this->erro = "EXCEÇÃO NA CONSULTA DE ENDEREÇO!";
    }
  }

  public function seachTelefone($pessoa) {
    try{
        $queryPj = "SELECT * FROM telefone WHERE usuario_id_usuario = :id_usuario";
        $validar = Parent::getInstance()->prepare($queryPj);
        $validar->bindValue(":id_usuario",$this->id);
        $validar->execute();

        return $this->listTelefone($validar->fetch(PDO::FETCH_ASSOC), $pessoa);

    } catch (Exception $pJ){
      $this->erro = "EXCEÇÃO NA CONSULTA DE TELEFONE!";
    }
  }
  public function listPessoaJuridica($row) {
    $pessoa = PessoaJuridica::getInstancePessoaJuridica();
    $pessoa->setCnpj($row['cnpj']);
    $pessoa->setNome($row['nome']);

    $this->typeUser = "pessoa_juridica";

    self::seachAddress($pessoa);
    self::seachTelefone($pessoa);
    return $pessoa;
  }

  public function listPessoaFisica($row) {
    $pessoa = PessoaFisica::getInstancePessoaFisica();
    $pessoa->setCpf($row['cpf']);
    $pessoa->setOrgExpedidor($row['org']);
    $pessoa->setDataExpdicao($row['data_expedicao']);
    $pessoa->setUf($row['uf']);
    $pessoa->setRg($row['rg']);
    $pessoa->setNome($row['nome']);

    $this->typeUser = "pessoa_fisica";

    self::seachAddress($pessoa);
    self::seachTelefone($pessoa);
    return $pessoa;
  }

  public function listEndereco($row, $pessoa) {
    $pessoa->setCep($row['cep']);
    $pessoa->setRua($row['rua']);
    $pessoa->setBairro($row['bairro']);
    $pessoa->setCidade($row['cidade']);
    $pessoa->setNumero($row['numero']);
    $pessoa->setComplemento($row['complemento']);
  }

  public function listTelefone($row, $pessoa) {
    $pessoa->setTelefone($row['telefone_numero']);
    $pessoa->setStatusBloqueio($row['status_bloqueio']);
    $pessoa->setDataCriacao($row['data_cadastro']);
  }

  public function selectionPessoaFisica(){
    try{
        $queryPf = "SELECT * FROM pessoa_fisica WHERE usuario_id_usuario = :id_usuario";
        $validar = Parent::getInstance()->prepare($queryPf);
        $validar->bindValue(":id_usuario",$this->id);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $this->listPessoaFisica($validar->fetch(PDO::FETCH_ASSOC));
        }
    } catch (Exception $pF){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
    }
  }

  public function selectionPessoaJuridica(){
    try{
        $queryPj = "SELECT * FROM pessoa_juridica WHERE usuario_id_usuario = :id_usuario";
        $validar = Parent::getInstance()->prepare($queryPj);
        $validar->bindValue(":id_usuario",$this->id);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $this->listPessoaJuridica($validar->fetch(PDO::FETCH_ASSOC));
        }
    } catch (Exception $pJ){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA JURIDICA!";
    }
  }

  public function selectionAdmin() {
    try{
        $usuario = Login::getInstanceLogin();
        $queryPj = "SELECT * FROM admin WHERE usuario_id_usuario = :id_usuario AND email = :email";
        $validar = Parent::getInstance()->prepare($queryPj);
        $validar->bindValue(":id_usuario",$this->id);
        $validar->bindValue(":email",$usuario->getEmail());
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $this->preparaAdmin($validar->fetch(PDO::FETCH_ASSOC), Usuario::getInstanceUsuario());
        }
    } catch (Exception $pJ){
      $this->erro = "EXCEÇÃO NA CONSULTA DO ADMIN!";
    }
  }

  public function preparaAdmin($row, $usuario){
    $usuario->setNome($row['nome']);
    $this->typeUser = "admin";
  }

  public function getTypeUser() {
    return $this->typeUser;
  }

  public function getErro() {
    return $this->erro;
  }
}
