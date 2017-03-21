<?php

      Session::getName('u_n_pf');
      Session::gerarId();

      $HOME = '<a class="nav-item is-active" href="pessoa-fisica"><span>Pessoa Física</span></a>';
      $PESSOA = '<a class="nav-item " href="pessoa-juridica"><span>Pessoa Jurídica</span></a>';
      $LOGIN = '<a class="nav-item" href="login"><span>ENTRAR</span></a>';

      $erro_form = PagesController::getPagesController();

      $estados = array('0'  => 'AC','1'  => 'AL','2'  => 'AM','3'  => 'AP','4'  => 'BA','5'  => 'CE','6'  => 'DF','7'  => 'ES','8'  => 'GO','9'  => 'MA','10' => 'MT','11' => 'MS','12' => 'MG','13' => 'PA','14' => 'PB','15' => 'PR','16' => 'PE','17' => 'PI','18' => 'RJ','19' => 'RN','20' => 'RO','21' => 'RS','22' => 'RR','23' => 'SC','24' => 'SE','25' => 'SP','26' => 'TO',
        );
      include_once ('app/view/partlals/header.php');
?>
<script src="app/assets/js/np-procon-pb.js" charset="utf-8"></script>
<script src="app/assets/js/validate-existing-data.js" charset="utf-8"></script>
<div class="principal np-card-1">
    <section class="hero np-padding-20">
        <div class="npTitle">
            <h1 class="title is-4">
                Pessoa Física
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
                            <form class="control" method="post" action="/cadastro-pf" enctype="multipart/form-data">
                                <label class="label">Nome</label>
                                <p class="control">
                                    <input <?php if(isset($_SESSION['erro-nome'])) echo 'class="input-w-8 is-danger"'; else echo 'class="input-w-8 is-sucess"'; ?> id="nome" name="nome" autofocus type="text" placeholder="Digite seu nome" maxlength="100" required="" value="<?php  if(isset($_POST['nome'])) echo htmlspecialchars($_POST['nome']); ?>" >
                                    <div id="nome-erro"><?php if(isset($_SESSION['erro-nome'])) echo $erro_form->getErroFormulario("Nome"); else echo $erro_form->setErroFormulario(); ?></div>
                                </p>
                                <label class="label">CPF</label>
                                <p class="control">
                                    <input name="type" type="hidden" value="pf">
                                    <input <?php if(isset($_SESSION['erro-cpf'])) echo 'class="input-w-4 is-danger"'; else echo 'class="input-w-4 is-sucess"'; ?> id="cpf" name="cpf" type="text" onblur="cpfValidadeExisting()" placeholder="CPF" maxlength="14" required="" value="<?php  if(isset($_POST['cpf'])) echo htmlspecialchars($_POST['cpf']); ?>">
                                    <div id="cpf-erro"><?php if(isset($_SESSION['erro-cpf'])) echo $erro_form->getErroFormulario("Cpf"); else echo $erro_form->setErroFormulario(); ?></div>
                                </p>
                                <label class="label">Identidade</label>
                                <p class="control">
                                    <input <?php if(isset($_SESSION['erro-rg'])) echo 'class="input-w-4 is-danger"'; else echo 'class="input-w-4 is-sucess"'; ?> id="rg" name="rg" type="text" onblur="rgValidadeExisting()"  placeholder="RG" maxlength="9" required="" value="<?php  if(isset($_POST['rg'])) echo htmlspecialchars($_POST['rg']); ?>" >
                                    <div id="rg-erro"><?php if(isset($_SESSION['erro-rg'])) echo $erro_form->getErroFormulario("Identidade"); else echo $erro_form->setErroFormulario(); ?></div>
                                </p>
                                <label class="label">Data da Expedição</label>
                                <p class="control">
                                    <input <?php if(isset($_SESSION['erro-data'])) echo 'class="input-w-4 is-danger"'; else echo 'class="input-w-4 is-sucess"'; ?> id="dataexpedicao" maxlength="8" onblur="dataValidadeExisting()"  name="dataexpedicao" maxlength="8"  type="date_format" placeholder="dd/mm/aa"  required="" value="<?php  if(isset($_POST['dataexpedicao'])) echo htmlspecialchars($_POST['dataexpedicao']); ?>" >
                                    <div id="data-erro"><?php if(isset($_SESSION['erro-data'])) echo $erro_form->getErroFormulario("Data"); else echo $erro_form->setErroFormulario(); ?></div>
                                </p>
                                <label class="label">Orgão Expedidor</label>
                                <p class="control">
                                    <input <?php if(isset($_SESSION['erro-org'])) echo 'class="input-w-3 is-danger"'; else echo 'class="input-w-3 is-sucess"'; ?> id="nome" name="orgao_expedidor" type="text" onblur="orgValidadeExisting()"  maxlength="6" placeholder="Org"  required="" value="<?php  if(isset($_POST['orgao_expedidor'])) echo htmlspecialchars($_POST['orgao_expedidor']); ?>" >
                                    <div id="org-erro"><?php if(isset($_SESSION['erro-org'])) echo $erro_form->getErroFormulario("Orgão Expedidor"); else echo $erro_form->setErroFormulario(); ?></div>
                                </p>
                                <label class="label">UF</label>
                                    <p class="control">
                                      <span class="select">
                                        <select name="uf">
                                          <option value="">---</option>
                                          <?php foreach ($estados as $key => $value) {?>
                                            <option value="<?=strtolower($value)?>"><?=$value?></option>
                                          <?php } ?>
                                        </select>
                                      </span>
                                    </p>
                                  </select>
                            </div>
                        <div id="uf-erro"><?php if(isset($_SESSION['erro-uf'])) echo $erro_form->getErroFormulario("UF"); else echo $erro_form->setErroFormulario(); ?></div>
                    </div>
                  </select>
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
                                  <p class="control" id="telefoneOrigem">
                                      <input <?php if(isset($_SESSION['erro-telefone'])) echo 'class="input-w-4 is-danger"'; else echo 'class="input-w-4 is-sucess"'; ?> id="telefone" name="telefone[]" type="text" onblur="telefoneValidadeExisting('telefone')" maxlength="14" placeholder="(DD) xxxxx-xxxx" onkeypress='telefoneFormat("telefone")' required="" value="<?php  if(isset($_POST['telefone-0'])) echo htmlspecialchars($_POST['telefone-0']); ?>" >
                                      <!-- <a class="button is-success is-active" id="add" >Add +</a> -->
                                  </p>
                                 <div id="control-add"></div>

                                <span class="help">Ex. (83) 99682-6985</span>
                                <div id="tel-erro"><?php if(isset($_SESSION['erro-telefone'])) echo $erro_form->getErroFormulario("Telefone"); else echo $erro_form->setErroFormulario(); ?></div>
                                <h1 class="title is-6">
                                    ACESSO
                                </h1>
                                <h2 class="subtitle is-6"></h2>
                                <hr>
                                <label class="label">Email</label>
                                <p class="control">
                                    <input <?php if(isset($_SESSION['erro-email'])) echo 'class="input-w-6 is-danger"'; else echo 'class="input-w-6 is-sucess"'; ?> id="email" name="email" type="text" maxlength="100" onblur="emailValidadeExisting()" placeholder="Email" required="" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                                </p>
                                <div id="email-erro"><?php if(isset($_SESSION['erro-email'])) echo $erro_form->getErroFormulario("Email"); else echo $erro_form->setErroFormulario(); ?></div>

                                <label class="label">Senha</label>
                                <p class="control">
                                    <input class="input-w-4" id="senha" name="senha" type="password" maxlength="60" placeholder="Senha" required="" value="<?php  if(isset($_POST['senha'])) echo htmlspecialchars($_POST['senha']); ?>">
                                </p>
                                <label class="label">Confirmar Senha</label>
                                <p class="control">
                                    <input <?php if(isset($_SESSION['erro-repetir-senha'])) echo 'class="input-w-4 is-danger"'; else echo 'class="input-w-4 is-sucess"'; ?> id="repetir_senha" name="repetir_senha" maxlength="60" type="password" placeholder="Confirma Senha" required="" value="<?php  if(isset($_POST['repetir_senha'])) echo htmlspecialchars($_POST['repetir_senha']); ?>">
                                </p>
                                <div id="senha-erro"><?php if(isset($_SESSION['erro-repiter-senha'])) echo $erro_form->getErroFormulario("Senha"); else echo $erro_form->setErroFormulario(); ?></div>

                                <br>
                                <p class="control">
                                    <div class="media">
                                        <div class="media-left">
                                            <input type="checkbox" required="" name="termo">
                                        </div>
                                        <div class="media-content">
                                            <div class="content">
                                                <label class="checkbox np-justify" style="font-size: 11px;">Declaro que todas as informações aqui inseridas são verdadeiras.  Estou ciente que a eventual inexatidão dos dados aqui descritos podem acarretar responsabilidade civil e penal. A modificação dos dados do cadastro poderá ser efetuada mediante utilização de senha, de caráter pessoal e intransferível, de minha responsabilidade.
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
