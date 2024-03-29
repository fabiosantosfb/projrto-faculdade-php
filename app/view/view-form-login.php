<?php

namespace App\View;
use App\Model\Session;
use App\Controller\PagesController;

Session::getName('u_n_login');
Session::gerarId();

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
            <section class="hero np-padding-20">
                <div class="npTitle">
                    <h1 class="title is-4">
                        Acesso
                    </h1>
                    <h2 class="subtitle is-6">
                        Controle de acesso
                    </h2>
                    <hr>
                    <form method="post" action="/autenticar-user">
                        <label class="label">Email</label>
                        <p class="control has-icon">
                            <input id="email" name="email" class="input" autofocus maxlength="100" type="text" placeholder="Digite seu e-mail" required="" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" width="48" height="48">
                            <span class="icon is-small">
                                    <i class="fa fa-envelope"></i>
                                </span>
                        </p>
                        <label class="label">Senha</label>
                        <p class="control has-icon">
                            <input id="senha"  name="senha" class="input" type="password" maxlength="60" placeholder="Digite sua senha" required="" value="<?php  if(isset($_POST['senha'])) echo htmlspecialchars($_POST['senha']); ?>">
                            <span class="icon is-small">
                                    <i class="fa fa-lock"></i>
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
                </div>
            </section>
        </div>
        <div class="column">
            <p></p>
        </div>
    </div>
