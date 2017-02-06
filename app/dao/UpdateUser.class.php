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

    } catch (Exception $tlmk){
      echo 'Erro '.$tlmk->getMessage().'<br>';
      //$this->erro = "EXCEÇÃO AO ATUALUZAR TELEMARKETING!";
      return false;
    }
  }

  public function updTelefone($telefone, $id, $id_telefone){
    try{
        $update = "UPDATE telefone SET telefone_numero = :telefone  WHERE usuario_id_usuario = :id AND id_telefone = :id_telefone";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":telefone",$telefone);
        $validar->bindValue(":id",$id);
        $validar->bindValue(":id_telefone", $id_telefone);

        if($validar->execute()){
          echo "Atualizado Com sucesso!";
        }
    } catch (Exception $tele){
      echo 'Erro Atualizar Telefone: '.$tele->getMessage().'<br>';
      return false;
    }
  }

  public function addTelefone($telefone, $usuario){
    try {
        $q = "INSERT INTO telefone VALUES (0, default, default, :telefone, :id, default)";
        $validarTel = Parent::getInstanceConexao()->prepare($q);
        $validarTel->bindValue(":telefone", $telefone);
        $validarTel->bindValue(":id", $usuario);
        $validarTel->execute();
        return true;
    } catch (Exception $ex){
      return false;
    }
  }

  public function upDocumento($nome, $usuario, $cpf, $rg, $dataexpedicao, $orgao_expedidor, $uf){
    try{
        $update = "UPDATE proconpb_naoperturbe.pessoa_fisica SET nome=:nome, cpf=:cpf, rg=:rg, org=:org, uf=:uf, data_expedicao=:data_expedicao WHERE usuario_id_usuario=:id";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":nome", $nome);
        $validar->bindValue(":cpf", $cpf);
        $validar->bindValue(":rg", $rg);
        $validar->bindValue(":org", $orgao_expedidor);
        $validar->bindValue(":uf", $uf);
        $validar->bindValue(":data_expedicao", $dataexpedicao);
        $validar->bindValue(":id", $usuario);
        if($validar->execute()){
          echo "Atualizado Com sucesso!";
        }

    } catch (Exception $doc){
      echo 'Erro Atualizar Documento: '.$doc->getMessage().'<br>';
      return false;
    }
  }

  public function upDocumentoPj($nome, $usuario, $cnpj){
    try{
        $update = "UPDATE proconpb_naoperturbe.pessoa_juridica SET nome=:nome, cnpj=:cnpj WHERE usuario_id_usuario=:id";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":nome", $nome);
        $validar->bindValue(":cnpj", $cnpj);
        $validar->bindValue(":id", $usuario);
        if($validar->execute()){
          echo "Atualizado Com sucesso!";
        }

    } catch (Exception $doc){
      echo 'Erro Atualizar Documento: '.$doc->getMessage().'<br>';
      return false;
    }
  }

  public function upAddress($cep, $cidade, $rua, $bairro, $numero, $complemento, $id_endereco){
    try{
        $update = "UPDATE proconpb_naoperturbe.endereco SET cep=:cep, rua=:rua, bairro=:bairro, cidade=:cidade, numero=:numero, complemento=:complemento WHERE usuario_id_usuario=:id_endereco";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":cep", $cep);
        $validar->bindValue(":rua", $rua);
        $validar->bindValue(":bairro", $bairro);
        $validar->bindValue(":cidade", $cidade);
        $validar->bindValue(":numero", $numero);
        $validar->bindValue(":complemento", $complemento);
        $validar->bindValue(":id_endereco", $id_endereco);
        if($validar->execute()){
          echo "Atualizado Com sucesso!";
        }

    } catch (Exception $end){
      //$this->erro = "EXCEÇÃO AO ATUALUZAR DOCUMENTO!";
      echo 'Erro Atualizar Endereço: '.$end->getMessage().'<br>';
      return false;
    }
  }

  public function upPassword($pwd, $email, $id){

    try{
        $update = "UPDATE proconpb_naoperturbe.usuario SET email=:email, senha=:senha WHERE id_usuario=:id";
        $validar = Parent::getInstanceConexao()->prepare($update);
        $validar->bindValue(":email", $email);
        $validar->bindValue(":senha", $pwd);
        $validar->bindValue(":id", $id);
        if($validar->execute()){
          echo "Atualizado Com sucesso!";
        }

    } catch (Exception $pwd){
      //$this->erro = "EXCEÇÃO AO ATUALUZAR DOCUMENTO!";
      echo 'Erro Atualizar Login: '.$pwd->getMessage().'<br>';
      return false;
    }
  }

}
