<?php

class PessoaJuridica extends Usuario {
    private $cnpj;
    private static $pessoaJuridica;

    public function __construct(){}

    public static function getInstancePessoaJuridica() {
      if (!isset(self::$pessoaJuridica)) {
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
}
