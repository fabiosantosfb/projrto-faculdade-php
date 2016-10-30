<?php
require_once ('conecta.php');
include_once ('app/model/PessoaFisica.class.php');
include_once ('app/model/PessoaJuridica.class.php');

class Listar extends ConexaoDb {
  private static $listar = null;

  public function __construct(){}

  public static function getInstanceListar() {
    if (!isset(self::$listar)) {
      self::$listar = new Listar();
    }
    return self::$listar;
  }

  public function listarPessoaFisica(){
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

  public function listarPessoaJuridica(){
    try{
        $queryPj = "SELECT * FROM pessoa_juridica INNER JOIN 'pessoa_juridica.usuario_id_usuario' = 'telafone.usuario_id_usuario'";
        $validar = Parent::getInstance()->prepare($queryPj);
        $lista = $validar->fetchAll(PDO::FETCH_ASSOC);
      var_dump($f_lista);
        $f_lista = array();
          foreach ($lista as $l)
              $f_lista[] = $l;

        return $f_lista;
    } catch (Exception $pF){

      echo "<script>alert('EXECPTION')</script>";
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
    }
  }

  public function listarTelemarketing(){
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
}
