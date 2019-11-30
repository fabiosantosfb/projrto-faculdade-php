<?php

namespace App\Model;

/**
 * Class Mail
 * @package App\model
 */
class Mail {

	/**
	 * @var
	 */
	public $to;

	/**
	 * @var
	 */
	private $from = "fabiodeveloperti@gmail.com";

	/**
	 * @var
	 */
	private $subject = "Redefinir Senha <Nao Perturbe>";

	/**
	 * @var
	 */
	private $message;

	/**
	 * @var
	 */
	public $link;

	/**
	 * @var
	 */
	private $html;

	/**
	 * @var
	 */
	private $newline = "\n";

	/**
	 * @var
	 */
	private $header;

	/**
	 * Mail constructor.
	 * @param $email
	 * @param $_link
	 */
	public function __construct($email, $_link)
	{
		$this->to = $email;
		$this->link = $_link;
	}

	/**
	 * @return string
	 */
	public function prepareHeader()
	{
		$this->header = "MIME-Version: 1.0\n";
		$this->header = 'Subject: =?utf-8?b?' . base64_encode($this->subject) . '?=' ."\n";
		$this->header .= 'Content-Type: multipart/related; boundary="email"'."\n";
		$this->header .= "From: ". $this->from ."\n";
		$this->header .= "Bcc: " . $this->from . "\n";
		$this->header .= "To: $this->to\n";
		$this->header .= 'Date: ' . date('D, d M Y H:i:s O') . "\n";
		$this->header .= 'Return-Path: ' . $this->from . "\n";
		$this->header .= 'X-Mailer: PHP/' . phpversion() . "\n";

		$this->html .= "Redefinir senha Não Perturbe:\n $this->link\n\n Pedido Gerado ".date('D, d M Y H:i:s O');

		return self::sendEmail();
	}

	/**
	 * @return string
	 */
	public function sendEmail()
	{
		return mail($this->to, $this->subject, $this->html,  $this->header) ?
			"Encaminhado para o email requerido, certifique-se a caixa de Spam!" :
			"Impossivel enviar Requerimento!";
	}
}
