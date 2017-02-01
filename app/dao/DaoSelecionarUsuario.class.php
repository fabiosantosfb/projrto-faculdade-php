<?php
//require_once ('app/model/Conexao.class.php');
//include_once ('app/model/PessoaFisica.class.php');
//include_once ('app/model/PessoaJuridica.class.php');

class Selection extends ConexaoDb {
  private $erro;
  private static $SelectionDadosUser = null;

  public static function getInstanceSelection() {
    if (empty(self::$SelectionDadosUser)) {
      self::$SelectionDadosUser = new Selection();
    }
    return self::$SelectionDadosUser;
  }

  public function seachAddress($id) {
    try{
        $queryEd = "SELECT * FROM endereco WHERE usuario_id_usuario = :id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryEd);
        $validar->bindValue(":id_usuario",$id);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetch(PDO::FETCH_ASSOC);
        } else {
          $this->erro = "Conta não encontrada!";
          return false;
        }
    } catch (Exception $en){
      $this->erro = "EXCEÇÃO NA CONSULTA DE ENDEREÇO!";
    }
  }

  public function seachTelefone($id) {
    try{
        $queryTl = "SELECT * FROM telefone WHERE usuario_id_usuario = :id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryTl);
        $validar->bindValue(":id_usuario",$id);
        $validar->execute();

        if ($validar->rowCount() > 1){
          return $validar->fetchAll(PDO::FETCH_ASSOC);
        } else {
          $this->erro = "telefone não encontrada!";
          return false;
        }
    } catch (Exception $tl){
      $this->erro = "EXCEÇÃO NA CONSULTA DE TELEFONE!";
    }
  }

  public function selectionPessoaFisica($id){
    try{
        $queryPf = "SELECT * FROM pessoa_fisica WHERE usuario_id_usuario = :id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryPf);
        $validar->bindValue(":id_usuario",$id);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetch(PDO::FETCH_ASSOC);
        } else {
          $this->erro = "Conta não encontrada!";
          return false;
        }
    } catch (Exception $pF){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
      return false;
    }
  }

  public function selectionPessoaJuridica($id){
    try{
        $queryPj = "SELECT * FROM pessoa_juridica WHERE usuario_id_usuario = :id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryPj);
        $validar->bindValue(":id_usuario",$id);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetch(PDO::FETCH_ASSOC);
        } else {
          $this->erro = "Conta não encontrada!";
          return false;
        }
    } catch (Exception $pJ){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA JURIDICA!";
      return false;
    }
  }

  public function selectionTelemarketing($id){
    try{
        $queryPj = "SELECT * FROM telemarketing WHERE pessoa_juridica_usuario_id_usuario = :id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryPj);
        $validar->bindValue(":id_usuario",$id);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetch(PDO::FETCH_ASSOC);
        } else {
          //$this->erro = "Conta não encontrada!";
          return false;
        }
    } catch (Exception $pJ){
      $this->erro = "EXCEÇÃO NA CONSULTA DE TELEMARKETING!";
      return false;
    }
  }

  public function selectionAdmin($id) {
    try{
        //$usuario = Login::getInstanceLogin();
        $queryPj = "SELECT * FROM admin WHERE usuario_id_usuario = :id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryPj);
        $validar->bindValue(":id_usuario",$id);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetch(PDO::FETCH_ASSOC);
        } else {
          $this->erro = "Conta não encontrada!";
          return false;
        }
    } catch (Exception $pJ){
      $this->erro = "EXCEÇÃO NA CONSULTA DO ADMIN!";
      return false;
    }
  }

  public function dadosUser($id){
    try{
        $queryPj = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryPj);
        $validar->bindValue(":id_usuario",$id);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetch(PDO::FETCH_ASSOC);
        } else {
          $this->erro = "Conta não encontrada!";
          return false;
        }
    } catch (Exception $pJ){
      $this->erro = "EXCEÇÃO NA CONSULTA DO USUARIO!";
      return false;
    }
  }

  public function getErro() {
    return $this->erro;
  }
}
