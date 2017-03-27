<?php
      Session::getName('u_n_pj');
      Session::gerarId();

      $HOME = '<a class="nav-item" href="pessoa-fisica"><span>Pessoa Física</span></a>';
      $PESSOA = '<a class="nav-item is-active" href="pessoa-juridica"><span>Pessoa Jurídica</span></a>';
      $LOGIN = '<a class="nav-item" href="login"><span>ENTRAR</span></a>';

      $erro_form = PagesController::getPagesController();
      include_once ('app/view/partlals/header.php');
?>
<script src="app/assets/js/np-procon-pb.js" charset="utf-8"></script>
<script src="app/assets/js/validate-existing-data.js" charset="utf-8"></script>
<div class="principal np-card-1">
    <section class="hero np-padding-20">
        <div class="npTitle">
            <h1 class="title is-4">
                Pessoa Jurídica
            </h1>
            <h2 class="subtitle is-6">
                Informe seu dados, endereço e telefone.
            </h2>
            <hr>
            <div class="columns">
                <div class="column">
                    <section class="hero">
                        <div class="npTitle">
                            <h1 class="title is-6">
                                DADOS
                            </h1>
                            <h2 class="subtitle is-6">

                            </h2>
                            <hr>
                            <form class="control" method="post" action="/cadastro-pj" enctype="multipart/form-data">
                                <label class="label">Razão Social</label>
                                <p class="control">
                                    <input <?php if(isset($_SESSION['erro-nome'])) echo 'class="input-w-8 is-danger"'; else echo 'class="input-w-8 is-sucess"'; ?> id="nome" maxlength="35"  autofocus name="nome" type="text" placeholder="Razao social" required="" value="<?php  if(isset($_POST['nome'])) echo htmlspecialchars($_POST['nome']); ?>">
                                    <span class="help is-success">Preencha corretamente, conforme o registro na Receita Federal.</span>
                                    <div id="nome-erro"><?php if(isset($_SESSION['erro-nome'])) echo $erro_form->getErroFormulario("Nome"); else echo $erro_form->setErroFormulario(); ?></div>
                                </p>
                                <label class="label">CNPJ</label>
                                <p class="control">
                                    <input name="type" type="hidden" value="pj">
                                    <input <?php if(isset($_SESSION['erro-cnpj'])) echo 'class="input-w-4 is-danger"'; else echo 'class="input-w-4 is-sucess"'; ?> id="cnpj" name="cnpj" maxlength="18" type="text" onkeypress='cnpjFormat("cnpj")' onblur="cnpjValidadeExisting()" placeholder="CNPJ" required="" value="<?php  if(isset($_POST['cnpj'])) echo htmlspecialchars($_POST['cnpj']); ?>" >
                                    <span class="help is-success">Ex. 125.966.000/0001-96</span>
                                    <div id="cnpj-erro"><?php if(isset($_SESSION['erro-cnpj'])) echo $erro_form->getErroFormulario("Cnpj"); else echo $erro_form->setErroFormulario(); ?></div>
                                </p>
                                <p class="control">
                                    <label class="checkbox">
                                        <input type="checkbox" name="telemarketing"> Empresa de Telemarketing
                                    </label>
                                </p>
                            </div>
                        </section>
                    </div>
                    <div class="column">
                        <section class="hero">
                            <div class="npTitle">
                                <div class="container is-fluid">
                                    <?php include_once ('app/view/view-form-end.php') ?>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="column">
                        <section class="hero">
                            <div class="npTitle">
                                <h1 class="title is-6">
                                    TELEFONE(S)
                                </h1>
                                <h2 class="subtitle is-6">

                                </h2>
                                <hr>
                                <label class="label">Número(s)</label>
                                <p class="control">
                                    <input <?php if(isset($_SESSION['erro-telefone'])) echo 'class="input-w-4 is-danger"'; else echo 'class="input-w-4 is-sucess"'; ?> id="telefone" name="telefone" type="text" maxlength="14" placeholder="(99)99999-9999" onkeypress='telefoneFormat("telefone")' onblur="telefoneValidadeExisting()" required="" value="<?php  if(isset($_POST['telefone'])) echo htmlspecialchars($_POST['telefone']); ?>" >
                                    <span class="help">Ex. (83) 99682-6985</span>
                                    <div id="tel-erro"><?php if(isset($_SESSION['erro-telefone'])) echo $erro_form->getErroFormulario("Telefone"); else echo $erro_form->setErroFormulario(); ?></div>
                                </p>

                                <h1 class="title is-6">
                                    ACESSO
                                </h1>
                                <h2 class="subtitle is-6">

                                </h2>
                                <hr>
                                <label class="label">Email</label>
                                <p class="control">
                                    <input  <?php if(isset($_SESSION['erro-email'])) echo 'class="input-w-6 is-danger"'; else echo 'class="input-w-6 is-sucess"'; ?> id="email" name="email" type="text" maxlength="100" placeholder="Email" required="" onblur="emailValidadeExisting()" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                                    <div id="email-erro"><?php if(isset($_SESSION['erro-email'])) echo $erro_form->getErroFormulario("Email"); else echo $erro_form->setErroFormulario(); ?></div>
                                </p>
                                <label class="label">Senha</label>
                                <p class="control">
                                    <input class="input-w-4" id="senha" name="senha" type="password" maxlength="60" placeholder="Senha" required="" value="<?php  if(isset($_POST['senha'])) echo htmlspecialchars($_POST['senha']); ?>">
                                </p>
                                <label class="label">Confirmar Senha</label>
                                <p class="control">
                                    <input  <?php if(isset($_SESSION['erro-repetir-senha'])) echo 'class="input-w-4 is-danger"'; else echo 'class="input-w-4 is-sucess"'; ?> id="repetir_senha" name="repetir_senha" type="password" maxlength="60"  placeholder="Confirma Senha" required="" value="<?php  if(isset($_POST['repetir_senha'])) echo htmlspecialchars($_POST['repetir_senha']); ?>">
                                    <div id="senha-erro"><?php if(isset($_SESSION['erro-repetir-senha'])) echo $erro_form->getErroFormulario("Senha"); else echo $erro_form->setErroFormulario(); ?></div>
                                </p>
                                <br>
                                <p class="control">
                                    <div class="media">
                                        <div class="media-left">
                                            <input type="checkbox" required="" name="termo">
                                        </div>
                                        <div class="media-content">
                                            <div class="content">
                                                  <label class="checkbox np-justify" style="font-size: 11px;">Declaro que todas as informações aqui inseridas são verdadeiras.  Estou ciente que a eventual inexatidão dos dados aqui descritos podem acarretar responsabilidade civil e penal. A modificação dos dados do cadastro poderá ser efetuada mediante utilização de senha, de caráter pessoal e intransferível, de minha responsabilidade.
                                                  <div id="termo-erro"><?php if(isset($_SESSION['erro-termo'])) echo $erro_form->getErroFormulario("Aceitar o Termo"); else echo $erro_form->setErroFormulario(); ?></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </p>
                                <br>
                                <div class="control is-grouped is-pulled-right">
                                    <p class="control">
                                        <button id="button1id" name="button1id" class="button is-primary" type="submit">Salvar</button>
                                    </p>
                                    <p class="control">
                                        <button id="Cancelar" name="Cancelar" type="reset" class="button is-warning" onclick="history.go(-1)">Cancelar</button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <section>
        <?php include_once 'app/view/partlals/footer.php' ?>
