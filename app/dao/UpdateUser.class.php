<?php

class UpdateUser extends  ConexaoDb {
  private static $updateUser = null;

  public static function getInstanceUpdateUser() {
    if (empty(self::$updateUser))
      return self::$updateUser = new UpdateUser();

    return self::$updateUser;
  }

  public function update($status, $id){
    var_dump("ola $status");
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

}
