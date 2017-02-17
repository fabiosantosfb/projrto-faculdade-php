<?php
    require_once('app/core/Bcrypt.php');

    class DaoLogin extends ConexaoDb {
        private $login;
        private $erro;
        //private static $session;

        public function __construct($login) {
            $this->login = $login;
            //self::$session = Session::getInstanceSession();
        }

        public function loginDb() {
            try {
                $query = "SELECT * FROM usuario WHERE email = :_email";

                $validar = Parent::getInstanceConexao()->prepare($query);
                $validar->bindValue(":_email",$this->login->getEmail());
    		        $validar->execute();

                if ($validar->rowCount() === 1) {
                  	$row = $validar->fetch(PDO::FETCH_ASSOC);                
                    if ($this->login->getPassword() == $row['senha']) {
                        $_SESSION['id'] = $row['id_usuario'];
                        $_SESSION['type_user'] = $row['type'];

                        //self::$session->gerarSession(true);
                        //self::$session->setIdSession($row['id_usuario']);
                        //self::$session->setTypeSession($row['type']);

                        return true;
                    } else {
                        $this->erro = "Senha invalida";
                        return false;
                    }
                } else {
                    $this->erro = "Email Não Encontrado";
                    return false;
                }
            } catch (ErrorException $ex) {
                $this->erro = "Exessão no Login";
                return false;
            }
        }

        public function getErro() {
          return $this->error;
        }
    }
