<?php

class Telefone {
  private $telefone;
  private $statusBloqueio;
  private $INSTANCE_TELEFONE = null;

  public function __construct(){}

  public static function getInstanceTelefone() {
    if (empty($INSTANCE_TELEFONE)) { $INSTANCE_TELEFONE = new Telefone(); }
    return $INSTANCE_TELEFONE;
  }

  public function getTelefone(){ return $this->telefone; }
  public function setTelefone($telefone){ $this->telefone = $telefone; }
}
