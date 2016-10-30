<?php
include_once ('app/model/Session.class.php');

class DaoUsuario {
  private $dataAutenticacao;
  private $dataUsuario;
  private $dataEndereco;
  private $erro;

  public function __construct($usuario, $login, $endereco){
    $this->dataUsuario = $usuario;
    $this->dataAutenticacao = $login;
    $this->dataEndereco = $endereco;
  }

  public function insertUsuario($conexao){
    if($this->verificarEmailExist($conexao)){
          $usuario = "INSERT INTO usuario (email, senha) values ('{$this->dataAutenticacao->getEmail()}','{$this->dataAutenticacao->getPassword()}')";
          if($result = mysqli_query($conexao, $usuario)){
            if($this->verificarTelefonelExist($conexao)){
                $telefone = "INSERT INTO telefone (status_bloqueio, data_cadastro, data_atualizacao, telefone_numero, usuario_id_usuario) values (0, default, default,'{$this->dataAutenticacao->getTelefone()}',LAST_INSERT_ID() )";
                if($result = mysqli_query($conexao, $telefone)){
                    $end = "INSERT INTO endereco (cep, rua, bairro, cidade, numero, complemento, usuario_id_usuario) values ('{$this->dataEndereco->getCep()}','{$this->dataEndereco->getRua()}','{$this->dataEndereco->getBairro()}','{$this->dataEndereco->getCidade()}','{$this->dataEndereco->getNumero()}','{$this->dataEndereco->getComplemento()}',LAST_INSERT_ID())";
                    if($result = mysqli_query($conexao, $end)){
                        $end = "INSERT INTO pessoa_juridica (nome, cnpj, usuario_id_usuario) values ('{$this->dataUsuario->getNome()}','{$this->dataUsuario->getCnpj()}',LAST_INSERT_ID())";
                        if($result = mysqli_query($conexao, $end)){
                          return $result;
                        } else {
                          $this->erro = "Error no Cadastro de Pessoa juridica";
                          echo "Error: $this->erro %s\n", mysqli_error($conexao);
                          return $result;
                        }
                    } else {
                      $this->erro = "Error no Cadastro de Endereço";
                      echo "Error: $this->erro %s\n", mysqli_error($conexao);
                      return $result;
                    }
                } else {
                  $this->erro = "Error no Cadastro de telefone";
                  echo "Error no telefone: %s\n", mysqli_error($conexao);
                  return $result;
                }
            } else {
              echo "Error vefificar telefone: %s\n", mysqli_error($conexao);
              return $result;
            }
          } else {
            $this->erro = "Error no Cadastro de Login";
            echo "Error inserir usuario: %s\n", mysqli_error($conexao);
            return $result;
          }
    } return false;
  }

  public function verificarEmailExist($conexao) {
    $query =  "SELECT email FROM usuario WHERE email='{$this->dataAutenticacao->getEmail()}'";
    $resultado = mysqli_query($conexao, $query);
        if (!$resultado) {
        //  $this->erro = "Error: %s\n", mysqli_error($conexao);
          echo "Error conectar email: %s\n", mysqli_error($conexao);

          return $resultado;
        }
        if (mysqli_num_rows($resultado) === 1) {
          //$this->erro = "Email já Cadastrado no  Sistema";
          echo "Error Email existe: %s\n", mysqli_error($conexao);

          return $resultado;
        }
      return true;
  }

  public function verificarCnpjExist($conexao) {
    $query =  "SELECT cnpj FROM passoa_juridica WHERE cnpj='{$this->dataEmpresa->getCnpj()}'";
    $resultado = mysqli_query($conexao, $query);
        if (!$resultado) {
          //$this->erro = "Error: %s\n", mysqli_error($conexao);
          echo "Error conectar cpf: %s\n", mysqli_error($conexao);

          return $resultado;
        }
        if (mysqli_num_rows($resultado) === 1) {
          //$this->erro = "Cnpj já Cadastrado no  Sistema";
          echo "Error existe cpf: %s\n", mysqli_error($conexao);
          return $resultado;
        }
      return true;
  }

  public function verificarTelefonelExist($conexao) {
    $query =  "SELECT telefone_numero FROM telefone WHERE telefone_numero = '{$this->dataAutenticacao->getTelefone()}'";
    $resultado = mysqli_query($conexao, $query);
        if (!$resultado) {
          //$this->erro = "Error: %s\n", mysqli_error($conexao);
          echo "Error funcao verifica telelefone: %s\n", mysqli_error($conexao);
          return $resultado;
        }
        if (mysqli_num_rows($resultado) === 1) {
          //$this->erro = "Numero do telefone já existe no  Sistema";
          echo "Telefone existe: %s\n", mysqli_error($conexao);
          return $resultado;
        }
      return true;
  }

  public function getErro() {
    return $this->erro;
  }
}
