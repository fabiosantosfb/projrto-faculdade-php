<?php

class PessoaJuridica extends Usuario {
    private $cnpj;

    public function __construct($cnpj){
      $this->cnpj = $cnpj;
    }

    public function getCnpj(){
      return $this->cnpj;
    }

    public function setCnpj($cnpj){
      $this->cnpj = $cnpj;
    }
}
