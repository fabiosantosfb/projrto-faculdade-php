<?php include_once ('app/view/partlals/header.php') ?>
<script src="app/assets/js/np-procon-pb.js" charset="utf-8"></script>


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
                                <input class="input-w-8" id="nome" name="nome"  type="text" placeholder="Digite seu nome" required="" value="<?php  if(isset($_POST['nome'])) echo htmlspecialchars($_POST['nome']); ?>" >
                            </p>
                            <label class="label">CPF</label>
                            <p class="control">
                                <input name="type" type="hidden" value="pf">
                                <input class="input-w-4" id="cpf" name="cpf" type="text" placeholder="CPF" required="" value="<?php  if(isset($_POST['cpf'])) echo htmlspecialchars($_POST['cpf']); ?>">
                            </p>
                            <label class="label">Identidade</label>
                            <p class="control">
                                <input class="input-w-4" id="rg" name="rg" type="text" placeholder="RG" required="" value="<?php  if(isset($_POST['rg'])) echo htmlspecialchars($_POST['rg']); ?>" >
                            </p>
                            <label class="label">Data da Expedição</label>
                            <p class="control">
                                <input class="input-w-4" id="dataexpedicao" name="dataexpedicao" type="date_format" placeholder="dd/mm/aaaa"  required="" value="<?php  if(isset($_POST['dataexpedicao'])) echo htmlspecialchars($_POST['dataexpedicao']); ?>" >
                            </p>
                            <label class="label">Orgão Expedidor</label>
                            <p class="control">
                                <input class="input-w-3" id="nome" name="orgao_expedidor" type="text" placeholder="Org"  required="" value="<?php  if(isset($_POST['orgao_expedidor'])) echo htmlspecialchars($_POST['orgao_expedidor']); ?>" >
                            </p>
                            <label class="label">UF</label>
                            <p class="control">
                                <input class="input-w-3" id="uf" name="uf" type="text" placeholder="UF"  required="" value="<?php  if(isset($_POST['uf'])) echo htmlspecialchars($_POST['uf']); ?>"  >
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
                                <input class="input-w-3" maxlength="15" id="telefone" name="telefone" type="text" placeholder="00 00000 0000" required="" value="<?php  if(isset($_POST['telefone'])) echo htmlspecialchars($_POST['telefone']); ?>" >
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
                                    <input class="input-w-6" id="email" name="email" type="text" placeholder="Email" required="" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                                </p>
                                <label class="label">Senha</label>
                                <p class="control">
                                    <input class="input-w-4" id="senha" name="senha" type="password" placeholder="Senha" required="" value="<?php  if(isset($_POST['senha'])) echo htmlspecialchars($_POST['senha']); ?>">
                                </p>
                                <label class="label">Confirmar Senha</label>
                                <p class="control">
                                    <input class="input-w-4" id="repetir_senha" name="repetir_senha" type="password" placeholder="Confirma Senha" required="" value="<?php  if(isset($_POST['repetir_senha'])) echo htmlspecialchars($_POST['repetir_senha']); ?>">
                                </p>
                                <div class="control is-grouped">
                                    <p class="control">
                                        <button id="button1id" name="button1id" class="button is-primary" type="submit">Salvar</button>
                                    </p>
                                    <p class="control">
                                        <button id="Cancelar" name="Cancelar" type="reset" class="button is-link" onclick="history.go(-1)">Cancelar</button>
                                    </p>
                                </div>
                                <p class="control">
                                    <input type="checkbox" required="" name="telemarketing">
                                    <label class="checkbox" style="font-size: 11px;">Declaro que todas as informações aqui inseridas são verdadeiras.  Estou ciente que a eventual inexatidão dos dados aqui descritos podem acarretar responsabilização civil e penal.
                                    </label>
                                </p>

                            </form>

                    </div>
                </section>
            </div>
        </div>
    </div>

    <section>

        <!--  <?php //if($this->ERRO_FORM) echo "<script>alert('$this->erro')</script>";?>-->
        <?php include_once 'app/view/partlals/footer.php' ?>
