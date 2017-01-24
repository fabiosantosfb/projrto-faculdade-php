<?php include_once ('app/view/partlals/header.php') ?>
<script src="app/assets/js/np-procon-pb-pj.js" charset="utf-8"></script>
<form class="form-horizontal" method="post" action="/cadastro-pj">
<fieldset>
<!-- Form Name -->
<legend>Cadastro - Pessoa Jurídica</legend>
<!-- Text input-->
 <div class="form-group">
  <label class="col-md-4 control-label" for="CNPJ">CNPJ</label>
      <div class="col-md-6">
        <input name="type" type="hidden" value="pj">
        <input id="cnpj" name="cnpj" type="text" placeholder="CNPJ" class="form-control input-md" required="" value="<?php  if(isset($_POST['cnpj'])) echo htmlspecialchars($_POST['cnpj']); ?>" >
      </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Razão Social</label>
      <div class="col-md-6">
          <input id="nome" name="nome" type="text" placeholder="Razao social" class="form-control input-md" required="" value="<?php  if(isset($_POST['nome'])) echo htmlspecialchars($_POST['nome']); ?>" >
        <label>
          <input type="checkbox" name="telemarketing"> Sou Telemarketing
        </label>
      </div>
</div>
<?php include_once ('app/view/view-form-end.php') ?>
