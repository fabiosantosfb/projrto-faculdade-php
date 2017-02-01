<?php

class ConexaoDb {
  private static $SQL = "mysql:host=localhost;dbname=proconpb_naopertube";
  private static $USER = "root";
  private static $PWD = "pr0conp3";

  private static $conexao = null;

    public function __construct() {
    }

    public static function getInstanceConexao() {
        if (empty(self::$conexao)) {
            try{
               self::$conexao = new PDO(self::$SQL, self::$USER, self::$PWD);
               self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOexception $e) {
               echo $e->getmessage();
            }
        }
        return self::$conexao;
    }
}
