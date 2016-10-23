<?php

public class Empresa {
  private $id;
  private $nome_razao;
  private $status;
  private $dateCriacao;
  private $dateAtualizacao;
  private $email;

  public function __construct($id, $nome_razao, $status, $dateCriacao, $dateAtualizacao, $email){
    $this->id = $id;
    $this->nome_razao = $nome_razao;
    $this->status = $status;
    $this->dateCriacao = $dateCriacao;
    $this->dateAtualizacao = $dateAtualizacao;
    $this->email = $email;
  }

  public function __construct(){
    
  }

  public function getIde(){
    return $this->id;
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

  public function getEmail(){
    return $this->email;
  }

  public function setStatus($status){
    $this->status = $status;
  }
}
