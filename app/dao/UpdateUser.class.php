<?php

class UpdateUser extends  ConexaoDb {
  private static $updateUser = null;

  public static function getInstanceUpdateUser() {
    if (empty(self::$updateUser))
      return self::$updateUser = new UpdateUser();

    return self::$updateUser;
  }

  public function update($status, $id){
    try{
        $update = "UPDATE telemarketing SET status_ativo = :status  WHERE pessoa_juridica_usuario_id_usuario = :id";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":status",$status);
        $validar->bindValue(":id",$id);
        $validar->execute();

    } catch (Exception $tele){
      $this->erro = "EXCEÇÃO AO ATUALUZAR TELEMARKETING!";
      return $tele->getMessage();
    }
  }

  public function updTelefone($telefone, $id){
    try{
        $update = "UPDATE telefone SET telefone_numero = :telefone  WHERE usuario_id_usuario = :id";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":telefone",$telefone);
        $validar->bindValue(":id",$id);
        $validar->execute();

    } catch (Exception $tele){
      $this->erro = "EXCEÇÃO AO ATUALUZAR TELEFONE!";
      return $tele->getMessage();
    }
  }

}
