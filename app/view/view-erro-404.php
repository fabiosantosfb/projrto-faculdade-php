<?php
    header("HTTP/1.1 404 Not Found");
    header( "refresh:5;url=/" ); 

    $HOME = '<a class="nav-item" href="login"><span>Home</span></a>';
    $LOGIN = '<a class="nav-item" href="login"><span>ENTRAR</span></a>';

    include_once ('app/view/partlals/header.php');
?><h1>404 Pagina Não encontrada!</h1>
<?php include_once ('app/view/partlals/footer.php') ?>
