<?php

namespace App\Model;

/**
 * Class Telefone
 * @package App\model
 */
class Telefone {

	/**
	 * @var string
	 */
	private $telefone;

	/**
	 * @var null
	 */
	private $INSTANCE_TELEFONE = null;

	/**
	 * Telefone constructor.
	 */
	public function __construct()
	{

	}

	/**
	 * @return Telefone
	 */
	public static function getInstanceTelefone()
	{
		if (empty($INSTANCE_TELEFONE)) {
			$INSTANCE_TELEFONE = new Telefone();
		}

		return $INSTANCE_TELEFONE;
	}

	/**
	 * @return string
	 */
	public function getTelefone(): string
	{
		return $this->telefone;
	}

	/**
	 * @param string $telefone
	 */
	public function setTelefone(string $telefone)
	{
		$this->telefone = $telefone;
	}
}
