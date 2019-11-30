<?php

namespace App\Model;

/**
 * Class Bcrypt
 * @package App\model
 */
class Bcrypt {

	/**
	 * @var string
	 */
	protected static $_saltPrefix = '2a';

	/**
	 * @var string
	 */
	protected static $_defaultCost = 8;

	/**
	 * @var string
	 */
	protected static $_saltLength = 22;

	/**
	 * @param $string
	 * @param null $cost
	 * @param null $link
	 * @return string
	 */
	public static function hash($string, $cost = null, $link = null)
	{
		if (empty($cost)) {
			$cost = self::$_defaultCost;
		}

		$salt = self::generateRandomSalt();

		if(!empty($link)) $hashString = self::__generateHashStringLink((int)4, $salt);
		else $hashString = self::__generateHashString((int)$cost, $salt);

		return crypt($string, $hashString);
	}

	/**
	 * @param $string
	 * @param $hash
	 * @return bool
	 */
	public static function check($string, $hash)
	{
		return (crypt($string, $hash) === $hash);
	}

	/**
	 * @return bool|string
	 */
	public static function generateRandomSalt()
	{
		$seed = uniqid(mt_rand(), true);
		$salt = base64_encode($seed);
		$salt = str_replace('+', '.', $salt);

		return substr($salt, 0, self::$_saltLength);
	}

	/**
	 * @param $cost
	 * @param $salt
	 * @return string
	 */
	private static function __generateHashString($cost, $salt)
	{
		return sprintf('$%s$%02d$%s$', self::$_saltPrefix, $cost, $salt);
	}

	/**
	 * @param $cost
	 * @param $salt
	 * @return string
	 */
	private static function __generateHashStringLink($cost, $salt)
	{
		return sprintf('$%s$%02d$%s$', self::$_saltPrefix, $cost, $salt);
	}

}
