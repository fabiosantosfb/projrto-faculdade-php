<?php

class PessoaFisica extends Usuario {
    private $cpf;
    private $rg;
    private $org_expedidor;
    private $data_expedicao;
    private $uf;

    public function __construct($cpf, $rg, $org_expedidor, $data_expedicao, $uf){
      $this->cpf = $cpf;
      $this->org_expedidor = $org_expedidor;
      $this->data_expedicao = $data_expedicao;
      $this->uf = $uf;
    }

    public function getCpf(){
      return $this->$cpf;
    }

    public function setCpf($cpf){
      $this->cpf = $cpf;
    }

    public function getOrgExpedidor(){
      return $this->$org_expedidor;
    }

    public function setOrgExpedidor($org_expedidor){
      $this->org_expedidor = $org_expedidor;
    }

    public function getDataExpedicao(){
      return $this->$data_expedicao;
    }

    public function setDataExpdicao($data_expedicao){
      $this->data_expedicao = $data_expedicao;
    }

    public function getUf(){
      return $this->$uf;
    }

    public function setUf($uf){
      $this->uf = $uf;
    }
}
