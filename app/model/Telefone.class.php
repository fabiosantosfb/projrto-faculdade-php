<?php

class Telefone extends Login {
  private $telefone;
  private $operadora;

  public function __construct($telefone, $operadora, $email, $password){
    Parent::__construct($email, $password);
    $this->telefone = $telefone;
    $this->operadora = $operadora;
  }

  public function getTelefone(){
    return $this->telefone;
  }

  public function setTelefone($telefone){
    $this->telefone = $telefone;
  }

  public function getOperadora(){
    return $this->operadora;
  }

  public function setOperadora($operadora){
    $this->operadora = $operadora;
  }
}
