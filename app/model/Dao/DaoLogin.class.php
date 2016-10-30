<?php
    include ('app/model/Session.class.php');
    require_once ('conecta.php');

    class DaoLogin extends ConexaoDb {
        private $login;
        private $error;

        public function __construct($login) {
            $this->login = $login;
        }

        public function loginDb() {
            try {
                $query = "SELECT id_usuario, email, senha FROM usuario WHERE email = :_email";

                $validar = Parent::getInstance()->prepare($query);
                $validar->bindValue(":_email",$this->login->getEmail());
    		        $validar->execute();

                if ($validar->rowCount() === 1) {

                  	$row = $validar->fetch(PDO::FETCH_ASSOC);
                    if ($this->login->getPassword() == $row['senha']) {

                        $session = new Session();
                        $this->login->setId($row['id_usuario']);
                        $session->setIdSession($row['id_usuario']);
                        $session->setNameSession($row['email']);
                        $session->gerarSession(true);
                        return true;
                    } else {
                        $this->error = "Senha invalida";
                        return false;
                    }
                } else {
                    $this->error = "Email Não Encontrado";
                    return false;
                }
            } catch (ErrorException $ex) {
                $this->error = "Exessão no Login $ex";
                return false;
            }
        }

        public function getErro(){
          return $this->error;
        }
    }
