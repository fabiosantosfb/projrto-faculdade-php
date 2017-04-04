<?php

class Session {
  private $id_session;
  private $type_session;
  private $token;
  private $INSTANCE_SESSION;

  public function getName($name) { return session_name($name); }
  public function getId() {
      $_SESSION['id-user-session'] = session_id();
  }
  public function start() {
    session_save_path('app/sessions');
    ini_set('session.gc_probability', 1);
    return session_start();
  }
  public function gerarId() { return session_regenerate_id(); }
  public function destroy() { return session_destroy(); }

  public function token(){
      if(!isset($_SESSION['token-user-session'])){
        $token = md5(uniqid(rand(),true));
        $_SESSION['token-user-session'] = Bcrypt::hash($token);
        $_SESSION['token-user-agent'] = Bcrypt::hash('user'.$_SERVER['HTTP_USER_AGENT']);
        $_SESSION['token-user-ip'] = Bcrypt::hash('user'.$_SERVER['REMOTE_ADDR']);
      }
  }
}
