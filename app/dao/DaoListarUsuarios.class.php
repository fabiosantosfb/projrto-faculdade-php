<?php
require_once ('app/model/Conexao.class.php');
include_once ('app/model/PessoaFisica.class.php');
include_once ('app/model/PessoaJuridica.class.php');

class Listar extends ConexaoDb {
  private static $listar = null;

  public function __construct(){}

  public static function getInstanceListar() {
    if (empty(self::$listar)) {
      self::$listar = new Listar();
    }
    return self::$listar;
  }

  public function listarPessoaFisica(){
    try{
        $queryPf = "SELECT * FROM pessoa_fisica";
        $validar = Parent::getInstanceConexao()->prepare($queryPf);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (Exception $pF){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
      return null;
    }
  }

  public function listarPessoaJuridica(){
    try{
        $queryPj = "SELECT * FROM pessoa_juridica";
        $validar = Parent::getInstanceConexao()->prepare($queryPj);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (Exception $pF){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
      return null;
    }
  }

  public function listarTelemarketing(){
    try{
        $queryTm = "SELECT * FROM pessoa_juridica JOIN telemarketing ON pessoa_juridica.usuario_id_usuario =  telemarketing.usuario_id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryTm);
        $validar->execute();

        if ($validar->rowCount() === 1){
          return $validar->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (Exception $pF){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
      return null;
    }
  }
}
