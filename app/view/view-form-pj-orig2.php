<?php include_once ('app/view/partlals/header.php') ?>
<script src="app/assets/js/np-procon-pb-pj.js" charset="utf-8"></script>
<div class="columns">
    <div class="column">
        <section class="hero">
            <div class="npTitle">
                <div class="container is-fluid">
                    <h1 class="title is-4">
                        Pessoa Jurídica
                    </h1>
                    <h2 class="subtitle is-6">
                        Informe seu dados, endereço e telefone(s) que deseja realizar o bloqueio
                    </h2>
                    <form class="control" method="post" action="cadastro-pj">
                        <p class="control is-pulled-right">
                            <label class="checkbox">
                                <input type="checkbox" name="telemarketing"> Empresa de Telemarketing
                            </label>
                        </p>
                        <label class="label">CNPJ</label>
                        <p class="control">
                            <input name="type" type="hidden" value="pj">
                            <input class="input-w-4" id="cnpj" name="cnpj" type="text" placeholder="CNPJ" required="" value="<?php  if(isset($_POST['cnpj'])) echo htmlspecialchars($_POST['cnpj']); ?>" >
                            <span class="help is-success">Ex. 125.966.000/0001-96</span>
                        </p>
                        <label class="label">Razão Social</label>
                        <p class="control">
                            <input class="input" id="nome" name="nome" type="text" placeholder="Razao social" required="" value="<?php  if(isset($_POST['nome'])) echo htmlspecialchars($_POST['nome']); ?>">
                            <span class="help is-success">Preencha corretamente, conforme o registro na Receita Federal.</span>
                        </p>
                        <?php include_once ('app/view/view-form-end.php') ?>
                    </div>
                </div>
            </section>
        </div>
        <div class="column">
            <section class="hero">
                <div class="npTitle">
                    <div class="container is-fluid">
                        <h1 class="title is-5">
                            <p>&nbsp;</p>
                        </h1>
                        <h2 class="subtitle is-6">
                            <p>&nbsp;</p>
                        </h2>
                        <div class="tile is-ancestor">
                            <div class="tile is-12 is-vertical is-parent">
                                <div class="tile is-child box notification is-danger">
                                    <p class="title is-5">Telefones a serem bloqueados:</p>
                                    <label class="label">Número(s)</label>
                                    <p class="control">
                                        <input class="input-w-3" maxlength="15" id="telefone" name="telefone" type="text" placeholder="00 00000 0000" required="" value="<?php  if(isset($_POST['telefone'])) echo htmlspecialchars($_POST['telefone']); ?>" >
                                        <span class="help">Ex. (83) 99682-6985</span>
                                    </p>
                                </div>

                                <div class="tile is-child box">
                                    <p class="title is-5">Dados para acesso</p>
                                    <label class="label">Email</label>
                                    <p class="control">
                                        <input class="input-w-6" id="email" name="email" type="text" placeholder="Email" required="" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
                                        <span class="help is-success">Ex. seunome@email.com</span>
                                    </p>
                                    <label class="label">Senha</label>
                                    <p class="control">
                                        <input class="input-w-4" id="senha" name="senha" type="password" placeholder="Senha" required="" value="<?php  if(isset($_POST['senha'])) echo htmlspecialchars($_POST['senha']); ?>">
                                        <span class="help is-success">Caracteres (a-z, A-Z, 0-9, #@$%!?)</span>
                                    </p>
                                    <label class="label">Confirmar Senha</label>
                                    <p class="control">
                                        <input class="input-w-4" id="repetir_senha" name="repetir_senha" type="password" placeholder="Confirma Senha" required="" value="<?php  if(isset($_POST['repetir_senha'])) echo htmlspecialchars($_POST['repetir_senha']); ?>">
                                        <span class="help is-success">Caracteres (a-z, A-Z, 0-9, #@$%!?)</span>
                                    </p>
                                    <p class="control">
                                        <label class="checkbox">Declaro que todas as informações aqui inseridas são verdadeiras e que até a presente data sou titular da linha e/ou endereço eletrônico cadastrado. Estou ciente que a eventual inexatidão dos dados aqui descritos pode acarretar responsabilização civil e penal. A modificação dos dados do cadastro poderá ser efetuada mediante utilização de senha, de caráter pessoal e intransferível, de minha responsabilidade.
                                        </label>
                                        <input type="checkbox" required="" name="telemarketing">
                                    </label>
                                </p>
                                <div class="control is-grouped">
                                    <p class="control">
                                        <button id="button1id" name="button1id" class="button is-primary" type="submit">Salvar</button>
                                    </p>
                                    <p class="control">
                                        <button id="Cancelar" name="Cancelar" type="reset" class="button is-link" onclick="history.go(-1)">Cancelar</button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<!--  <?php //if($this->ERRO_FORM) echo "<script>alert('$this->erro')</script>";?>-->
<?php include_once 'app/view/partlals/footer.php' ?>
