<?php
    Session::getName('u_s_pf');
    Session::gerarId();

    $HOME = '';
    $PESSOA = '';
    $LOGIN = '<a class="nav-item is-active" href="logout"><span>SAIR</span></a>';
?>
<?php include_once 'app/view/partlals/header.php' ?>
<script src="app/assets/js/update-form-session.js" charset="utf-8"></script>
<script src="app/assets/js/np-procon-pb.js" charset="utf-8"></script>
<div class="principal np-card-1 animated animate fadeInDown">
<section class="hero np-padding-20">
    <div class="npTitle">
        <h1 class="title is-4 animated animate fadeInDown">
            Pessoa Física
        </h1>
        <h2 class="subtitle is-6">
            Perfil
        </h2>
        <hr>
        <div class="columns">
            <div class="column">
                <p class="control">
                    <form method="post" action="add-telefone">
                        <input id="usuario" name="usuario" type="hidden" value="<?=$pessoa['id_usuario'] ?>">
                        <input class="input-w-4" id="novo_tel" autofocus name="novo_tel" placeholder="(99)99999-9999" onkeypress='newPhone()' maxlength="14" required="" >
                        <input class="button is-primary is-outlined" type="submit" value="Adicionar"/>
                        <span class="help">Aqui é possível adicionar novos números de telefone ao cadastro de bloqueio.</span>
                    </form>
                </p>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="panel">
                    <div class="panel-heading">
                        <p class="title is-6">
                            <strong>TELEFONE(S)</strong>
                        </p>
                    </div>
                    <div class="panel-block">

                        <form class="control" action="upt-telefone">
                            <?php
                            $i = 0;
                            foreach ($telefone as $key) { ?>
                                <div class="columns">
                                    <div class="column">
                                        <?php if ($i == 0) {
                                            echo '<label class="label">Número(s)</label>';
                                        }?>
                                        <p class="control">
                                            <input id="id_tel<?=$i?>" value="<?=$key['id_telefone'] ?>" type="hidden">
                                            <input id="id_usu<?=$i?>" value="<?=$key['id_usuario'] ?>" type="hidden">
                                            <input id="tel<?=$i?>" class="input-w-4" maxlength="14" name="telefone" type="text" placeholder="(99) 99999-9999" onkeypress='telefoneFormat("tel"+<?=$i?>)' required="" value="<?=$key['telefone_numero'] ?>">
                                        </p>
                                    </div>
                                    <div class="column">
                                        <?php if ($i == 0) {
                                            echo '<label class="label">Data</label>';
                                        }?>
                                        <p class="control">
                                            <input class="input-w-4" disabled name="data" type="text" maxlength="8" value="<?=$key['data_cadastro'] ?>">
                                        </p>
                                    </div>
                                    <div class="column">
                                        <?php if ($i == 0) {
                                            echo '<label class="label">&nbsp;</label>';
                                        }?>
                                        <p class="control">
                                            <button class="button is-primary" type="button" onclick='updateTelefone("#id_tel"+<?=$i?>,"#id_usu"+<?=$i?>,"#tel"+<?=$i?>)'; title="Salvar"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                                        </p>
                                    </div>
                                    <div class="column">
                                        <?php if ($i == 0) {
                                            echo '<label class="label">&nbsp;</label>';
                                        }?>
                                        <p class="control">
                                            <button class="button is-danger" type="button" onclick='deleteTelefone("#id_tel"+<?=$i?>,"#id_usu"+<?=$i?>,"#tel"+<?=$i?>)'; title="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </p>
                                    </div>
                                </div>
                                <?php $i++;} ?>
                                <!-- <br> -->
                            </form>
                            <p>&nbsp;</p>
                        </div>
                        <div id="tel"></div>
                </div>
                </div>
                <div class="column">
                    <div class="panel">
                        <div class="panel-heading">
                            <p class="title is-6">
                                <strong>LOGIN</strong>
                            </p>
                        </div>
                        <div class="panel-block">

                            <form class="control" method="post" action="/cadastro-pf">

                                <div class="columns">
                                    <div class="column">
                                        <label class="label">Email</label>
                                        <p class="control">
                                            <input class="input" id="email" name="email" type="text" maxlength="100" placeholder="Email" value="<?=$pessoa['email'] ?>" required="">
                                        </p>
                                    </div>
                                </div>
                                <div class="columns">
                                    <div class="column">
                                        <label class="label">Senha</label>
                                        <p class="control">
                                            <input class="input" id="senha" name="senha" type="password" maxlength="60" placeholder="*********" required="">
                                        </p>
                                    </div>

                                    <div class="column">
                                        <label class="label">Confirmar Senha</label>
                                        <p class="control">
                                            <input class="input" id="repetir_senha" name="repetir_senha" type="password" maxlength="60" placeholder="*********" required="">
                                        </p>
                                    </div>

                                </div>
                            </form>
                            <p>&nbsp;</p>
                        </div>
                        <div id="login"></div>
                        <p>&nbsp;</p>
                        <p class="control is-pulled-right">
                            <input id="id_login" value="<?=$pessoa['id_usuario'] ?>" type="hidden">
                            <button class="button is-primary is-outlined" type="button" onclick="updatePassword()">  Alterar </button>
                        </p>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <p class="title is-6">
                        <strong>DADOS</strong>
                    </p>
                </div>
                <div class="panel-block">

                    <form class="control">

                        <div class="columns">
                            <div class="column is-half">
                                <p class="control">
                                    <label class="label">Nome</label>
                                </p>
                                <input class="input" id="nome" name="nome" maxlength="150" value="<?=$pessoa['nome'] ?>" required="">
                            </div>
                            <div class="column">
                                <p class="control">
                                    <label class="label">CPF</label>
                                </p>
                                <p class="control">
                                    <input class="input-w-6" id="cpf" name="cpf" maxlength="14" value="<?= $dados['cpf']?>" required="">
                                </p>
                            </div>

                            <div class="column">
                                <p class="control">
                                    <label class="label">Identidade</label>
                                </p>
                                <p class="control">
                                    <input class="input-w-4" id="rg" name="rg" maxlength="10" value="<?=$dados['rg'] ?>" required="" >
                                </p>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-half">
                                <label class="label">Orgão Expedidor</label>
                                <p class="control">
                                    <input class="input-w-3" id="orgao_expedidor" name="orgao_expedidor" maxlength="5" value="<?=$dados['orgao_expedidor'] ?>" required="" >
                                </p>
                            </div>
                            <div class="column">
                                <label class="label">UF</label>
                                <p class="control">
                                    <input class="input-w-3" id="uf" name="uf" value="<?=$dados['uf'] ?>" maxlength="2" required=""  >
                                </p>
                            </div>
                            <div class="column">
                                <label class="label">Data da Expedição</label>
                                <p class="control">
                                    <input class="input-w-4" id="dataexpedicao" name="dataexpedicao" maxlength="8" value="<?=$dados['data_expedicao'] ?>" required="" >
                                </p>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                    </div>
                    <div id="documento"></div>
                    <br>
                    <input id="doc" type="hidden" value="<?=$pessoa['id_usuario'] ?>">
                    <button class="button is-primary is-outlined" type="button" onclick="updateDoc()">  Alterar </button>
                </form>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <p class="title is-6">
                        <strong>ENDEREÇO</strong>
                    </p>
                </div>
                <div class="panel-block">
                    <form class="control">
                        <div class="columns">
                            <div class="column is-half">
                                <label class="label">Logradouro</label>
                                <p class="control">
                                    <input class="input" id="rua" name="rua" maxlength="100" value="<?=$pessoa['rua'] ?>" required="">
                                </p>
                            </div>
                            <div class="column">
                                <label class="label">Número</label>
                                <p class="control">
                                    <input class="input-w-3" id="numero" name="numero" maxlength="4" value="<?=$pessoa['numero'] ?>">
                                </p>
                            </div>

                            <div class="column">
                                <label class="label">Complemento</label>
                                <p class="control">
                                    <input class="input-w-4" id="complemento" name="complemento" maxlength="100" value="<?=$pessoa['complemento'] ?>">
                                </p>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Bairro</label>
                                <p class="control">
                                    <input class="input-w-4" id="bairro" name="bairro" maxlength="45" value="<?=$pessoa['bairro'] ?>" required="">
                                </p>
                            </div>
                            <div class="column">
                                <label class="label">Cidade</label>
                                <p class="control">
                                    <input class="input-w-4" id="cidade" name="cidade" maxlength="45" value="<?=$pessoa['cidade'] ?>" required="" >
                                </p>
                            </div>

                            <div class="column">
                                <label class="label">CEP</label>
                                <p class="control">
                                    <input class="input-w-3" id="cep" name="cep" maxlength="9" onkeypress='cepFormat("cep")' value="<?=$pessoa['cep'] ?>" required="" >
                                </p>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                </div>
                <div id="endereco"></div>
                <p>&nbsp;</p>
                <p class="control">
                    <input id="id_endereco" type="hidden" value="<?=$pessoa['id_usuario'] ?>">
                    <button class="button is-primary is-outlined" type="button" onclick="updateAddress()">  Alterar </button>
                </p>
            </form>
            </div>
        </div>
    </section>
    <?php include_once ('app/view/partlals/footer.php') ?>
