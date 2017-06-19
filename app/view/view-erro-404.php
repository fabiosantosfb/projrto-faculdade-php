<?php
    header("HTTP/1.1 404 Not Found");
    header( "refresh:10;url=/" );

    $HOME = '<a class="nav-item" href="login"><span>Home</span></a>';
    $LOGIN = '<a class="nav-item" href="login"><span>ENTRAR</span></a>';
    $PESSOA = '';

    include_once ('app/view/partlals/header.php');
?>
    <article class='message is-danger'>
        <div class="message-header">
          <p><strong>Error 404</strong></p>
        </div>
        <div class="message-body">
          <strong>Pagina Não Encontrada!</strong>
        </div>
      </article>
<?php include_once ('app/view/partlals/footer.php') ?>
