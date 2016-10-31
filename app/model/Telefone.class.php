<?php
include_once ('app/model/Logar.class.php');

class Telefone extends Login {
  private $telefone;
  private $statusBloqueio;
  private static $telefoneInstace;

  public function __construct(){}

  public static function getInstanceTelefone() {
    if (!isset(self::$telefoneInstace)) {
      self::$telefoneInstace = new Telefone();
    }
    return self::$telefoneInstace;
  }

  public function getTelefone(){
    return $this->telefone;
  }

  public function setTelefone($telefone){
    $this->telefone = $telefone;
  }

  public function getStatusBloqueio(){
    return $this->statusBloqueio;
  }

  public function setStatusBloqueio($statusBloqueio){
    $this->statusBloqueio = $statusBloqueio;
  }
}
