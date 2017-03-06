<?php
//require_once ('app/model/Conexao.class.php');

class DaoUsuario extends ConexaoDb {
    private $dataAutenticacao;
    private $dataUsuario;
    private $dataEndereco;
    private $erro;
    private $fone;
    private $validarUser;
    private $validarDoc;
    private $validarTel;
    private $validarEnd;
    private $validarTlmk;

    public function __construct($usuario, $login, $endereco, $fone){
        $this->dataUsuario = $usuario;
        $this->dataAutenticacao = $login;
        $this->dataEndereco = $endereco;
        $this->fone = $fone;
    }

    public function verificarEmailExist() {
        try {
            $query =  "SELECT email FROM usuario WHERE email = :email";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":email",$this->dataAutenticacao->getEmail());
            $validar->execute();
            if ($validar->rowCount() === 1) {
                $this->erro = "Email não Disponível!";
                return false;
            } else {
                try {
                    $usuario = "INSERT INTO usuario (id_usuario, email, senha, nome, type, cep, rua, bairro, cidade, numero, complemento, data_cadastro, data_atualizacao) values (default, :email, :senha, :nome, :type, :cep, :rua, :bairro, :cidade, :numero, :complemento, default, default)";
                    $this->validarUser = Parent::getInstanceConexao()->prepare($usuario);
                    $this->validarUser->bindValue(":email",$this->dataAutenticacao->getEmail());
                    $this->validarUser->bindValue(":senha",$this->dataAutenticacao->getPassword());
                    $this->validarUser->bindValue(":nome",$this->dataUsuario->getNome());
                    $this->validarUser->bindValue(":type",$this->dataAutenticacao->getType());
                    $this->validarUser->bindValue(":cep", $this->dataEndereco->getCep());
                    $this->validarUser->bindValue(":rua", $this->dataEndereco->getRua());
                    $this->validarUser->bindValue(":bairro", $this->dataEndereco->getBairro());
                    $this->validarUser->bindValue(":cidade", $this->dataEndereco->getCidade());
                    $this->validarUser->bindValue(":numero", $this->dataEndereco->getNumero());
                    $this->validarUser->bindValue(":complemento", $this->dataEndereco->getComplemento());

                    $this->validarUser->execute();
                    return true;
                } catch (Exception $ex){
                    $this->erro = "Exceção ao inserir Ususario!";
                    echo $this->erro.' - '.$ex->getMessage();
                    return false;
                }
            }
        } catch (Exception $ex){
            $this->erro = "Exceção ao verificar Email!";
            echo $this->erro.' - '.$ex;
            return false;
        }
    }
    public function verificarCnpjExist() {
        try {
            $query =  "SELECT cnpj FROM pessoa_juridica WHERE cnpj = :cnpj";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":cnpj", $this->dataUsuario->getCnpj());
            $validar->execute();
            if ($validar->rowCount() === 1) {
                $this->erro = "Cnpj ja se encontar cadastrado no Sistema!";
                return false;
            } else {
                try {
                    $pessoaJ = "INSERT INTO pessoa_juridica (usuario_id_usuario, cnpj, status_telemarketing) values (LAST_INSERT_ID(), :cnpj, 0)";
                    $this->validarDoc = Parent::getInstanceConexao()->prepare($pessoaJ);
                    $this->validarDoc->bindValue(":cnpj", $this->dataUsuario->getCnpj());
                    $this->validarDoc->execute();
                    return true;
                } catch (Exception $ex){
                    $this->erro = "Exceção ao Inserir Cnpj!";
                    echo $this->erro.' - '.$ex;

                    $sql = "DELETE FROM usuario WHERE id_usuario=LAST_INSERT_ID()";
                    $this->validarUser = Parent::getInstanceConexao()->prepare($sql);
                    $this->validarUser->execute();

                    return false;
                }
            }
        } catch (Exception $ex){
            $this->erro = "Exceção ao Verificar Cnpj!";
            echo $this->erro.' - '.$ex;
            return false;
        }
    }
    public function verificarCpfExist() {
        try {
            $query =  "SELECT cpf FROM pessoa_fisica WHERE cpf = :cpf";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":cpf", $this->dataUsuario->getCpf());
            $validar->execute();
            if ($validar->rowCount() === 1) {
                $this->erro = "Cpf ja se encontar cadastrado no Sistema!";
                return false;
            } else {
                try {
                    $pessoaF = "INSERT INTO pessoa_fisica (usuario_id_usuario, cpf, rg, uf, data_expedicao, orgao_expedidor) values (LAST_INSERT_ID(), :cpf, :rg, :uf, :data_expedicao, :orgao_expedidor)";
                    $this->validarDoc = Parent::getInstanceConexao()->prepare($pessoaF);
                    $this->validarDoc->bindValue(":cpf", $this->dataUsuario->getCpf());
                    $this->validarDoc->bindValue(":rg", $this->dataUsuario->getRg());
                    $this->validarDoc->bindValue(":uf", $this->dataUsuario->getUf());
                    $this->validarDoc->bindValue(":data_expedicao", $this->dataUsuario->getDataExpedicao());
                    $this->validarDoc->bindValue(":orgao_expedidor", $this->dataUsuario->getOrgExpedidor());
                    $this->validarDoc->execute();
                    return true;
                } catch (Exception $ex){
                    $this->erro = "Exceção ao Inserir Cpf!";
                    echo $this->erro.' - '.$ex;

                    $sql = "DELETE FROM usuario WHERE id_usuario=LAST_INSERT_ID()";
                    $this->validarUser = Parent::getInstanceConexao()->prepare($sql);
                    $this->validarUser->execute();

                    return false;
                }
            }
        } catch (Exception $ex){
            $this->erro = "Exceção ao Verificar Cpf!";
            echo $this->erro.' - '.$ex;
            return false;
        }
    }

    public function verificarTelefonelExist($tipoCadastro) {
        try {
            $query =  "SELECT telefone_numero FROM telefone WHERE telefone_numero = :telefone_numero";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":telefone_numero", $this->fone->getTelefone());
            $validar->execute();
            if ($validar->rowCount() === 1) {
                echo $this->erro = "Telefone ja se encontar cadastrado no Sistema!";
                return false;
            } else {
                try {
                    $telefone = "INSERT INTO telefone (id_telefone, usuario_id_usuario, status_bloqueio, telefone_numero, data_cadastro, data_atualizacao) values (default, LAST_INSERT_ID(), 0, :telefone, default, default)";
                    $this->validarTel = Parent::getInstanceConexao()->prepare($telefone);
                    $this->validarTel->bindValue(":telefone", $this->fone->getTelefone());
                    $this->validarTel->execute();
                    return true;
                } catch (Exception $ex){
                    $this->erro = "Exceção ao inserir Telfone!";
                    echo $this->erro.' - '.$ex;

                    $sql = "DELETE FROM usuario WHERE id_usuario=LAST_INSERT_ID()";
                    $this->validarUser = Parent::getInstanceConexao()->prepare($sql);
                    $this->validarUser->execute();

                    if($tipoCadastro == "pessoajuridica") {
                        $sql = "DELETE FROM pessoa_juridica WHERE usuario_id_usuario=LAST_INSERT_ID()";
                        $this->validarUser = Parent::getInstanceConexao()->prepare($sql);
                        $this->validarUser->execute();
                    } else {
                        $sql = "DELETE FROM pessoa_fisica WHERE usuario_id_usuario=LAST_INSERT_ID()";
                        $this->validarUser = Parent::getInstanceConexao()->prepare($sql);
                        $this->validarUser->execute();
                    }

                    return false;
                }
            }
        } catch (Exception $ex){
            $this->erro = "Exceção ao verificar Telefone!";
            echo $this->erro.' - '.$ex;
            return false;
        }
    }
}
