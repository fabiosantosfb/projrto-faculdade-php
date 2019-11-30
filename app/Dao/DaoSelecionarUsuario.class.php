<?php

namespace App\Dao;

use App\Model\Conexao;

/**
 * Class Selection
 * @package App\Dao
 */
class DaoSelecionarUsuario extends Conexao {
	private $erro;
	private static $SelectionDadosUser = null;

	public static function getInstanceSelection() {
		if (empty(self::$SelectionDadosUser)) {
			self::$SelectionDadosUser = new DaoSelecionarUsuario();
		}
		return self::$SelectionDadosUser;
	}

	public function selectionUsuarioName($nome , $tipo_user){
		try{
			$usuario = "SELECT * FROM usuario JOIN $tipo_user ON $tipo_user.id_usuario = usuario.id_usuario WHERE usuario.nome=:nome";
			$validar = Parent::getInstanceConexao()->prepare($usuario);
			$validar->bindValue(":nome", $nome);
			$validar->execute();

			if ($validar->rowCount() === 1){
				return $validar->fetchAll(\PDO::FETCH_ASSOC);
			} else {
				$this->erro = "Usuario não encontrada!";
				return false;
			}
		} catch (\Exception $pF){
			$this->erro = "EXCEÇÃO NA CONSULTA USUARIO!";
			return false;
		}
	}

	public function selectionTelefone($id) {
		try{
			$queryTl = "SELECT * FROM telefone WHERE id_usuario = :id_usuario";
			$validar = Parent::getInstanceConexao()->prepare($queryTl);
			$validar->bindValue(":id_usuario",$id);
			$validar->execute();

			if ($validar->rowCount() >= 1){
				return $validar->fetchAll(\PDO::FETCH_ASSOC);
			} else {
				$this->erro = "telefone não encontrada!";
				//return false;
				echo $this->erro;
			}
		} catch (\Exception $tl){
			$this->erro = "EXCEÇÃO NA CONSULTA DE TELEFONE!";
			echo $this->erro;
		}
	}

	public function selectionUsuario($id){
		try{
			$queryPf = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
			$validar = Parent::getInstanceConexao()->prepare($queryPf);
			$validar->bindValue(":id_usuario",$id);
			$validar->execute();

			if ($validar->rowCount() === 1){
				return $validar->fetch(\PDO::FETCH_ASSOC);
			} else {
				$this->erro = "Usuário não encontrad!";
				//return false;
				echo $this->erro;
			}
		} catch (\Exception $pF){
			$this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
			echo $this->erro;
			//return false;
		}
	}

	public function selectionPessoaJuridica($id){
		try{
			$queryPj = "SELECT * FROM pessoa_juridica WHERE id_usuario = :id_usuario";
			$validar = Parent::getInstanceConexao()->prepare($queryPj);
			$validar->bindValue(":id_usuario",$id);
			$validar->execute();

			if ($validar->rowCount() === 1){
				return $validar->fetch(\PDO::FETCH_ASSOC);
			} else {
				$this->erro = "Pessoa Juridica não encontrada!";
				//return false;
				echo $this->erro;
			}
		} catch (\Exception $pJ){
			$this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA JURIDICA!";
			echo $this->erro;//return false;
		}
	}

	public function selectionPessoaTelemarketing($id, $token){
		try{
			$queryPj = "SELECT * FROM pessoa_juridica WHERE identificador = :identificador AND token = :token";
			$validar = Parent::getInstanceConexao()->prepare($queryPj);
			$validar->bindValue(":identificador",$id);
			$validar->bindValue(":token",$token);
			$validar->execute();

			if ($validar->rowCount() === 1){
				return true;
			} else {
				return false;
			}
		} catch (\Exception $pJ){
			return false;
		}
	}

	public function selectionPessoaFisica($id){
		try{
			$queryPj = "SELECT * FROM pessoa_fisica WHERE id_usuario = :id_usuario";
			$validar = Parent::getInstanceConexao()->prepare($queryPj);
			$validar->bindValue(":id_usuario",$id);
			$validar->execute();

			if ($validar->rowCount() === 1){
				return $validar->fetch(\PDO::FETCH_ASSOC);
			} else {
				$this->erro = "Pessoa Física não encontrada!";
				echo $this->erro;//return false;
			}
		} catch (\Exception $pJ){
			$this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
			echo $this->erro;//return false;
		}
	}

	public function getErro() {
		return $this->erro;
	}
}
