<?php
      include_once ('app/model/PessoaJuridica.class.php');
      include_once ('app/model/PessoaFisica.class.php');
      $pesssoaFisica = PessoaFisica::getInstancePessoaFisica();
      $email = Login::getInstanceLogin();
      $pesssoaJuridica = PessoaJuridica::getInstancePessoaJuridica();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Não Pertube</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="app/assets/css/bootstrap.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="app/assets/css/bootstrap-theme.min.css" media="screen" title="no title">
    <link rel="stylesheet" href="app/assets/css/naopertube.css" media="screen" title="no title">
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <?php echo $HOME;?>
          <?php echo $PESSOA;?>
          <?php

                if($pesssoaJuridica->getTelemarketing()){
                    echo $MARKETING;
                }
          ?>
        </div>
        <div>
          <ul class="nav navbar-nav navbar-right">
            <?php echo $LOGIN; ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="principal">
