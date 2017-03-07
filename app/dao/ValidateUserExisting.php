<?php

class ValidateUserExisting extends ConexaoDb {
    private $erro;

    public function __construct(){ }

    public function verificarEmailExist($email) {
        try {
            $query =  "SELECT email FROM usuario WHERE email = :email";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":email",$email);
            $validar->execute();

            if ($validar->rowCount() === 1) {
                $this->erro = "Email não Disponível!";
                return false;
            } else {
                return true;
            }

        } catch (Exception $ex){
            $this->erro = "Exceção ao verificar Email!";
            return false;
        }
    }
    public function verificarCnpjExist($cnpj) {
        try {
            $query =  "SELECT cnpj FROM pessoa_juridica WHERE cnpj = :cnpj";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":cnpj", $cnpj);
            $validar->execute();

            if ($validar->rowCount() === 1) {
                $this->erro = "Cnpj ja se encontar cadastrado no Sistema!";
                return false;
            } else {
                return true;
            }
        } catch (Exception $ex){
            $this->erro = "Exceção ao Verificar Cnpj!";
            return false;
        }
    }
    public function validarCpfExist($cpf) {
        try {
            $query =  "SELECT cpf FROM pessoa_fisica WHERE cpf = :cpf";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":cpf", $cpf);
            $validar->execute();

            if ($validar->rowCount() === 1) {
              $this->erro = "Cpf não Disponível!";
              return false;
            } else {
              return true;
            }
        } catch (Exception $ex){
            $this->erro = "Exceção ao Verificar Cpf!";
            return false;
        }
    }

    public function verificarTelefonelExist($telefone) {
        try {
            $query =  "SELECT telefone_numero FROM telefone WHERE telefone_numero = :telefone_numero";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":telefone_numero", $telefone);
            $validar->execute();

            if ($validar->rowCount() === 1) {
                $this->erro = "Telefone ja se encontar cadastrado no Sistema!";
                return false;
            } else {
                return true;
            }
        } catch (Exception $ex){
            $this->erro = "Exceção ao verificar Telefone!";
            return false;
        }
    }

    public function verificarRgExist($rg) {
        try {
            $query =  "SELECT rg FROM pessoa_fisica WHERE rg = :rg";
            $validar = Parent::getInstanceConexao()->prepare($query);
            $validar->bindValue(":rg", $rg);
            $validar->execute();

            if ($validar->rowCount() === 1) {
                $this->erro = "Identidade ja se encontar cadastrado no Sistema!";
                return false;
            } else {
                return true;
            }
        } catch (Exception $ex){
            $this->erro = "Exceção ao verificar Identidade!";
            return false;
        }
    }

    public function erro() {
      echo "<span class='help is-danger ocultar'>$this->erro</span>";
    }
}
