<?php require_once 'cabecalho.php' ?>

</head>
<body>
  <form class="form-horizontal" method="post" action="/?controller=produtos&action=adiciona">
<fieldset>

<!-- Form Name -->
<legend>Cadastro - Pessoa Jurídica</legend>

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
</div>

<!-- Text input-->
<legend>Endreço</legend>
<div class="form-group">
<label class="col-md-4 control-label" for="cep">CEP</label>
<div class="col-md-4">
<input id="cep" name="cep" type="text" placeholder="CEP" class="form-control input-md" required="">
</div>
</div>

<!-- Select Basic -->
<div class="form-group">
<label class="col-md-4 control-label" for="uf">UF</label>
<div class="col-md-1">
<input id="uf" name="uf" type="text" placeholder="UF" class="form-control input-md" required="">
</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="logradouro">Logradouro</label>
<div class="col-md-8">
<input id="rua" name="rua" type="text" placeholder="Av...Rua" class="form-control input-md">
</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="bairro">Bairro</label>
<div class="col-md-6">
<input id="bairro" name="bairro" type="text" placeholder="Bairro" class="form-control input-md">

</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="numero">Numero</label>
<div class="col-md-4">
<input id="numero" name="numero" type="text" placeholder="Numero" class="form-control input-md">

</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="complemento">Complemento</label>
<div class="col-md-6">
<input id="complemento" name="complemento" type="text" placeholder="Complemento" class="form-control input-md">

</div>
</div>

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
<input id="pwd" name="pws" type="password" placeholder="" class="form-control input-md">
</div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="pwd">Confirmar Senha</label>
<div class="col-md-6">
<input id="pwd" name="pws_conf" type="password" placeholder="" class="form-control input-md">
</div>
</div>

<!-- Button (Double) -->
<div class="form-group">
<label class="col-md-4 control-label" for="button1id"></label>
<div class="col-md-8">
<button id="button1id" name="button1id" class="btn btn-success">Salvar</button>
<button id="Cancelar" name="Cancelar" class="btn btn-danger">Cancelar</button>
</div>
</div>

</fieldset>
</form>

<?php require_once 'rodape.php' ?>
