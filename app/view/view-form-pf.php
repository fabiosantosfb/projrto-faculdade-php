<?php
      $HOME = '<a class="nav-item is-active" href="pessoa-fisica"><span>Pessoa Física</span></a>';
      $PESSOA = '<a class="nav-item " href="pessoa-juridica"><span>Pessoa Jurídica</span></a>';
      $LOGIN = '<a class="nav-item" href="login"><span>ENTRAR</span></a>';
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
                            <form class="control" method="post" action="/cadastro-pf">
                                <label class="label">Nome</label>
                                <p class="control">
                                    <input class="input-w-8" id="nome" name="nome" autofocus type="text" placeholder="Digite seu nome" maxlength="100" required="" value="<?php  if(isset($_POST['nome'])) echo htmlspecialchars($_POST['nome']); ?>" >
                                </p>
                                <label class="label">CPF</label>
                                <p class="control">
                                    <input name="type" type="hidden" value="pf">
                                    <input class="input-w-4" id="cpf" name="cpf" type="text" onblur="cpfValidadeExisting()" placeholder="CPF" maxlength="14" required="" value="<?php  if(isset($_POST['cpf'])) echo htmlspecialchars($_POST['cpf']); ?>">
                                </p>
                                <div id="cpf-erro"></div>
                                <label class="label">Identidade</label>
                                <p class="control">
                                    <input class="input-w-4" id="rg" name="rg" type="text" onblur="rgValidadeExisting()"  placeholder="RG" maxlength="9" required="" value="<?php  if(isset($_POST['rg'])) echo htmlspecialchars($_POST['rg']); ?>" >
                                </p>
                                <div id="rg-erro"></div>
                                <label class="label">Data da Expedição</label>
                                <p class="control">
                                    <input class="input-w-4" id="dataexpedicao" maxlength="8" onblur="dataValidadeExisting()"  name="dataexpedicao" maxlength="8"  type="date_format" placeholder="dd/mm/aa"  required="" value="<?php  if(isset($_POST['dataexpedicao'])) echo htmlspecialchars($_POST['dataexpedicao']); ?>" >
                                </p>
                                <div id="data-erro"></div>
                                <label class="label">Orgão Expedidor</label>
                                <p class="control">
                                    <input class="input-w-3" id="nome" name="orgao_expedidor" type="text" onblur="orgValidadeExisting()"  maxlength="6" placeholder="Org"  required="" value="<?php  if(isset($_POST['orgao_expedidor'])) echo htmlspecialchars($_POST['orgao_expedidor']); ?>" >
                                </p>
                                <div id="org-erro"></div>
                                <label class="label">UF</label>
                                <p class="control">
                                    <input class="input-w-3" id="uf" name="uf" type="text" maxlength="2" placeholder="UF" onblur="ufValidadeExisting()" required="" value="<?php  if(isset($_POST['uf'])) echo htmlspecialchars($_POST['uf']); ?>"  >
                                </p>
                                <div id="uf-erro"></div>
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
                                    <input class="input-w-4" id="telefone" name="telefone" type="text" onblur="telefoneValidadeExisting()" maxlength="14" placeholder="(99)99999-9999" onkeypress='telefoneFormat("telefone")' required="" value="<?php  if(isset($_POST['telefone'])) echo htmlspecialchars($_POST['telefone']); ?>" >
                                    <span class="help">Ex. (83) 99682-6985</span>
                                </p>
                                <div id="tel-erro"></div>
                                <h1 class="title is-6">
                                    ACESSO
                                </h1>
                                <h2 class="subtitle is-6">

                                </h2>
                                <hr>
                                <label class="label">Email</label>
                                <p class="control">
                                    <input class="input-w-6" id="email" name="email" type="text" maxlength="100" onblur="emailValidadeExisting()" placeholder="Email" required="" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                                </p>
                                <div id="email-erro"></div>
                                <label class="label">Senha</label>
                                <p class="control">
                                    <input class="input-w-4" id="senha" name="senha" type="password" maxlength="60" placeholder="Senha" required="" value="<?php  if(isset($_POST['senha'])) echo htmlspecialchars($_POST['senha']); ?>">
                                </p>
                                <label class="label">Confirmar Senha</label>
                                <p class="control">
                                    <input class="input-w-4" id="repetir_senha" name="repetir_senha" maxlength="60" type="password" placeholder="Confirma Senha" required="" value="<?php  if(isset($_POST['repetir_senha'])) echo htmlspecialchars($_POST['repetir_senha']); ?>">
                                </p>
                                <div id="pwd-erro"></div>
                                <br/>
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
                                <div id="termo-erro"></div>
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

            <!--  <?php //if($this->ERRO_FORM) echo "<script>alert('$this->erro')</script>";?>-->
            <?php include_once 'app/view/partlals/footer.php' ?>
