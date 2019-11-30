<?php

namespace App\Model;

/**
 * Class Session
 * @package App\model
 */
class Session {

	/**
	 * @var
	 */
	private $id_session;

	/**
	 * @var
	 */
	private $type_session;

	/**
	 * @var
	 */
	private $token;

	/**
	 * @var
	 */
	private $INSTANCE_SESSION;

	/**
	 * @param $name
	 * @return string
	 */
	public function getName($name)
	{
		return session_name($name);
	}

	/**
	 *
	 */
	public function getId()
	{
		$_SESSION['id-user-session'] = session_id();
	}

	/**
	 * @return bool
	 */
	public function start()
	{
		session_save_path(realpath(dirname($_SERVER['DOCUMENT_ROOT']) . 'app/sessions'));
		ini_set('session.gc_probability', 1);
		return session_start();
	}

	/**
	 * @return bool
	 */
	public function gerarId()
	{
		return session_regenerate_id();
	}

	/**
	 * @return bool
	 */
	public function destroy()
	{
		return session_destroy();
	}

	/**
	 *
	 */
	public function token()
	{
		if(!isset($_SESSION['token-user-session'])) {
			$token = md5(uniqid(rand(),true));

			$_SESSION['token-user-session'] = Bcrypt::hash($token);
			$_SESSION['token-user-agent'] = Bcrypt::hash('user'.$_SERVER['HTTP_USER_AGENT']);
			$_SESSION['token-user-ip'] = Bcrypt::hash('user'.$_SERVER['REMOTE_ADDR']);
		}
	}
}
