<?php include_once 'app/view/partlals/header.php' ?>
<script src="app/assets/js/update-form.js" charset="utf-8"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>-->
<div class="principal  np-card-1">
<section class="hero np-padding-20">
    <div class="npTitle">
        <h1 class="title is-4">
            Administração
        </h1>
        <h2 class="subtitle is-6">
            Pessoa Jurídica
        </h2>
        <hr>

        <div class="columns">
            <div class="column">
                <!-- <div class="control"> -->
                <form class="control" method="post" action="/search">
                    <input class="input-w-10" type="text" id="empresa" name="param" placeholder="Buscar por nome da empresa" >
                    <input class="button is-primary is-outlined" type="submit" value="Buscar"/>
                    <span class="help">Digite o nome da empresa para localizar.</span>
                </form>
                <!-- </div> -->
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="panel">
                    <div class="panel-heading">
                        <p class="title is-6">
                            <strong>Pessoas Físicas</strong>
                        </p>
                    </div>
                    <div class="panel-block">
                        <?php if(count($listaspj) > 0) {?>
                            <table class="table table-striped table-narrow">
                                <thead>
                                    <tr>
                                        <th>
                                            <p>CNPJ</p>
                                        </th>
                                        <th>
                                            <p>TELEFONE</p>
                                        </th>
                                        <th>
                                            <p>DATA CADASTRO</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form>
                                        <?php foreach ($listaspj as $key) { ?>
                                            <tr style="color:#000">
                                                <td><?=$key['cnpj'] ?></td>
                                                <td><?=$key['telefone_numero'] ?></td>
                                                <td><?=$key['data_cadastro'] ?></td>
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
