<?php include_once ('app/view/partlals/header.php') ?>
<script src="app/assets/js/np-procon-pb.js" charset="utf-8"></script>

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
                            <form class="control" method="post" action="/cadastro-pj">
                                <label class="label">Razão Social</label>
                                <p class="control">
                                    <input class="input" id="nome" maxlength="35"  autofocus name="nome" type="text" placeholder="Razao social" required="" value="<?php  if(isset($_POST['nome'])) echo htmlspecialchars($_POST['nome']); ?>">
                                    <span class="help is-success">Preencha corretamente, conforme o registro na Receita Federal.</span>
                                </p>
                                <label class="label">CNPJ</label>
                                <p class="control">
                                    <input name="type" type="hidden" value="pj">
                                    <input class="input-w-4" id="cnpj" name="cnpj" maxlength="19" type="text" placeholder="CNPJ" required="" value="<?php  if(isset($_POST['cnpj'])) echo htmlspecialchars($_POST['cnpj']); ?>" >
                                    <span class="help is-success">Ex. 125.966.000/0001-96</span>
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
                                    <input class="input-w-4" id="telefone" name="telefone" type="text" maxlength="14" placeholder="(99)99999-9999" onkeypress='telefoneFormat("telefone")' required="" value="<?php  if(isset($_POST['telefone'])) echo htmlspecialchars($_POST['telefone']); ?>" >
                                    <span class="help">Ex. (83) 99682-6985</span>
                                </p>
                                <h1 class="title is-6">
                                    ACESSO
                                </h1>
                                <h2 class="subtitle is-6">

                                </h2>
                                <hr>
                                <label class="label">Email</label>
                                <p class="control">
                                    <input class="input-w-6" id="email" name="email" type="text" maxlength="100" placeholder="Email" required="" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                                </p>
                                <label class="label">Senha</label>
                                <p class="control">
                                    <input class="input-w-4" id="senha" name="senha" type="password" maxlength="60" placeholder="Senha" required="" value="<?php  if(isset($_POST['senha'])) echo htmlspecialchars($_POST['senha']); ?>">
                                </p>
                                <label class="label">Confirmar Senha</label>
                                <p class="control">
                                    <input class="input-w-4" id="repetir_senha" name="repetir_senha" type="password" maxlength="60"  placeholder="Confirma Senha" required="" value="<?php  if(isset($_POST['repetir_senha'])) echo htmlspecialchars($_POST['repetir_senha']); ?>">
                                </p>
                                <br>
                                <p class="control">
                                    <div class="media">
                                        <div class="media-left">
                                            <input type="checkbox" required="" name="ok">
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

            <!--  <?php //if($this->ERRO_FORM) echo "<script>alert('$this->erro')</script>";?>-->
            <?php include_once 'app/view/partlals/footer.php' ?>
