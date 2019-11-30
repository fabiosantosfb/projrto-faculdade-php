<?php

namespace App\Model;

/**
 * Class Logar
 * @package App\model
 */
class Logar {

	/**
	 * @var
	 */
	private $idb;

	/**
	 * @var
	 */
	private $email;

	/**
	 * @var
	 */
	private $password;

	/**
	 * @var
	 */
	private $type;

	/**
	 * @var
	 */
	private $INSTANCE_LOGIN = null;

	/**
	 * Login constructor.
	 */
	public function __construct()
	{

	}

	/**
	 * @return Login
	 */
	public static function getInstanceLogin()
	{
		if (empty($INSTANCE_LOGIN)) {
			$INSTANCE_LOGIN = new Logar();
		}

		return $INSTANCE_LOGIN;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**namespace

	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function setId($id) {
		return $this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param $type
	 */
	public function setType($type) {
		$this->type = $type;
	}
}
