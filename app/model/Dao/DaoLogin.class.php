<?php
    include ('app/model/Session.class.php');

    class DaoLogin {
        private $login;
        private $error;

        public function __construct($login) {
            $this->login = $login;
        }

        public function loginDb() {
            require_once ('conecta.php');
            $query = "SELECT id_usuario, login, senha FROM usuario WHERE login = '{$this->login->getEmail()}'";

            $result = mysqli_query($conexao, $query);

            if (!$result) {
              printf("Error: %s\n", mysqli_error($conexao));
            }

            if (mysqli_num_rows($result) === 1) {
              $row = mysqli_fetch_array($result);

                if ($this->login->getPassword() == $row['senha']) {
                    $session = new Session();
                    $session->setIdSession($row['id_usuario']);
                    $session->setNameSession($row['login']);
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
        }

        public function getErro(){
          return $this->error;
        }
    }
