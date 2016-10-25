<?php
include ('app/model/Usuario.class.php');

class PessoaJuridica extends Usuario {
    private $cnpj;

    public function __construct($cnpj, $nome){
      Parent::__construct($nome);
      $this->cnpj = $cnpj;
    }

    public function getCnpj(){
      return $this->cnpj;
    }

    public function setCnpj($cnpj){
      $this->cnpj = $cnpj;
    }
}
