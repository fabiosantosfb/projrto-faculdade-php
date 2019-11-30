<?php

namespace App\Model;

/**
 * Class PessoaJuridica
 * @package App\model
 */
class PessoaJuridica extends Usuario {

	/**
	 * @var null
	 */
	private $cnpj = null;

	/**
	 * @var bool
	 */
	private $telemarketing = false;

	/**
	 * @var
	 */
	private $telemarketingStatus;

	/**
	 * @var null
	 */
	private $INSTANCE_PESSOA_JURIDICA = null;

	/**
	 * PessoaJuridica constructor.
	 */
	public function __construct()
	{

	}

	/**
	 * @return PessoaJuridica
	 */
	public static function getInstancePessoaJuridica()
	{
		if (empty($INSTANCE_PESSOA_JURIDICA)) {
			$INSTANCE_PESSOA_JURIDICA = new PessoaJuridica();
		}

		return $INSTANCE_PESSOA_JURIDICA;
	}

	/**
	 * @return null
	 */
	public function getCnpj() {
		return $this->cnpj;
	}

	/**
	 * @param $cnpj
	 */
	public function setCnpj($cnpj)
	{
		$this->cnpj = $cnpj;
	}

	/**
	 * @return bool
	 */
	public function getTelemarketing()
	{
		return $this->telemarketing;
	}

	/**
	 * @param $telemarketing
	 */
	public function setTelemarketing($telemarketing)
	{
		$this->telemarketing = $telemarketing;
	}

	/**
	 * @return mixed
	 */
	public function getTelemarketingStatus()
	{
		return $this->telemarketingStatus;
	}

	/**
	 * @param $status
	 */
	public function setTelemarketingStatus($status)
	{
		$this->telemarketingStatus = $status;
	}
}
