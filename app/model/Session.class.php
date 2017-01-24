<?php

class Session {
  private $id_session;
  private $type_session;
  private static $session = null;

  public static function getInstanceSession() {
    if(!isset(self::$session)) {
      self::$session = new Session();
    }
    return self::$session;
  }

  public function getIdSession() {
    return $this->id_session;
  }

  public function getTypeSession() {
    return $this->type_session;
  }

  public function setIdSession($id) {
    $this->id_session = $id;
    $_SESSION['id']  = $id;
  }

  public function setTypeSession($type) {
    $this->type_session = $type;
    $_SESSION['type_user'] = $type;
  }

  public function destroiSession() {
    //unset ($_SESSION['id']);
	  //unset ($_SESSION['type_user']);
    //session_destroy();
  }

  public function statusSession() {
    return session_status();
  }
  public function gerarSession($generetion) {
    session_regenerate_id($generetion);
  }
}
