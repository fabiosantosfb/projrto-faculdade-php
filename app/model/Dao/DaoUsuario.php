<?php
require_once ('conecta.php');
include_once ('app/model/Session.class.php');

class DaoUsuario {
  private $dataAutenticacao;
  private $dataEmpresa;
  private $erro;

  public function __construct($empresa, $login){
    $this->dataEmpresa = $empresa;
    $this->dataAutenticacao = $login;
  }

  public function insertEmpresa(){
    if(verificarEmailExist()){
      if(verificarCnpjlExist()){
          $usuario = "INSERT INTO usuario (id_usuario, email, senha) values (default,'{$this->dataAutenticacao->getEmail()}','{$this->dataAutenticacao->getPassword()}')";
          if(mysqli_query($conexao, $usuario)){
            $pessoaJuridica = "INSERT INTO pessoa_juridica (id_pessoa_juridica, cnpj, nome) values (default,'{$this->dataAutenticacao->getCnpj()}','{$this->dataAutenticacao->getRazaoSocial()}')";
            if(mysqli_query($conexao, $pessoaJuridica)){
              $telefone = "INSERT INTO telefone_bloqueio (id, telefone, operadora, data_modificacao, data_auteracao, status_bloqueio) values (default,'{$this->dataAutenticacao->getTelefone()}','{$this->dataAutenticacao->getOperadora()}', defalt, defalt, 0)";
                if(mysqli_query($conexao, $telefone)){
                    $telemarketing = "INSERT INTO telemarketing (id_pessoa_juridica, status) values (default,0)";
                      if(mysqli_query($conexao, $telemarketing)){
                        return true;
                      } else {
                        $this->erro = "Error no Cadastro de opção Telemarketing";
                        return false;
                      }
                } else {
                  $this->erro = "Error no Cadastro de Telefone";
                  return false;
                }
            } else {
              $this->erro = "Error no Cadastro de pessoa Juridica";
              return false;
            }
          } else {
            $this->erro = "Error no Cadastro de Login";
            return false;
          }
      } return false;
    } return false;
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

  public function getErro(){
    return $this->erro;
  }
}
