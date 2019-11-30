<?php

namespace App\View;

$HOME = '<a class="nav-item" href="login"><span>Home</span></a>';
$LOGIN = '<a class="nav-item" href="login"><span>ENTRAR</span></a>';

$erro_form = PagesController::getPagesController();

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
                        Redefinir
                    </h1>
                    <h2 class="subtitle is-6">
                        Controle de acesso para redefinir senha
                    </h2>
                    <hr>
                    <form method="post" action="/redefinir-password">
                        <label class="label">Confirme o Email</label>
                        <p class="control has-icon">
                            <input id="email" name="email" class="input" autofocus maxlength="100" type="text" placeholder="Confirme seu e-mail" required="" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" width="48" height="48">
                            <span class="icon is-small">
                              <i class="fa fa-envelope"></i>
                          </span>
                        </p>

                        <label class="label">Senha</label>
                        <p class="control  has-icon">
                            <input class="input" id="senha" name="senha" type="password" maxlength="60" placeholder="Digite sua senha" required="" value="<?php  if(isset($_POST['senha'])) echo htmlspecialchars($_POST['senha']); ?>">
                            <span class="icon is-small">
                              <i class="fa fa-lock"></i>
                          </span>
                        </p>
                        <label class="label">Confirmar Senha</label>
                        <p class="control   has-icon">
                            <input <?php if(isset($_SESSION['erro-repetir-senha'])) echo 'class="input-w-4 is-danger"'; else echo 'class="input is-sucess"'; ?> id="repetir_senha" name="repetir_senha" maxlength="60" type="password" placeholder="Confirma Senha" required="" value="<?php  if(isset($_POST['repetir_senha'])) echo htmlspecialchars($_POST['repetir_senha']); ?>">
                            <span class="icon is-small">
                              <i class="fa fa-lock"></i>
                          </span>
                        </p>
                        <div id="senha-erro"><?php if(isset($_SESSION['erro-repiter-senha'])) echo $erro_form->getErroFormulario("Senha"); else echo $erro_form->setErroFormulario(); ?></div>

                        <div class="control g-recaptcha" data-sitekey="6LeQXBgUAAAAACzWg3WkYDU_Rgz2vITZ3QyY_gb0"></div>
                        <div class="control is-grouped is-pulled-right">
                            <p class="control">
                                <button id="button1id" class="button is-primary" type="submit">Redefinir</button>
                            </p>
                            <p class="control">
                                <button id="Cancelar" type="reset" name="Cancelar" class="button is-warning" onclick="history.go(-1)">Cancelar</button>
                            </p>
                        </div>
                    </form>
                </div>
        </div>
        <div class="column">
            <p>
            </p>
        </div>
    </div>
</div>
<?php include_once ('app/view/partlals/footer.php') ?>
