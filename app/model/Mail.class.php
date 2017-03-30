<?php

class Mail {
  public $to;
  private $from = "fabiano@procon.pb.gov.br";
  private $subject = "Redefinir Senha <Não Perturbe>";
  private $message;
  public $link;
  private $html;
  private $newline = "\n";
  private $header;


  public function prepareHeader() {

    $this->header = 'Subject: =?utf-8?b?' . base64_encode($this->subject) . '?=' . $this->newline;
    $this->header .= 'From: '.$this->subject." ".$this->from.$this->newline;
    $this->header .= 'To: ' . $this->to . $this->newline;
    $this->header .= 'Date: ' . date('D, d M Y H:i:s O') . $this->newline;

    $this->header .= 'Return-Path: ' . $this->from . $this->newline;
    $this->header .= 'X-Mailer: PHP/' . phpversion() . $this->newline;
    $this->header .= 'Content-Type: multipart/related; boundary="email"' . $this->newline . $this->newline;
    $this->header  .= 'MIME-Version: 1.0'.$this->newline;

    $this->html = "Redefinir senha Não Perturbe:\n $this->link\n\n Pedido Gerado ".date('D, d M Y H:i:s O');
    $this->message = 'Content-Type: text/plain; charset="utf-8"' . $this->newline;
    $this->message .= 'Content-Transfer-Encoding: 8bit' . $this->newline . $this->newline;

    return self::sendEmail();
  }


  public function sendEmail(){
      return mail($this->to, $this->subject, $this->html)?"Encaminhado para o email requerido, certifique-se a caixa de Spam!":"Impossivel enviar Requerimento!";
  }
}
