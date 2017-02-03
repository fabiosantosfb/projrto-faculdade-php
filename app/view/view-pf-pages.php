<?php
    $HOME = '';

    $PESSOA = '';

    $LOGIN = '
    <a class="button is-primary" href="logout">
      <span class="icon">
        <i class="fa fa-sign-out"></i>
      </span>
      <span>SAIR</span>
    </a>';

?>
<?php include_once 'app/view/partlals/header.php' ?>
<script src="app/assets/js/update-form-pf.js" charset="utf-8"></script>

<section class="hero np-padding-20">
    <div class="npTitle">
        <h1 class="title is-4">
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
                        <input id="usuario" name="usuario" type="hidden" value="<?=$pessoa['usuario_id_usuario'] ?>">
                        <input class="input-w-3" id="novo_tel" maxlength="15" name="novo_tel" placeholder="(99) 99999-9999" >
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

                        <form>
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
                                        <input id="id_usu<?=$i?>" value="<?=$key['usuario_id_usuario'] ?>" type="hidden">
                                        <input id="tel<?=$i?>" class="input-w-4" maxlength="15" name="telefone" type="text" placeholder="(99) 99999-9999" value="<?=$key['telefone_numero'] ?>">
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
                                    <label class="label">&nbsp;</label>
                                    <p class="control">
                                        <button class="button is-primary" type="button" onclick='updateTelefone("#id_tel"+<?=$i?>,"#id_usu"+<?=$i?>,"#tel"+<?=$i?>)';>Alterar</button>
                                    </p>
                                </div>
                            </div>
                            <?php $i++;} ?>
                        </form>
                        <p>&nbsp;</p>
                    </div>
                    <p>&nbsp;</p>
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
                                        <input class="input" id="email" name="email" type="text" placeholder="Email" value="<?=$usuario['email'] ?>">
                                    </p>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <label class="label">Senha</label>
                                    <p class="control">
                                        <input class="input" id="senha" name="senha" type="password" placeholder="Senha" value="*******">
                                    </p>
                                </div>

                                <div class="column">
                                    <label class="label">Confirmar Senha</label>
                                    <p class="control">
                                        <input class="input" id="repetir_senha" name="repetir_senha" type="password" placeholder="Confirma Senha"  value="*******">
                                    </p>
                                </div>

                            </div>
                        </form>
                        <p>&nbsp;</p>
                    </div>
                    <p>&nbsp;</p>
                    <p class="control">
                        <input id="id_login" value="<?=$usuario['id_usuario'] ?>" type="hidden">
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

                <form class="control" method="post" action="/cadastro-pf">

                    <div class="columns">
                        <div class="column is-half">
                            <p class="control">
                                <label class="label">Nome</label>
                            </p>
                            <input class="input" id="nome" name="nome"  type="text" placeholder="Digite seu nome" required="" value="<?php  if(isset($_POST['nome'])) echo htmlspecialchars($_POST['nome']); ?>" >
                        </div>
                        <div class="column">
                            <p class="control">
                                <label class="label">CPF</label>
                            </p>
                            <p class="control">
                                <input name="type" type="hidden" value="pf">
                                <input class="input-w-6" id="cpf" name="cpf" type="text" placeholder="CPF" required="" value="<?php  if(isset($_POST['cpf'])) echo htmlspecialchars($_POST['cpf']); ?>">
                            </p>
                        </div>

                        <div class="column">
                            <p class="control">
                                <label class="label">Identidade</label>
                            </p>
                            <p class="control">
                                <input class="input-w-4" id="rg" name="rg" type="text" placeholder="RG" required="" value="<?php  if(isset($_POST['rg'])) echo htmlspecialchars($_POST['rg']); ?>" >
                            </p>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-half">
                            <label class="label">Data da Expedição</label>
                            <p class="control">
                                <input class="input-w-4" id="dataexpedicao" maxlength="8" name="dataexpedicao" type="date_format" placeholder="dd/mm/aaaa"  required="" value="<?php  if(isset($_POST['dataexpedicao'])) echo htmlspecialchars($_POST['dataexpedicao']); ?>" >
                            </p>
                        </div>
                        <div class="column">
                            <label class="label">Orgão Expedidor</label>
                            <p class="control">
                                <input class="input-w-3" id="nome" name="orgao_expedidor" type="text" placeholder="Org"  required="" value="<?php  if(isset($_POST['orgao_expedidor'])) echo htmlspecialchars($_POST['orgao_expedidor']); ?>" >
                            </p>
                        </div>

                        <div class="column">
                            <label class="label">UF</label>
                            <p class="control">
                                <input class="input-w-3" id="uf" name="uf" type="text" placeholder="UF"  required="" value="<?php  if(isset($_POST['uf'])) echo htmlspecialchars($_POST['uf']); ?>"  >
                            </p>
                        </div>
                    </div>
                </form>
                <p>&nbsp;</p>
            </div>
            <br>
                <input id="id_endereco" type="hidden" value="<?=$pessoa['usuario_id_usuario'] ?>">
                <button class="button is-primary is-outlined" type="button" onclick="updateDoc()">  Alterar </button>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <p class="title is-6">
                    <strong>ENDEREÇO</strong>
                </p>
            </div>
            <div class="panel-block">

                <form class="control" method="post" action="/cadastro-pf">

                    <div class="columns">
                        <div class="column">
                            <label class="label">Logradouro</label>
                            <p class="control">
                                <input class="input" id="rua" name="rua" type="text" placeholder="Av...Rua" required="" value="<?php  if(isset($_POST['rua'])) echo htmlspecialchars($_POST['rua']); ?>">
                            </p>
                        </div>
                        <div class="column">
                            <label class="label">Número</label>
                            <p class="control">
                                <input class="input-w-3" id="numero" name="numero" type="text" placeholder="Numero" value="<?php  if(isset($_POST['numero'])) echo htmlspecialchars($_POST['numero']); ?>">
                            </p>
                        </div>

                        <div class="column">
                            <label class="label">Complemento</label>
                            <p class="control">
                                <input class="input-w-4" id="complemento" name="complemento" type="text" placeholder="Complemento" value="<?php  if(isset($_POST['complemento'])) echo htmlspecialchars($_POST['complemento']); ?>">
                            </p>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <label class="label">Bairro</label>
                            <p class="control">
                                <input class="input-w-4" id="bairro" name="bairro" type="text" placeholder="Bairro" required=""  value="<?php  if(isset($_POST['bairro'])) echo htmlspecialchars($_POST['bairro']); ?>">
                            </p>
                        </div>
                        <div class="column">
                            <label class="label">Cidade</label>
                            <p class="control">
                                <input class="input-w-4" id="cidade" name="cidade" type="text" placeholder="Cidade" required="" value="<?php  if(isset($_POST['cidade'])) echo htmlspecialchars($_POST['cidade']); ?>" >
                            </p>
                        </div>

                        <div class="column">
                            <label class="label">CEP</label>
                            <p class="control">
                                <input class="input-w-3" id="cep" name="cep" type="text" placeholder="CEP" class="form-control input-md" required="" value="<?php  if(isset($_POST['cep'])) echo htmlspecialchars($_POST['cep']); ?>" >
                            </p>
                        </div>
                    </div>
                </form>
                <p>&nbsp;</p>
            </div>
            <p>&nbsp;</p>
            <p class="control">
                <input id="doc" type="hidden" value="<?=$pessoa['usuario_id_usuario'] ?>">
                <button class="button is-primary is-outlined" type="button" onclick="updateAddress()">  Alterar </button>
            </p>
        </div>

    </div>
</section>
<?php include_once ('app/view/partlals/footer.php') ?>
