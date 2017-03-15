<?php

class PessoaJuridica extends Usuario {
    private $cnpj = null;
    private $telemarketing = false;
    private $telemarketingStatus;
    private $INSTANCE_PESSOA_JURIDICA = null;

    public function __construct(){}

    public static function getInstancePessoaJuridica() {
      if (empty($INSTANCE_PESSOA_JURIDICA)) { $INSTANCE_PESSOA_JURIDICA = new PessoaJuridica(); }
      return $INSTANCE_PESSOA_JURIDICA;
    }

    public function getCnpj(){ return $this->cnpj; }
    public function setCnpj($cnpj){ $this->cnpj = $cnpj; }

    public function getTelemarketing(){ return $this->telemarketing; }
    public function setTelemarketing($telemarketing){ $this->telemarketing = $telemarketing; }

    public function getTelemarketingStatus(){ return $this->telemarketingStatus; }
    public function setTelemarketingStatus($status){ $this->telemarketingStatus = $status; }
}
