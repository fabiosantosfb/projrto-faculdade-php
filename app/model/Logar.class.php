<?php

class Login {
      private $idb;
      private $email;
      private $password;
      private $type;
      private static $login = null;

      public function __construct() {
      }

      public static function getInstanceLogin() {
        if (empty(self::$login)) {
          self::$login = new Login();
        }
        return self::$login;
      }

      public function getPassword() {
        return $this->password;
      }

      public function getEmail() {
        return $this->email;
      }

      public function getId() {
        return $this->id;
      }

      public function getType() {
        return $this->type;
      }

      public function setType($type) {
        $this->type = $type;
      }

      public function setPassword($password) {
        $this->password = $password;
      }

      public function setEmail($email) {
        $this->email = $email;
      }

      public function setId($id) {
        return $this->id = $id;
      }
}
