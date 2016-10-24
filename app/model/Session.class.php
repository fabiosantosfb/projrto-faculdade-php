<?php

class Session {
  private $id_session;
  private $name_session;

  public function __construct() {
  }

  public function getIdSession() {
    return $this->id_session;
  }

  public function getNameSession() {
    return $this->name_session;
  }

  public function setIdSession($id) {
    $this->id_session = $id;
  }

  public function setNameSession($name) {
    $this->name_session = $name;
  }

  public function destroiSession() {
    session_destroy();
  }

  public function startSession() {
     session_start();
  }
  public function statusSession() {
    return session_status();
  }
  public function gerarSession($generetion) {
    session_regenerate_id($generetion);
    $_SESSION['user_name'] = $this->name_session;
    $_SESSION['user_id'] = $this->id_session;
  }
}
