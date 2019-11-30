<?php

namespace App\Model;

/**
 * Class Conexao
 * @package App\model
 */
class Conexao {

	/**
	 * @var string
	 */
	private static $SQL = "mysql:host=localhost;dbname=registro_database";

	/**
	 * @var string
	 */
	private static $USER = "root";

	/**
	 * @var string
	 */
	private static $PWD = "123";

	/**
	 * @var int
	 */
	private $transactionCount = 0;

	/**
	 * @var null
	 */
	private $INSTANCE_CONEXAO = null;

	/**
	 * Conexao constructor.
	 */
	public function __construct()
	{

	}

	/**
	 * @return \PDO
	 */
	public static function getInstanceConexao()
	{
		if (empty($INSTANCE_CONEXAO)) {
			try{
				$INSTANCE_CONEXAO = new \PDO(self::$SQL, self::$USER, self::$PWD);
				$INSTANCE_CONEXAO->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			} catch(\PDOexception $e) {
				echo $e->getmessage();
			}
		}

		return $INSTANCE_CONEXAO;
	}

	/**
	 * @return bool
	 */
	public function beginTransaction()
	{
		$this->INSTANCE_CONEXAO->setAttribute(\PDO::ATTR_AUTOCOMMIT, false);

		if (!$this->transactionCounter++) {
			return $this->INSTANCE_CONEXAO->beginTransaction();
		}

		$this->exec('SAVEPOINT trans' . $this->transactionCounter);

		return $this->transactionCounter >= 0;
	}

	/**
	 * @return bool
	 */
	public function commit()
	{
		if (!--$this->transactionCounter) {
			return $this->INSTANCE_CONEXAO->commit();
		}

		return $this->transactionCounter >= 0;
	}

	/**
	 * @return bool
	 */
	public function rollback()
	{
		if (--$this->transactionCounter) {
			$this->exec('ROLLBACK TO trans'.$this->transactionCounter + 1);

			return true;
		}

		return $this->INSTANCE_CONEXAO->rollback();
	}
}
