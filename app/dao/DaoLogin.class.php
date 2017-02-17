<?php
    require_once('app/core/Bcrypt.php');

    class DaoLogin extends ConexaoDb {
        private $login;
        private $erro;

        public function __construct($login) {
            $this->login = $login;
        }

        public function loginDb() {
            try {
                $query = "SELECT * FROM usuario WHERE email = :_email";

                $validar = Parent::getInstanceConexao()->prepare($query);
                $validar->bindValue(":_email",$this->login->getEmail());
    		        $validar->execute();

                if ($validar->rowCount() === 1) {
                  	$row = $validar->fetch(PDO::FETCH_ASSOC);

                    $pwd = $this->login->getPassword();
                    $hash = $row['senha'];

                    if (Bcrypt::check($pwd, $hash)) {
                        $_SESSION['id'] = $row['id_usuario'];
                        $_SESSION['type_user'] = $row['type'];

                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } catch (ErrorException $ex) {
                return false;
            }
        }
    }
