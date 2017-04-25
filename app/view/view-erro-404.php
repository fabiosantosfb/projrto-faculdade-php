<?php
    header("HTTP/1.1 404 Not Found");
    header( "refresh:10;url=/" );

    $HOME = '<a class="nav-item" href="login"><span>Home</span></a>';
    $LOGIN = '<a class="nav-item" href="login"><span>ENTRAR</span></a>';

    include_once ('app/view/partlals/header.php');
?>
    <article class='<?=$class?>'>
        <div class="message-header">
          <p><strong>Pagina</strong> não encontrada ou sessão expirada!!</p>
        </div>
        <div class="message-body">
          <strong><?=$_msg?></strong>
        </div>
      </article>
<?php include_once ('app/view/partlals/footer.php') ?>
