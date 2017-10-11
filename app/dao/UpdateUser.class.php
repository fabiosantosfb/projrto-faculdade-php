<?php

class UpdateUser extends  ConexaoDb {
  private static $updateUser = null;

  public function __construct(){

  }

  // public static function getInstanceUpdateUser() {
  //   if (empty(self::$updateUser))
  //     return self::$updateUser = new UpdateUser();
  //
  //   return self::$updateUser;
  // }

  public function update($status, $id){
    try{
        $update = "UPDATE pessoa_juridica SET status_telemarketing = :status  WHERE id_usuario = :id";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":status",$status);
        $validar->bindValue(":id",$id);
        $validar->execute();

    } catch (Exception $tlmk){
      echo '<span class="help is-danger ocultar">Erro '.$tlmk->getMessage().'</span>';
      return false;
    }
  }

  public function token($token, $id, $identificador){
    try{
        $update = "UPDATE pessoa_juridica SET token = :token, identificador = :identificador WHERE id_usuario = :id";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":id",$id);
        $validar->bindValue(":token",$token);
        $validar->bindValue(":identificador",$identificador);
        $validar->execute();

    } catch (Exception $tlmk){
      echo '<span class="help is-danger ocultar">Erro '.$tlmk->getMessage().'</span>';
      return false;
    }
  }

  public function updTelefone($telefone, $id, $id_telefone){
    try{
        $update = "UPDATE telefone SET telefone_numero = :telefone  WHERE id_usuario = :id AND id_telefone = :id_telefone";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":telefone",$telefone);
        $validar->bindValue(":id",$id);
        $validar->bindValue(":id_telefone", $id_telefone);

        if($validar->execute()){
          echo '<span class="help np-is-primary ocultar">Atualizado com sucesso!</span>';
        }
    } catch (Exception $tele){
      echo '<span class="help is-danger ocultar">Erro Atualizar Telefone: '.$tele->getMessage().'</span>';
      return false;
    }
  }

  public function addTelefoneDataBase($telefone, $usuario){
    try {
        $data = Parent::getInstanceConexao();
        $data->beginTransaction();
        $validarTel = $data->prepare("INSERT INTO telefone VALUES (default, :id, 0, :telefone, default, default)");

        $validarTel->bindValue(":telefone", $telefone);
        $validarTel->bindValue(":id", $usuario);
        $validarTel->execute();

        if($data->commit()){
            echo '<span class="help np-is-primary ocultar">Adicionar telefone com sucesso!</span>';
        } else {
            echo '<span class="help np-is-primary ocultar">Erro Adicionar telefone com sucesso!</span>';
        }
    } catch (Exception $ex){
        echo '<span class="help is-danger ocultar">Erro Adicionar Telefone: '.$ex->getMessage().'</span>';
        return false;
    }
  }

  public function deleteTelefone($usuario, $id_telefone){
    try{
        $db = Parent::getInstanceConexao();
        $delete = "DELETE FROM telefone  WHERE id_telefone = :id_telefone AND id_usuario = :id";
        $validar = $db->prepare($delete);
        $validar->bindValue(":id_telefone", $id_telefone);
        $validar->bindValue(":id", $usuario);
        if($validar->execute()){
            return true;
        }
    } catch (Exception $tele){
      echo '<span class="help is-danger ocultar">Erro ao Remover Telefone: '.$tele->getMessage().'</span>';
      return false;
    }
  }

  public function upDocumento($nome, $usuario, $cpf, $rg, $dataexpedicao, $orgao_expedidor, $uf){
    try{
        $update = "UPDATE proconpb_naoperturbe_v2.pessoa_fisica SET cpf=:cpf, uf=:uf, rg=:rg, data_expedicao=:data, orgao_expedidor=:org WHERE id_usuario=:id";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":cpf", $cpf);
        $validar->bindValue(":rg", $rg);
        $validar->bindValue(":org", $orgao_expedidor);
        $validar->bindValue(":uf", $uf);
        $validar->bindValue(":data", $dataexpedicao);
        $validar->bindValue(":id", $usuario);
        if($validar->execute()){
            try{
                $update = "UPDATE proconpb_naoperturbe_v2.usuario SET nome=:nome WHERE id_usuario=:id";
                $validar = Parent::getInstanceConexao()->prepare($update);
                $validar->bindValue(":nome", $nome);
                $validar->bindValue(":id", $usuario);

                if($validar->execute()){
                    echo '<span class="help is-primary ocultar">Atualizado com sucesso!</span>';
                }
            } catch (Exception $doc){
              echo '<span class="help is-danger ocultar">Erro Atualizar Documento: '.$doc->getMessage().'</span>';
              return false;
            }
        }
    } catch (Exception $doc){
      echo '<span class="help is-danger ocultar">Erro Atualizar Documento: '.$doc->getMessage().'</span>';
      return false;
    }
  }

  public function upDocumentoPj($nome, $usuario, $cnpj){
    try{
        $update = "UPDATE proconpb_naoperturbe_v2.pessoa_juridica SET cnpj=:cnpj WHERE id_usuario=:id";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":cnpj", $cnpj);
        $validar->bindValue(":id", $usuario);
        if($validar->execute()){
            try{
                $update = "UPDATE proconpb_naoperturbe_v2.usuario SET nome=:nome WHERE id_usuario=:id";
                $validar = Parent::getInstanceConexao()->prepare($update);
                $validar->bindValue(":nome", $nome);
                $validar->bindValue(":id", $usuario);

                if($validar->execute()){
                  echo '<span class="help is-primary ocultar">Atualizado com sucesso!</span>';
                }

            } catch (Exception $doc){
              echo '<span class="help is-danger ocultar">Erro Atualizar Documento: '.$doc->getMessage().'</span>';
              return false;
            }
        }

    } catch (Exception $doc){
      echo '<span class="help is-danger ocultar">Erro Atualizar Documento: '.$doc->getMessage().'</span>';
      return false;
    }
  }

  public function upAddress($cep, $cidade, $rua, $bairro, $numero, $complemento, $id_endereco){
    try{
        $update = "UPDATE proconpb_naoperturbe_v2.usuario SET cep=:cep, rua=:rua, bairro=:bairro, cidade=:cidade, numero=:numero, complemento=:complemento WHERE id_usuario=:id_endereco";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":cep", $cep);
        $validar->bindValue(":rua", $rua);
        $validar->bindValue(":bairro", $bairro);
        $validar->bindValue(":cidade", $cidade);
        $validar->bindValue(":numero", $numero);
        $validar->bindValue(":complemento", $complemento);
        $validar->bindValue(":id_endereco", $id_endereco);

        if($validar->execute()){
            echo '<span class="help is-primary ocultar">Atualizado com sucesso!</span>';
        }

    } catch (Exception $end){
      //$this->erro = "EXCEÇÃO AO ATUALUZAR DOCUMENTO!";
      echo '<span class="help is-danger ocultar">Erro Atualizar Endereço: '.$end->getMessage().'</span>';
      return false;
    }
  }

  public function upPassword($pwd, $email, $id){

    try{
        $update = "UPDATE proconpb_naoperturbe_v2.usuario SET email=:email, senha=:senha WHERE id_usuario=:id";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":email", $email);
        $validar->bindValue(":senha", $pwd);
        $validar->bindValue(":id", $id);
        if($validar->execute()){
          return true;
          echo '<span class="help is-primary ocultar">Atualizado com sucesso!</span>';
      }
      return false;
      echo '<span class="help is-danger ocultar">Erro Atualizar Login:</span>';

    } catch (Exception $pwd){
      //$this->erro = "EXCEÇÃO AO ATUALUZAR DOCUMENTO!";
      echo '<span class="help is-danger ocultar">Erro Atualizar Login: '.$pwd->getMessage().'</span>';
      return false;
    }
  }

  public function redefinirPassword($pwd, $email){

    try{
        $update = "UPDATE proconpb_naoperturbe_v2.usuario SET senha=:pwd WHERE email=:_email";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":_email", $email);
        $validar->bindValue(":pwd", $pwd);
        if($validar->execute()){
          return true;
          echo '<span class="help is-primary ocultar">Atualizado com sucesso!</span>';
      }
      return false;
      echo '<span class="help is-danger ocultar">Erro Atualizar Login:</span>';

    } catch (Exception $pwd){
      //$this->erro = "EXCEÇÃO AO ATUALUZAR DOCUMENTO!";
      echo '<span class="help is-danger ocultar">Erro Atualizar Login: '.$pwd->getMessage().'</span>';
      return false;
    }
  }

}
