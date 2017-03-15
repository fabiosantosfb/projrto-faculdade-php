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

  public function selectionTelefone($id) {
    try{
        $queryTl = "SELECT * FROM telefone WHERE usuario_id_usuario = :id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryTl);
        $validar->bindValue(":id_usuario",$id);
        $validar->execute();

        if ($validar->rowCount() >= 1){
          return $validar->fetchAll(PDO::FETCH_ASSOC);
        } else {
          $this->erro = "telefone não encontrada!";
          //return false;
          echo $this->erro;
        }
    } catch (Exception $tl){
      $this->erro = "EXCEÇÃO NA CONSULTA DE TELEFONE!";
      echo $this->erro;
    }
  }

  public function selectionUsuario($id){
    try{
        $queryPf = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryPf);
        $validar->bindValue(":id_usuario",$id);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetch(PDO::FETCH_ASSOC);
        } else {
          $this->erro = "Conta não encontrada!";
          //return false;
          echo $this->erro;
        }
    } catch (Exception $pF){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
      echo $this->erro;
      //return false;
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
          //return false;
          echo $this->erro;
        }
    } catch (Exception $pJ){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA JURIDICA!";
      echo $this->erro;//return false;
    }
  }

  public function selectionPessoaFisica($id){
    try{
        $queryPj = "SELECT * FROM pessoa_fisica WHERE id_usuario = :id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryPj);
        $validar->bindValue(":id_usuario",$id);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetch(PDO::FETCH_ASSOC);
        } else {
          $this->erro = "Conta não encontrada!";
          echo $this->erro;//return false;
        }
    } catch (Exception $pJ){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
      echo $this->erro;//return false;
    }
  }

  public function getErro() {
    return $this->erro;
  }
}
