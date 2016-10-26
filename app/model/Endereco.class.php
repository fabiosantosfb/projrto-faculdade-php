<?php

class Endereco {
  
  private $cep;
  private $rua;
  private $bairro;
  private $cidade;
  private $numero;
  private $complemento;

  public function __construct($cep, $rua, $bairro, $cidade, $numero, $complemento){
      $this->cep = $cep;
      $this->rua = $rua;
      $this->bairro = $bairro;
      $this->cidade = $cidade;
      $this->numero = $numero;
      $this->complemento = $complemento;
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
}
