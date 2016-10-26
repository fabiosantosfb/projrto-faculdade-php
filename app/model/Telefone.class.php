<?php
include ('app/model/Logar.class.php');

class Telefone extends Login {
  private $telefone;

  public function __construct($telefone, $email, $password){
    Parent::__construct($email, $password);
    $this->telefone = $telefone;
  }

  public function getTelefone(){
    return $this->telefone;
  }

  public function setTelefone($telefone){
    $this->telefone = $telefone;
  }
}
