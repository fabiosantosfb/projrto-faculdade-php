<?php
class Usuario extends Endereco {
  private $nome;
  private $status;
  private $dateCriacao;
  private $dateAtualizacao;
  private $INSTANCE_USARIO = null;

  public function __construct(){ }

  public static function getInstanceUsuario() {
    if (empty($INSTANCE_USARIO)) { $INSTANCE_USARIO = new Usuario(); }
    return $INSTANCE_USARIO;
  }

  public function getNome(){ return $this->nome; }
  public function setNome($nome){ $this->nome = $nome; }

  public function getStatus(){ return $this->status; }
  public function setStatus($status){ $this->status = $status; }

  public function getDataCriacao(){ return $this->dateCriacao; }
  public function setDataCriacao($dateCriacao){ $this->dateCriacao = $dateCriacao; }

  public function getAtualizacao(){ return $this->dateAtualizacao; }
  public function setAtualizacao($dateAtualizacao){ $this->dateAtualizacao = $dateAtualizacao; }
}
