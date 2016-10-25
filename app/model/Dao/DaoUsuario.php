<?php
require_once ('conecta.php');
include_once ('app/model/Session.class.php');

class DaoUsuario {
  private $dataAutenticacao;
  private $dataUsuario;
  private $endereco;
  private $erro;

  public function __construct($usuario, $login){
    $this->dataUsuario = $usuario;
    $this->dataAutenticacao = $login;
  }

  public function __construct($endereco){
    $this->endereco = $endereco;
  }

  public function insertUsuario(){
    if(verificarEmailExist()){
          $usuario = "INSERT INTO usuario (id_usuario, email, senha) values (default,'{$this->dataAutenticacao->getEmail()}','{$this->dataAutenticacao->getPassword()}')";
          if(mysqli_query($conexao, $usuario)){
            if(verificarTelefonelExist()){
                $telefone = "INSERT INTO itens_bloqueio (operadora, telefone, status, data_cadastro, data_atualizacao, id_itens) values ('{$this->dataAutenticacao->getOperadora()}','{$this->dataAutenticacao->getTelefone()}', 0, defalt, defalt, default)";
                if(mysqli_query($conexao, $telefone)){
                  return true;
                } else {
                  $this->erro = "Error no Cadastro de telefone";
                  return false;
                }
            } else {
              return false;
            }
          } else {
            $this->erro = "Error no Cadastro de Login";
            return false;
          }
    } return false;
  }

  public function inserirEndereco(){
      $usuario = "INSERT INTO endereco (id, cep, rua, bairro, cidade, numero, complemento) values (default,'{$this->$endereco->getCep()}','{$this->$endereco->getRua()}','{$this->$endereco->getBairro()}','{$this->$endereco->getCidade()}','{$this->$endereco->getNumero()}','{$this->$endereco->getComplemento()}')";
      if(mysqli_query($conexao, $usuario)){
        return true;
      } else {
        $this->erro = "Error no Cadastro de Endereço";
        return false;
      }
  }

  public function verificarEmailExist(){
    $query =  "SELECT email FROM usuario WHERE email='{$this->dataAutenticacao->getEmail()}'";
    $resultado = mysqli_query($conexao, $query);
        if (!$resultado) {
          $this->erro = "Error: %s\n", mysqli_error($conexao);
          return false;
        }
        if (mysqli_num_rows($resultado) === 1) {
          $this->erro = "Email já Cadastrado no  Sistema";
          return false;
        }
      return true;
  }

  public function verificarCnpjExist(){
    $query =  "SELECT cnpj FROM passoa_juridica WHERE cnpj='{$this->dataEmpresa->getCnpj()}'";
    $resultado = mysqli_query($conexao, $query);
        if (!$resultado) {
          $this->erro = "Error: %s\n", mysqli_error($conexao);
          return false;
        }
        if (mysqli_num_rows($resultado) === 1) {
          $this->erro = "Cnpj já Cadastrado no  Sistema";
          return false;
        }
      return true;
  }

  public function verificarTelefonelExist(){
    $query =  "SELECT telefone FROM intes_bloqueio WHERE telefone='{$this->dataEmpresa->getTelefone()}'";
    $resultado = mysqli_query($conexao, $query);
        if (!$resultado) {
          $this->erro = "Error: %s\n", mysqli_error($conexao);
          return false;
        }
        if (mysqli_num_rows($resultado) === 1) {
          $this->erro = "Numero do telefone já existe no  Sistema";
          return false;
        }
      return true;
  }

  public function getErro(){
    return $this->erro;
  }
}
