<?php

class Endereco {
  private $cep;
  private $rua;
  private $bairro;
  private $cidade;
  private $numero = "";
  private $complemento = "";
  private static $instace_endereco = null;

  public function __construct(){}

  public static function getInstanceEndereco() {
    if (empty(self::$instace_endereco)) {
      self::$instace_endereco = new Endereco();
    }
    return self::$instace_endereco;
  }

  public function getCep(){
     return $this->cep;
  }

  public function getRua(){
     return $this->rua;
  }

  public function getBairro(){
     return $this->bairro;
  }

  public function getCidade(){
     return $this->cidade;
  }

  public function getNumero(){
     return $this->numero;
  }

  public function getComplemento(){
     return $this->complemento;
  }

  public function setCep($cep){
     $this->cep = $cep;
  }

  public function setRua($rua){
     $this->rua = $rua;
  }

  public function setBairro($bairro){
     $this->bairro = $bairro;
  }

  public function setCidade($cidade){
     $this->cidade = $cidade;
  }

  public function setNumero($numero){
     $this->numero = $numero;
  }

  public function setComplemento($complemento){
     $this->complemento = $complemento;
  }
}
