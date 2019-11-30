<?php

namespace App\Model;

/**
 * Class Endereco
 * @package App\model
 */
class Endereco {

	/**
	 * @var
	 */
	private $cep;

	/**
	 * @var
	 */
	private $rua;

	/**
	 * @var
	 */
	private $bairro;

	/**
	 * @var
	 */
	private $cidade;

	/**
	 * @var
	 */
	private $numero = "";

	/**
	 * @var
	 */
	private $complemento = "";

	/**
	 * @var
	 */
	private $INSTANCE_ENDERECO = null;

	public function __construct()
	{

	}

	/**
	 * @return Endereco
	 */
	public static function getInstanceEndereco()
	{
		if (empty($INSTANCE_ENDERECO)) {
			$INSTANCE_ENDERECO = new Endereco();
		}

		return $INSTANCE_ENDERECO;
	}

	/**
	 * @return mixed
	 */
	public function getCep()
	{
		return $this->cep;
	}

	/**
	 * @param $cep
	 */
	public function setCep($cep)
	{
		$this->cep = $cep;
	}

	/**
	 * @return mixed
	 */
	public function getRua()
	{
		return $this->rua;
	}

	/**
	 * @param $rua
	 */
	public function setRua($rua)
	{
		$this->rua = $rua;
	}

	/**
	 * @return mixed
	 */
	public function getBairro()
	{
		return $this->bairro;
	}

	/**
	 * @param $bairro
	 */
	public function setBairro($bairro)
	{
		$this->bairro = $bairro;
	}

	/**
	 * @return mixed
	 */
	public function getCidade()
	{
		return $this->cidade;
	}

	/**
	 * @param $cidade
	 */
	public function setCidade($cidade)
	{
		$this->cidade = $cidade;
	}

	/**
	 * @return string
	 */
	public function getNumero()
	{
		return $this->numero;
	}

	/**
	 * @param $numero
	 */
	public function setNumero($numero)
	{
		$this->numero = $numero;
	}

	/**
	 * @return string
	 */
	public function getComplemento()
	{
		return $this->complemento;
	}

	/**
	 * @param $complemento
	 */
	public function setComplemento($complemento)
	{
		$this->complemento = $complemento;
	}
}
