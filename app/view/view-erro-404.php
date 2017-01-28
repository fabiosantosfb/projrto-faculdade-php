<?php
$HOME = '
<a class="nav-item" href="login">
  <span class="icon"><i class="fa fa-home"></i></span>
</a>';

  $LOGIN = '
  <a class="button is-primary" href="login">
      <span class="icon">
        <i class="fa fa-sign-in"></i>
      </span>
      <span>ENTRAR</span>
  </a>';

  // $LOGIN = '<li><a href="login">Logar</a></li>';
  include_once ('app/view/partlals/header.php') ?>
  <h1>Pagina Não encontrada!</h1>
  <ul class="list-inline"><li><a href="pessoa-juridica">Cadastro Pessoa Juridica</a></li></ul>
  <ul class="list-inline"><li><a href="pessoa-fisica">Cadastro Pessoa Fisica</a></li></ul>
<?php include_once ('app/view/partlals/footer.php') ?>
