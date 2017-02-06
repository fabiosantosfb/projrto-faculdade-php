<?php include_once ('app/view/partlals/header.php') ?>
<form class="form-horizontal" method="post" action="/cadastro-pf">
    <fieldset>
        <legend>Cadastro - Pessoa Física</legend>
        <!-- Text input-->
        <script src="app/assets/js/np-procon-pb.js" charset="utf-8"></script>
        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome</label>
            <div class="col-md-6">
                <input id="nome" name="nome"  type="text" placeholder="Nome" class="form-control input-md" required="" value="<?php  if(isset($_POST['nome'])) echo htmlspecialchars($_POST['nome']); ?>" >
            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="CPF">CPF</label>
            <div class="col-md-6">
                <input name="type" type="hidden" value="pf">
                <input id="cpf" name="cpf" type="text" placeholder="CPF" class="form-control input-md" required="" value="<?php  if(isset($_POST['cpf'])) echo htmlspecialchars($_POST['cpf']); ?>" >
            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="insc_estadual">RG</label>
            <div class="col-md-6">
                <input id="rg" name="rg" type="text" placeholder="RG" class="form-control input-md" required="" value="<?php  if(isset($_POST['rg'])) echo htmlspecialchars($_POST['rg']); ?>" >
            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="insc_estadual">Data Expedição</label>
            <div class="col-md-2">
                <input id="dataexpedicao" name="dataexpedicao" type="date_format" placeholder="dd/mm/aaaa" class="form-control input-md" required="" value="<?php  if(isset($_POST['dataexpedicao'])) echo htmlspecialchars($_POST['dataexpedicao']); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="org">Orgão Expedidor</label>
            <div class="col-md-1">
                <input id="nome" name="orgao_expedidor" type="text" placeholder="Org" class="form-control input-md" required="" value="<?php  if(isset($_POST['orgao_expedidor'])) echo htmlspecialchars($_POST['orgao_expedidor']); ?>" >
            </div>
        </div>
        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="uf">UF</label>
            <div class="col-md-1">
                <input id="uf" name="uf" type="text" placeholder="UF" class="form-control input-md" required="" value="<?php  if(isset($_POST['uf'])) echo htmlspecialchars($_POST['uf']); ?>" >
            </div>
        </div>

        <?php include_once ('app/view/view-form-end.php') ?>
