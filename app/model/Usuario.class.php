<?php
include ('app/model/Endereco.class.php');

class Usuario extends Endereco {
  private $nome;
  private $status;
  private $dateCriacao;
  private $dateAtualizacao;

  public function __construct($nome, $cep, $rua, $bairro, $cidade, $numero, $complemento){
    Parent::__construct($cep, $rua, $bairro, $cidade, $numero, $complemento);
    $this->nome = $nome;
  }

  public function getNome(){
    return $this->nome;
  }

  public function getStatus(){
    return $this->status;
  }

  public function getDataCriacao(){
    return $this->dateCriacao;
  }

  public function getAtualizacao(){
    return $this->dateAtualizacao;
  }

  public function setStatus($status){
    $this->status = $status;
  }

  public function setNome($nome){
    $this->nome = $nome;
  }

  public function setDataCriacao($dateCriacao){
    $this->dateCriacao = $dateCriacao;
  }

  public function setAtualizacao($dateAtualizacao){
    $this->dateAtualizacao = $dateAtualizacao;
  }
}
