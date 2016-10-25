<?php

public class Empresa extends Telefone {
  private $id;
  private $cnpj;
  private $nome_razao;
  private $status;
  private $dateCriacao;
  private $dateAtualizacao;

  public function __construct($cnpj, $nome_razao){
    $this->cnpj = $ncpj;
    $this->nome_razao = $nome_razao;
  }

  public function getId(){
    return $this->id;
  }

  public function getCnpj(){
    return $this->cnpj;
  }

  public function getRazaoSocial(){
    return $this->nome_razao;
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

  public function setId($id){
    $this->id = $id;
  }

  public function setCnpj($cnpj){
    $this->cnpj = $ncpj;
  }

  public function setRazaoSocial($nome_razao){
    $this->nome_razao = $nome_razao;
  }

  public function setDataCriacao($dateCriacao){
    $this->dateCriacao = $dateCriacao;
  }

  public function setAtualizacao($dateAtualizacao){
    $this->dateAtualizacao = $dateAtualizacao;
  }
}
