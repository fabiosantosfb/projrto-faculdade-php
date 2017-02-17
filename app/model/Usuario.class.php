<?php
require_once ('Endereco.class.php');
require_once('app/core/Bcrypt.php');

class Usuario extends Endereco {
  private $nome;
  private $status;
  private $dateCriacao;
  private $dateAtualizacao;
  private static $usuario = null;

  public function __construct(){

  }

  public static function getInstanceUsuario() {
    if (empty(self::$usuario)) {
        self::$usuario = new Usuario();
    }
    return self::$usuario;
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
