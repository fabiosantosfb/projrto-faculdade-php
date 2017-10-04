<?php

    header("POST HTTP/1.1 404 Not Found");
    header("User-Agent:	".$_SERVER['HTTP_USER_AGENT']);
    header( "refresh:10;url=/" );
    header("Connection: close\r\n\r\n");

    $HOME = '<a class="nav-item" href="login"><span>Home</span></a>';
    $LOGIN = '<a class="nav-item" href="login"><span>ENTRAR</span></a>';
    $PESSOA = '';

    include_once ('app/view/partlals/header.php');
?>
    <article class='message is-danger'>
        <div class="message-header">
          <p><strong>Messagem</strong></p>
        </div>
        <div class="message-body">
          <strong>Pagina Em Manutenção!</strong>
        </div>
      </article>
<?php include_once ('app/view/partlals/footer.php') ?>
