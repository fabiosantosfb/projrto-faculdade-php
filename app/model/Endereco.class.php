<?php

class Endereco {
  private $cep;
  private $rua;
  private $bairro;
  private $cidade;
  private $numero = "";
  private $complemento = "";
  private $INSTANCE_ENDERECO = null;

  public function __construct(){ }

  public static function getInstanceEndereco() {
    if (empty($INSTANCE_ENDERECO)) { $INSTANCE_ENDERECO = new Endereco(); }
    return $INSTANCE_ENDERECO;
  }

  public function getCep(){ return $this->cep; }
  public function setCep($cep){ $this->cep = $cep; }

  public function getRua(){ return $this->rua; }
  public function setRua($rua){ $this->rua = $rua; }

  public function getBairro(){ return $this->bairro; }
  public function setBairro($bairro){ $this->bairro = $bairro; }

  public function getCidade(){ return $this->cidade; }
  public function setCidade($cidade){ $this->cidade = $cidade; }

  public function getNumero(){ return $this->numero; }
  public function setNumero($numero){ $this->numero = $numero; }

  public function getComplemento(){ return $this->complemento; }
  public function setComplemento($complemento){ $this->complemento = $complemento; }
}
