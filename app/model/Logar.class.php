<?php

class Login {
      private $email;
      private $password;

      public function __construct() {

      }

      public function getPassword() {
        return $this->password;
      }

      public function getEmail() {
        return $this->email;
      }

      public function setPassword($password) {
        $this->password = $password;
      }

      public function setEmail($email) {
        $this->email = $email;
      }
}
