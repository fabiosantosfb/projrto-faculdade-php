<?php

namespace App\Dao;

use App\Model\Conexao;
use App\Model\Telefone;

/**
 * Class DaoUsuario
 * @package App\Dao
 */
class DaoInserirUsuario extends Conexao {
	private $dataAutenticacao;
	private $dataUsuario;
	private $dataEndereco;
	/**
	 * @var Telefone $fone
	 */
	private $fone;
	private $messages_errors = array();
	private static $error;
	private $last_id;
	private $qtd_t;

	public function __construct($usuario, $login, $endereco, $fone){
		$this->dataUsuario = $usuario;
		$this->dataAutenticacao = $login;
		$this->dataEndereco = $endereco;
		$this->fone = $fone;
		$this->messages_erros_insert();
	}

	private function messages_erros_insert() {
		$this->messages_errors = array(
			'insert_usuario'          => 'Erro ao inserir Usuario!',
			'id_usuario'              => 'Erro ao pegar id do Usuario!',
			'id_null_usuario'          => 'Id null!',
			'insert_pessoa_juridica'  => 'Erro ao inserir Pessoa Juridica!',
			'insert_pessoa_fisica'    => 'Erro ao inserir Pessoa Fisica!',
			'delete_usuario'          => 'Erro ao Deletar Usuario!',
			'insert_telefone'         => 'Erro ao inserir Telefone!',
			'rollback_usuario'        => 'Erro ao deletar Usuario!',
			'insert_usuario_commit'   => 'Erro ao efetuar o commit!'
		);
	}

	public function insertUsuario() {
		try {
			$db = Parent::getInstanceConexao();
			$db->beginTransaction();
			$validarUser = $db->prepare("INSERT INTO usuario values (default, :email, :senha, :nome, :type, :cep, :rua, :bairro, :cidade, :numero, :complemento, default, default)");
			$validarUser->bindValue(":email",$this->dataAutenticacao->getEmail());
			$validarUser->bindValue(":senha",$this->dataAutenticacao->getPassword());
			$validarUser->bindValue(":nome",$this->dataUsuario->getNome());
			$validarUser->bindValue(":type",$this->dataAutenticacao->getType());
			$validarUser->bindValue(":cep", $this->dataEndereco->getCep());
			$validarUser->bindValue(":rua", $this->dataEndereco->getRua());
			$validarUser->bindValue(":bairro", $this->dataEndereco->getBairro());
			$validarUser->bindValue(":cidade", $this->dataEndereco->getCidade());
			$validarUser->bindValue(":numero", $this->dataEndereco->getNumero());
			$validarUser->bindValue(":complemento", $this->dataEndereco->getComplemento());
			$validarUser->execute();
			$id = $db->lastInsertId();

			self::pessoajuridica($db);

			$status_telefone = ($this->dataAutenticacao->getType() == 'tlm') ? 1 : 0;

			$validarUser = $db->prepare("INSERT INTO telefone values (default, :id_usuario, :status_bloqueio, :telefone, default, default)");
			$validarUser->bindValue(":id_usuario", $id);
			$validarUser->bindValue(":status_bloqueio", $status_telefone);
			$validarUser->bindValue(":telefone", $this->fone->getTelefone());
			$validarUser->execute();


			$db->commit();
			return true;

		} catch (\Exception $ex){
			var_dump("erro", $ex->getMessage());
			$db->rollback();

			$this->setError($this->messages_errors['insert_usuario'] . $ex->getMessage());
			return false;
		}
	}

	public function pessoajuridica($db) {
		$validarUser = $db->prepare("INSERT INTO pessoa_juridica values (default, :id_usuario, :cnpj, 0)");
		$validarUser->bindValue(":id_usuario", $db->lastInsertId());
		$validarUser->bindValue(":cnpj", $this->dataUsuario->getCnpj());
		$validarUser->execute();
	}

	public function setError($message) {
		self::$error = $message;
	}

	public function getError() {
		echo self::$error;
	}
}
