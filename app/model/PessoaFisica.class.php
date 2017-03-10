<?php
include_once ('app/model/Usuario.class.php');

class PessoaFisica extends Usuario {
    private $cpf = null;
    private $rg;
    private $org_expedidor;
    private $data_expedicao;
    private $uf;
    private static $pessoaFisica = null;

    public function __construct(){}

    public static function getInstancePessoaFisica() {
      if (empty(self::$pessoaFisica)) { self::$pessoaFisica = new PessoaFisica(); }
      return self::$pessoaFisica;
    }

    public function getCpf(){ return $this->cpf; }
    public function setCpf($cpf){ $this->cpf = $cpf; }

    public function getOrgExpedidor(){ return $this->org_expedidor; }
    public function setOrgExpedidor($org_expedidor){ $this->org_expedidor = $org_expedidor; }

    public function getDataExpedicao(){ return $this->data_expedicao; }
    public function setDataExpdicao($data_expedicao){ $this->data_expedicao = $data_expedicao; }

    public function getUf(){ return $this->uf; }
    public function setUf($uf){ $this->uf = $uf; }

    public function getRg(){ return $this->rg; }
    public function setRg($rg){ $this->rg = $rg; }
}
