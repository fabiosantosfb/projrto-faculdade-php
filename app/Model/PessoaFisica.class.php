<?php

namespace App\Model;

/**
 * Class PessoaFisica
 * @package App\model
 */
class PessoaFisica extends Usuario {

	/**
	 * @var null
	 */
	private $cpf = null;

	/**
	 * @var
	 */
	private $rg;

	/**
	 * @var
	 */
	private $org_expedidor;

	/**
	 * @var
	 */
	private $data_expedicao;

	/**
	 * @var
	 */
	private $uf;

	/**
	 * @var null
	 */
	private $INSTANCE_PESSOA_FISICA = null;

	/**
	 * PessoaFisica constructor.
	 */
	public function __construct()
	{

	}

	/**
	 * @return PessoaFisica
	 */
	public static function getInstancePessoaFisica()
	{
		if (empty($INSTANCE_PESSOA_FISICA)) {
			$INSTANCE_PESSOA_FISICA = new PessoaFisica();
		}

		return $INSTANCE_PESSOA_FISICA;
	}

	/**
	 * @return null
	 */
	public function getCpf()
	{
		return $this->cpf;
	}

	/**
	 * @param $cpf
	 */
	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}

	/**
	 * @return mixed
	 */
	public function getOrgExpedidor()
	{
		return $this->org_expedidor;
	}

	/**
	 * @param $org_expedidor
	 */
	public function setOrgExpedidor($org_expedidor)
	{
		$this->org_expedidor = $org_expedidor;
	}

	/**
	 * @return mixed
	 */
	public function getDataExpedicao()
	{
		return $this->data_expedicao;
	}

	/**
	 * @param $data_expedicao
	 */
	public function setDataExpdicao($data_expedicao)
	{
		$this->data_expedicao = $data_expedicao;
	}

	/**
	 * @return mixed
	 */
	public function getUf()
	{
		return $this->uf;
	}

	/**
	 * @param $uf
	 */
	public function setUf($uf)
	{
		$this->uf = $uf;
	}

	/**
	 * @return mixed
	 */
	public function getRg()
	{
		return $this->rg;
	}

	/**
	 * @param $rg
	 */
	public function setRg($rg)
	{
		$this->rg = $rg;
	}
}
