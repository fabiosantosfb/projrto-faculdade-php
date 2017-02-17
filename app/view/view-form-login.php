<?php include_once ('app/view/partlals/header.php'); ?>
<div class="principal">
<div class="columns">
  <div class="column">
    <p>
    </p>
  </div>
  <div class="column has-shadowHere">
    <?php if(PagesController::getPagesController()->erros() == 1){ echo 'Email e senha Incorreta!'; } ?>
      <section class="hero np-padding-20">
          <div class="npTitle">
            <h1 class="title is-4">
                  Acesso
              </h1>
              <h2 class="subtitle is-6">
                  Controle de acesso
              </h2>
              <hr>
            <form method="post" action="/logar">
                    <label class="label">Email</label>
                    <p class="control has-icon">
                        <input id="email" name="email" class="input" type="text" placeholder="Digite seu e-mail" required="" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" width="48" height="48">
                        <span class="icon is-small">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </p>
                    <label class="label">Senha</label>
                    <p class="control has-icon">
                        <input id="senha"  name="senha" class="input" type="password" placeholder="Digite sua senha" required="" value="<?php  if(isset($_POST['senha'])) echo htmlspecialchars($_POST['senha']); ?>">
                        <span class="icon is-small">
                            <i class="fa fa-lock"></i>
                          </span>
                    </p>
                    <div class="control is-grouped">
                      <p class="control">
                        <button id="button1id" class="button is-primary" type="submit">Entrar</button>
                      </p>
                      <p class="control">
                        <button id="Cancelar" type="reset" name="Cancelar" class="button is-link" onclick="history.go(-1)">Retornar</button>
                      </p>
                    </div>
            </form>
        </div>
      </section>
  </div>
  <div class="column">
    <p></p>
  </div>
</div>
  <?php
    //  $r = new Controller();
      //if($r->erro_form) echo "<script>alert('$r->erro')</script>";
   ?>
  <?php include_once 'app/view/partlals/footer.php' ?>
