<?php

class ValidateUserExisting extends ConexaoDb {
    private $messages_errors = array();
    private static $error;

    public function __construct(){ $this->messages_erros_insert(); }

    protected function messages_erros_insert() {
      $this->messages_errors = array(
        'validar_email'            => 'Exceção ao verificar Email!',
        'validar_telefone'         => 'Exceção ao verificar Telefone!',
        'validar_cnpj'             => 'Exceção ao verificar Cnpj!',
        'validar_cpf'              => 'Exceção ao verificar Cpf!',
        'validar_rg'               => 'Exceção ao verificar Identidade!',
        'email_indisponivel'       => 'Email já Existe no Sistema!',
        'telefone_indisponivel'    => 'Telefone já Existe no Sistema!',
        'cnpj_indisponivel'        => 'Cnpj já Existe no Sistema!',
        'cpf_indisponivel'         => 'Cpfjá Existe no Sistema!',
        'rg_indisponivel'          => 'Identidade já Existe no Sistema!'
      );
    }

    public function validateEmailExist($email) {
        try {
            $validar = Parent::getInstanceConexao()->prepare("SELECT email FROM usuario WHERE email = :email");
            $validar->bindValue(":email",$email);
            $validar->execute();

            if ($validar->rowCount() === 1) {
                $this->setError($this->messages_errors['email_indisponivel']);
                return false;
            } else {
                return true;
            }
        } catch (Exception $ex){
            return $this->messages_errors['validar_email'];
        }
    }

    public function validateCnpjExist($cnpj) {
        try {
            $validar = Parent::getInstanceConexao()->prepare("SELECT cnpj FROM pessoa_juridica WHERE cnpj = :cnpj");
            $validar->bindValue(":cnpj", $cnpj);
            $validar->execute();

            if ($validar->rowCount() === 1) {
                $this->setError($this->messages_errors['cnpj_indisponivel']);
                return false;
            } else {
                return true;
            }
        } catch (Exception $ex){
            return $this->messages_errors['validar_cnpj'];
        }
    }

    public function validateCpfExist($cpf) {
        try {
            $query =  "SELECT cpf FROM pessoa_fisica WHERE cpf = :cpf";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":cpf", $cpf);
            $validar->execute();

            if ($validar->rowCount() === 1) {
                $this->setError($this->messages_errors['cpf_indisponivel']);
                return false;
            } else {
                return true;
            }
        } catch (Exception $ex){
            return $this->messages_errors['validar_cpf'];
        }
    }

    public function validateTelefoneExist($telefone) {
        try {
            $query =  "SELECT telefone_numero FROM telefone WHERE telefone_numero = :telefone_numero";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":telefone_numero", $telefone);
            $validar->execute();

            if ($validar->rowCount() === 1) {
                $this->setError($this->messages_errors['telefone_indisponivel']);
                return false;
            } else {
                return true;
            }
        } catch (Exception $ex){
            return $this->messages_errors['validar_telefone'];
        }
    }

    public function validateRgExist($rg) {
        try {
            $query =  "SELECT rg FROM pessoa_fisica WHERE rg = :rg";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":rg", $rg);
            $validar->execute();

            if ($validar->rowCount() === 1) {
                $this->setError($this->messages_errors['rg_indisponivel']);
                return false;
            } else {
                return true;
            }
        } catch (Exception $ex){
            return $this->messages_errors['validar_rg'];
        }
    }

    public function setError($message) {
      self::$error = "<span class='help is-danger '>$message</span><br>";
    }

    public function getError() {
      echo self::$error;
    }
}
