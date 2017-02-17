<?php
$HOME = '
<a class="nav-item is-active" href="admin">
<span>Liberação Telemarketing</span>
</a>';

$PESSOA = '
<a class="nav-item" href="pessoa-f">
<span>Pessoa Física</span>
</a>
<a class="nav-item" href="pessoa-j">
<span>Pessoa Jurídica</span>
</a>
';

$LOGIN = '
<a class="nav-item" href="logout">
<span>SAIR</span>
</a>';
?>

<?php include_once 'app/view/partlals/header.php' ?>
<script src="app/assets/js/update-form.js" charset="utf-8"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>-->
<div class="principal  has-shadowHere">
<section class="hero np-padding-20">
    <div class="npTitle">
        <h1 class="title is-4">
            Administração
        </h1>
        <h2 class="subtitle is-6">
            Liberação de Telemarketing
        </h2>
        <hr>

        <div class="columns">
            <div class="column is-half">
                <!-- <div class="control"> -->
                <form class="control" method="post" action="/search">
                    <input class="input-w-10" type="text" id="empresa" name="param" placeholder="Buscar por nome da empresa" >
                    <input class="button is-primary is-outlined" type="submit" value="Buscar"/>
                    <span class="help">Digite o nome da empresa para localizar.</span>
                </form>
                <!-- </div> -->
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image icon is-large" style="height: 40px; width: 40px;">
                                    <i class="fa fa-exclamation-triangle deepskyblue"></i>
                                </figure>
                            </div>
                            <div class="media-content">
                                <div class="content">
                                    O processo de liberação serve para o acompanhamento, por parte do Procon, das empresas que procuram receber a listagem.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="panel">
                    <div class="panel-heading">
                        <p class="title is-6">
                            <strong>Empresas Cadastradas</strong>
                        </p>
                    </div>
                    <div class="panel-block">
                        <?php if(count($listastl) > 0) {?>
                            <table class="table table-striped table-narrow">
                                <thead>
                                    <tr>
                                        <th>
                                            <p>CNPJ</p>
                                        </th>
                                        <th>
                                            <p>NOME</p>
                                        </th>
                                        <th>
                                            <p>STATUS</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <form>
                                        <?php foreach ($listastl as $key) { ?>
                                            <tr>
                                                <td><?=$key['cnpj'] ?></td>
                                                <td><?=$key['nome'] ?></td>
                                                <td>
                                                    <p class="control">
                                                        <label class="checkbox is-medium">
                                                            <input type="checkbox" name="id" id="id" onclick='modifiStatus(<?=$key['pessoa_juridica_usuario_id_usuario'] ?>,<?=$key['status_ativo'] ?>)'; <?php if($key['status_ativo'] == 1) echo "checked='checked'"; ?>  >
                                                            Ativo
                                                        </label>
                                                        </p
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </form>
                                        </tbody>
                                    </table>
                                    <?php } ?>
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php include_once ('app/view/partlals/footer.php') ?>
