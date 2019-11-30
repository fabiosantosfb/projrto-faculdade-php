<?php

namespace App\Dao;

use App\Model\Conexao;

/**
 * Class Listar
 * @package App\Dao
 */
class DaoListarUsuarios extends Conexao {
	private static $list = null;

	public function __construct(){}

	public static function getInstanceListar() {
		if (empty(self::$list)) {
			self::$list = new DaoListarUsuarios();
		}

		return self::$list;
	}

	public function listarPessoa(){
		try{
			$queryPf = "SELECT usuario.nome, pessoa_fisica.cpf, telefone.telefone_numero, telefone.data_cadastro FROM usuario
                    INNER JOIN pessoa_fisica ON pessoa_fisica.id_usuario = usuario.id_usuario
                    INNER JOIN telefone ON telefone.id_usuario = pessoa_fisica.id_usuario AND usuario.type = 'pf'";
			$validar = Parent::getInstanceConexao()->prepare($queryPf);
			$validar->execute();

			return $validar->fetchAll(\PDO::FETCH_ASSOC);
		} catch (\Exception $pF){
			$this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
			return $pF->getMessage();
		}
	}

	public function listarRelatTelefone(){
		try{
			$queryPf = "SELECT telefone_numero, data_cadastro FROM telefone WHERE telefone.id_usuario AND telefone.status_bloqueio = 0";
			$validar = Parent::getInstanceConexao()->prepare($queryPf);
			$validar->execute();

			return $validar->fetchAll(\PDO::FETCH_ASSOC);
		} catch (\Exception $pF){
			$this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
			return $pF->getMessage();
		}
	}

	public function listarPessoaJuridicaRelat(){
		try{
			$queryPf = "SELECT telefone_numero, data_cadastro FROM pessoa_juridica INNER JOIN telefone ON pessoa_juridica.id_usuario = telefone.id_usuario AND telefone.status_bloqueio = 0";
			$validar = Parent::getInstanceConexao()->prepare($queryPf);
			$validar->execute();

			return $validar->fetchAll(\PDO::FETCH_ASSOC);
		} catch (\Exception $pF){
			$this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
			return $pF->getMessage();
		}
	}

	public function listarPessoaJuridica(){
		try{
			$queryPf = "SELECT usuario.nome, pessoa_juridica.cnpj, telefone.telefone_numero, telefone.data_cadastro FROM usuario
                    INNER JOIN pessoa_juridica ON pessoa_juridica.id_usuario = usuario.id_usuario
                    INNER JOIN telefone ON telefone.id_usuario = pessoa_juridica.id_usuario AND usuario.type = 'pj'";
			$validar = Parent::getInstanceConexao()->prepare($queryPf);
			$validar->execute();

			return $validar->fetchAll(\PDO::FETCH_ASSOC);
		} catch (\Exception $pF){
			$this->erro = "EXCEÇÃO NA CONSULTA DE PESSOA FISICA!";
			return $pF->getMessage();
		}
	}

	public function listarTelemarketing() {
		try{
			$queryTm = "SELECT * FROM usuario JOIN pessoa_juridica ON pessoa_juridica.id_usuario = usuario.id_usuario  WHERE usuario.type = 'tlm'";
			$validar = Parent::getInstanceConexao()->prepare($queryTm);
			$validar->execute();

			return $validar->fetchAll(\PDO::FETCH_ASSOC);

		} catch (\Exception $pF){
			$this->erro = "EXCEÇÃO NA CONSULTA DE TELEMARKETING!";
			return $pF->getMessage();
		}
	}

	public function listarTelefonePf(){
		try{
			$listagemFone = "SELECT * FROM telefone JOIN pessoa_fisica ON pessoa_fisica.id_usuario = telefone.id_usuario WHERE telefone.status_bloqueio = 0";
			$validar = Parent::getInstanceConexao()->prepare($listagemFone);

			/**
			 * @var Conexao $validar
			 */
			$validar->execute();

			return $validar->fetchAll(\PDO::FETCH_ASSOC);

		} catch (\Exception $pF){
			$this->erro = "EXCEÇÃO NA CONSULTA DE TELEFONE PARA BLOQUEIO!";
			return $pF->getMessage();
		}
	}

	public function listarTelefonePj(){
		try{
			//$listagemFone = "SELECT * FROM telefone JOIN pessoa_juridica ON pessoa_juridica.usuario_id_usuario = telefone.usuario_id_usuario JOIN telemarketing  WHERE telefone.status_bloqueio = 0 And pessoa_juridica.usuario_id_usuario != telemarketing.pessoa_juridica_usuario_id_usuario";

			$listagemFone = "SELECT nome FROM telefone JOIN pessoa_juridica ON pessoa_juridica.id_usuario = telefone.id_usuario RIGHT JOIN usuario ON usuario.type <> 'tlm'  WHERE telefone.status_bloqueio = 0";

			$validar = Parent::getInstanceConexao()->prepare($listagemFone);
			$validar->execute();

			return $validar->fetchAll(\PDO::FETCH_ASSOC);

		} catch (\Exception $pF){
			$this->erro = "EXCEÇÃO NA CONSULTA DE TELEFONE PARA BLOQUEIO!";
			return $pF->getMessage();
		}
	}
}
