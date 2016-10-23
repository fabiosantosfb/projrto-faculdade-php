<?php require_once 'cabecalho.php' ?>

</head>
<body>
  <form class="form-horizontal" method="post" action="/?controller=produtos&action=proximo">
<fieldset>
<!-- Form Name -->
<?php if($_GET['action'] == 'empresa'){
echo '<legend>Cadastro - Pessoa Jurídica</legend>
      <!-- Text input-->
      <div class="form-group">
      <label class="col-md-4 control-label" for="CNPJ">CNPJ</label>
      <div class="col-md-6">
      <input id="CNPJ" name="cnpj" type="text" placeholder="CNPJ" class="form-control input-md" required="">
      </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
      <label class="col-md-4 control-label" for="insc_estadual">Razão Social</label>
      <div class="col-md-6">
      <input id="r_social" name="r_social" type="text" placeholder="Razao social" class="form-control input-md" required="">
      </div>
      </div>';
} else {
      echo '<legend>Cadastro - Pessoa Física</legend>
      <!-- Text input-->
      <div class="form-group">
      <label class="col-md-4 control-label" for="nome">Nome</label>
      <div class="col-md-6">
      <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md" required="">
      </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
      <label class="col-md-4 control-label" for="CPF">CPF</label>
      <div class="col-md-6">
      <input id="CNPJ" name="cpf" type="text" placeholder="CPF" class="form-control input-md" required="">
      </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
      <label class="col-md-4 control-label" for="insc_estadual">RG</label>
      <div class="col-md-6">
      <input id="nome" name="rg" type="text" placeholder="RG" class="form-control input-md" required="">
      </div>
      </div>
      <!-- Text input-->
      <div class="form-group">
      <label class="col-md-4 control-label" for="insc_estadual">Data Expedição</label>
      <div class="col-md-2">
      <input id="nome" name="exp" type="date_format" placeholder="00/00/00" class="form-control input-md" required="">
      </div>
      </div>
      <div class="form-group">
      <label class="col-md-4 control-label" for="org">Orgão Expedidor</label>
      <div class="col-md-1">
      <input id="nome" name="org" type="text" placeholder="Org" class="form-control input-md" required="">
      </div>
      </div>';
  }?>

<legend>Email Senha</legend>
<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="email">Email</label>
<div class="col-md-6">
<input id="email" name="email" type="text" placeholder="Email" class="form-control input-md">
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="pwd">Senha</label>
<div class="col-md-6">
<input id="pwd" name="pwd" type="password" placeholder="Senha" class="form-control input-md">
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="pwd">Confirmar Senha</label>
<div class="col-md-6">
<input id="pwd" name="pws_conf" type="password" placeholder="Confirma Senha" class="form-control input-md">
</div>
</div>

<!-- Button (Double) -->
<div class="form-group">
<label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-6">
<button id="button1id" name="button1id" class="btn btn-success">Salvar</button>
<button id="Cancelar" type="reset" name="Cancelar" class="btn btn-danger">Limpar</button>
</div>
</div>

</fieldset>
</form>

<?php require_once 'rodape.php' ?>
