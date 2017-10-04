<?php
    Session::getName('u_s_pj');
    Session::gerarId();

    $PESSOA = ($pessoa['type']==='tlm')? '<a class="nav-item is-active" href="session-pj"><span>Meus Dados</span></a><a class="nav-item" href="list"><span>Listagem</span></a>':'';
    $HOME = '';
    $LOGIN = '<a class="nav-item is_active" href="logout"><span>SAIR</span></a>';

    include_once 'app/view/partlals/header.php';
?>
<script src="app/assets/js/update-form-session.js" charset="utf-8"></script>
<script src="app/assets/js/np-procon-pb.js" charset="utf-8"></script>
<div class="principal np-card-1">
<section class="hero np-padding-20">
    <div class="npTitle">
        <h1 class="title is-4">
            Pessoa Jurídica
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

                        <form class="control">
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
                                            <input class="input-w-4" disabled name="data" type="text" value="<?=$key['data_cadastro'] ?>">
                                        </p>
                                    </div>
                                    <div class="column">
                                        <?php if ($i == 0) {
                                            echo '<label class="label">&nbsp;</label>';
                                        }?>
                                        <p class="control">
                                            <button class="button is-primary" type="button" onclick='updateTelefone("#id_tel"+<?=$i?>,"#id_usu"+<?=$i?>,"#tel"+<?=$i?>)';>Alterar</button>
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
                                            <input class="input" id="senha" name="senha" type="password" maxlength="60" placeholder="**********" required="">
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
                        <p class="control">
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
                                    <label class="label">Razão Social</label>
                                </p>
                                <input class="input" id="nome" name="nome" maxlength="150" value="<?=$pessoa['nome'] ?>" required="">
                            </div>
                            <div class="column">
                                <p class="control">
                                    <label class="label">CNPJ</label>
                                </p>
                                <p class="control">
                                    <input class="input-w-6" id="cnpj" name="cnpj" maxlength="18" onkeypress='cnpjFormat("cnpj")' value="<?=$dados['cnpj'] ?>" required="">
                                </p>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                    </div>
                    <div id="documento"></div>
                    <br>
                    <input id="doc" type="hidden" value="<?=$pessoa['id_usuario'] ?>">
                    <button class="button is-primary is-outlined" type="button" onclick="updateDocPj()">  Alterar </button>
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
            <?php if($pessoa['type']==='tlm'){?>
                <div class="panel">
                <div class="panel-heading">
                    <p class="title is-6">
                        <strong>TOKEN</strong>
                    </p>
                </div>
                <div class="panel-block">
                    <form class="control">
                        <div class="columns">
                            <div class="column is-half">
                                <label class="label">Chave</label>
                                <p class="control">
                                    <input id="usuario" name="usuario" type="hidden" value="<?=$pessoa['id_usuario'] ?>">
                                    <input class="input-w-8" id="token" required=""  name="token"  placeholder="Digite uma palavra chave">
                                    <button class="button is-primary" type="button" onclick='gerarToken()';>Gerar</button>
                                    <span class="help">Gerar token para acesso remoto.</span>
                                </p>
                            </div>
                        </div>
                        <?php if(!empty($dados['identificador'] && !empty($dados['token']))) { ?>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Url</label>
                                <p class="control">
                                    <span class="help">http://localhost:3000/relatorio/</span>
                                </p>
                            </div>
                            <div class="column">
                                <label class="label">Tipo Relatorio</label>
                                <p class="control">
                                    <span class="help">JSON/XML/CSV</span>
                                </p>
                            </div>
                            <div class="column">
                                <label class="label">Identificador</label>
                                <p class="control">
                                    <span class="help" id="identificadorg"><?=$dados['identificador']?></span>
                                </p>
                            </div>
                            <div class="column">
                                <label class="label">Token</label>
                                <p class="control">
                                    <div class="help" id="tokeng"><?=$dados['token']?></div>
                                </p>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                                <label class="label">Request</label>
                                  <textarea class="textarea" placeholder="10 lines of textarea" rows="80">URL:      http://localhost:3000/relatorio/ <?="\n";?>Paramets { <?="\n";?>Tipo de Relatorio:      doc=json <?="\n";?>Identificador:      id=162309335a880faeefb5e608f <?="\n";?>Token:        token=01jdie6f83d0abk95782254079dba655<?="\n";?>}</textarea>
                            </div>
                            <div class="column">
                                <label class="label">Response</label>
                                  <textarea class="textarea" placeholder="10 lines of textarea" rows="80">[{<?="\n";?>    'telefone_numero':'(00) 0000-0000','data_cadastro':'2017-05-31 10:43:56'<?="\n";?>}]</textarea>
                            </div>
                        </div>
                    <?php } ?>
                    </form>
                </div>
            </div>
            <?php  } ?>
    </section>
    <?php include_once ('app/view/partlals/footer.php') ?>
