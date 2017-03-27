<?php
      Session::getName('u_n_recuperar_pwd');
      Session::gerarId();

      $erro_form = PagesController::getPagesController();

      $HOME = '<a class="nav-item" href="pessoa-fisica"><span>Pessoa Física</span></a>';
      $PESSOA = '<a class="nav-item" href="pessoa-juridica"><span>Pessoa Jurídica</span></a>';
      $LOGIN = '<a class="nav-item is-active" href="login"><span>ENTRAR</span></a>';
      include_once ('app/view/partlals/header.php');
?>
<div class="principal">
<div class="columns">
  <div class="column">
    <p>
    </p>
  </div>
  <div class="column np-card-1">
    <?php if(PagesController::getPagesController()->erroLogin() == 1){ echo 'Email e senha Incorreta!'; } ?>
      <section class="hero np-padding-20">
          <div class="npTitle">
            <h1 class="title is-4">
                  Acesso
              </h1>
              <h2 class="subtitle is-6">
                  Recuperação de Senha
              </h2>
              <hr>
            <form method="post" action="/recuperar">
                    <label class="label">Email Cadastrado</label>
                    <p class="control has-icon">
                        <input  <?php if(isset($_SESSION['erro-email'])) echo 'class="input is-danger"'; else echo 'class="input is-sucess"'; ?> id="email" name="email" type="text" autofocus maxlength="100" placeholder="Email" width="48" height="48" required="" onblur="emailValidadeExisting()" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                        <span class="icon is-small">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </p>
                    <br>
                    <div class="control is-grouped is-pulled-right">
                      <p class="control">
                        <button id="button1id" class="button is-primary" type="submit">Entrar</button>
                      </p>
                      <p class="control">
                        <button id="Cancelar" type="reset" name="Cancelar" class="button is-warning" onclick="history.go(-1)">Retornar</button>
                      </p>
                    </div>
            </form>
            <div id="email-erro"><?php if(isset($_SESSION['erro-email'])) echo $erro_form->getErroFormulario("Email"); else echo $erro_form->setErroFormulario(); ?></div>
        </div>
      </section>
  </div>
  <div class="column">
    <p></p>
  </div>
</div>
<?php include_once 'app/view/partlals/footer.php' ?>
