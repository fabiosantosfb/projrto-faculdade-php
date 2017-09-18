<?php

class Mail {
  public $to;
  private $from = "ti@procon.pb.gov.br";
  private $subject = "Redefinir Senha <Nao Perturbe>";
  private $message;
  public $link;
  private $html;
  private $newline = "\n";
  private $header;

  public function __construct($email, $_link){
      $this->to = $email;
      $this->link = $_link;
  }

  public function prepareHeader() {
      $this->header = "MIME-Version: 1.0\n";
      $this->header = 'Subject: =?utf-8?b?' . base64_encode($this->subject) . '?=' ."\n";
      $this->header .= 'Content-Type: multipart/related; boundary="email"'."\n";
      $this->header .= "From: ". $this->from ."\n";
      $this->header .= "Bcc: " . $this->from . "\n";
      $this->header .= "To: $this->to\n";
      $this->header .= 'Date: ' . date('D, d M Y H:i:s O') . "\n";
      $this->header .= 'Return-Path: ' . $this->from . "\n";
      $this->header .= 'X-Mailer: PHP/' . phpversion() . "\n";
 /*
    $this->header = 'Subject: =?utf-8?b?' . base64_encode($this->subject) . '?=' . $this->newline;
    $this->header .= 'From: '.$this->subject.' '.$this->from.$this->newline;
    $this->header .= 'To: ' . $this->to . $this->newline;
    $this->header .= 'Date: ' . date('D, d M Y H:i:s O') . $this->newline;

    $this->header .= 'Return-Path: ' . $this->from . $this->newline;
    $this->header .= 'X-Mailer: PHP/' . phpversion() . $this->newline;
    $this->header .= 'Content-Type: multipart/related; boundary="email"' . $this->newline . $this->newline;
    $this->header .= 'MIME-Version: 1.0'.$this->newline;*/

    $this->html .= "Redefinir senha Não Perturbe:\n $this->link\n\n Pedido Gerado ".date('D, d M Y H:i:s O');

    //$this->message .= 'Content-Transfer-Encoding: 8bit' . $this->newline . $this->newline;

    return self::sendEmail();
  }


  public function sendEmail(){
      return mail($this->to, $this->subject, $this->html,  $this->header)?"Encaminhado para o email requerido, certifique-se a caixa de Spam!":"Impossivel enviar Requerimento!";
  }
}
