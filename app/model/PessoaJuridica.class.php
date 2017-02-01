<?php
include_once ('app/model/Usuario.class.php');

class PessoaJuridica extends Usuario {
    private $cnpj = null;
    private $telemarketing = false;
    private $telemarketingStatus;
    private static $pessoaJuridica = null;

    public function __construct(){}

    public static function getInstancePessoaJuridica() {
      if (empty(self::$pessoaJuridica)) {
        self::$pessoaJuridica = new PessoaJuridica();
      }
      return self::$pessoaJuridica;
    }

    public function getCnpj(){
      return $this->cnpj;
    }

    public function setCnpj($cnpj){
      $this->cnpj = $cnpj;
    }

    public function getTelemarketing(){
      return $this->telemarketing;
    }

    public function setTelemarketing($telemarketing){
      $this->telemarketing = $telemarketing;
    }

    public function getTelemarketingStatus(){
      return $this->telemarketingStatus;
    }

    public function setTelemarketingStatus($status){
      $this->telemarketingStatus = $status;
    }
}
