<?php

class Listar extends ConexaoDb {
  private static $list = null;

  public function __construct(){}

  public static function getInstanceListar() {
    if (empty(self::$list)) {
      self::$list = new Listar();
    }
    return self::$list;
  }

  public function listarPessoa(){
    try{
        $queryPf = "SELECT * FROM pessoa_fisica INNER JOIN telefone ON pessoa_fisica.usuario_id_usuario = telefone.usuario_id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryPf);
        $validar->execute();

        return $validar->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $pF){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
      return $pF->getMessage();
    }
  }

  public function listarPessoaJuridica(){
    try{
        $queryPf = "SELECT * FROM pessoa_juridica INNER JOIN telefone ON pessoa_juridica.usuario_id_usuario = telefone.usuario_id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryPf);
        $validar->execute();

        return $validar->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $pF){
      $this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
      return $pF->getMessage();
    }
  }

  public function listarTelemarketing(){
    try{
        $queryTm = "SELECT * FROM pessoa_juridica JOIN telemarketing ON pessoa_juridica.usuario_id_usuario =  telemarketing.pessoa_juridica_usuario_id_usuario JOIN telefone ON pessoa_juridica.usuario_id_usuario =  telefone.usuario_id_usuario";
        $validar = Parent::getInstanceConexao()->prepare($queryTm);
        $validar->execute();

        return $validar->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $pF){
      $this->erro = "EXCEÇÃO NA CONSULTA DE TELEMARKETING!";
        return $pF->getMessage();
    }
  }

  public function listarTelefonePf(){
    try{
        $listagemFone = "SELECT * FROM telefone JOIN pessoa_fisica ON pessoa_fisica.usuario_id_usuario = telefone.usuario_id_usuario WHERE telefone.status_bloqueio = 0";
        $validar = Parent::getInstanceConexao()->prepare($listagemFone);
        $validar->execute();

        return $validar->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $pF){
      $this->erro = "EXCEÇÃO NA CONSULTA DE TELEFONE PARA BLOQUEIO!";
        return $pF->getMessage();
    }
  }

  public function listarTelefonePj(){
    try{
        //$listagemFone = "SELECT * FROM telefone JOIN pessoa_juridica ON pessoa_juridica.usuario_id_usuario = telefone.usuario_id_usuario JOIN telemarketing  WHERE telefone.status_bloqueio = 0 And pessoa_juridica.usuario_id_usuario != telemarketing.pessoa_juridica_usuario_id_usuario";

        $listagemFone = "SELECT nome FROM telefone JOIN pessoa_juridica ON pessoa_juridica.usuario_id_usuario = telefone.usuario_id_usuario RIGHT JOIN usuario ON usuario.type <> 'tlm'  WHERE telefone.status_bloqueio = 0";

        $validar = Parent::getInstanceConexao()->prepare($listagemFone);
        $validar->execute();

        return $validar->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $pF){
      $this->erro = "EXCEÇÃO NA CONSULTA DE TELEFONE PARA BLOQUEIO!";
        return $pF->getMessage();
    }
  }

}
