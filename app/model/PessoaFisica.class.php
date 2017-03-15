<?php

class PessoaFisica extends Usuario {
    private $cpf = null;
    private $rg;
    private $org_expedidor;
    private $data_expedicao;
    private $uf;
    private $INSTANCE_PESSOA_FISICA = null;

    public function __construct(){}

    public static function getInstancePessoaFisica() {
      if (empty($INSTANCE_PESSOA_FISICA)) { $INSTANCE_PESSOA_FISICA = new PessoaFisica(); }
      return $INSTANCE_PESSOA_FISICA;
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
