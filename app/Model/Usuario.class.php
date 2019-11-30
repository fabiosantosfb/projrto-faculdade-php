<?php

namespace App\Model;

/**
 * Class Usuario
 * @package App\model
 */
class Usuario extends Endereco {

	/**
	 * @var
	 */
	private $nome;

	/**
	 * @var
	 */
	private $status;

	/**
	 * @var
	 */
	private $dateCriacao;

	/**
	 * @var
	 */
	private $dateAtualizacao;

	/**
	 * @var null
	 */
	private $INSTANCE_USARIO = null;

	/**
	 * Usuario constructor.
	 */
	public function __construct()
	{

	}

	/**
	 * @return Usuario
	 */
	public static function getInstanceUsuario()
	{
		if (empty($INSTANCE_USARIO)) {
			$INSTANCE_USARIO = new Usuario();
		}

		return $INSTANCE_USARIO;
	}

	/**
	 * @return mixed
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * @param $nome
	 */
	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	/**
	 * @return mixed
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * @param $status
	 */
	public function setStatus($status)
	{
		$this->status = $status;
	}

	/**
	 * @return mixed
	 */
	public function getDataCriacao()
	{
		return $this->dateCriacao;
	}

	/**
	 * @param $dateCriacao
	 */
	public function setDataCriacao($dateCriacao)
	{
		$this->dateCriacao = $dateCriacao;
	}

	/**
	 * @return mixed
	 */
	public function getAtualizacao()
	{
		return $this->dateAtualizacao;
	}

	/**
	 * @param $dateAtualizacao
	 */
	public function setAtualizacao($dateAtualizacao)
	{
		$this->dateAtualizacao = $dateAtualizacao;
	}
}
