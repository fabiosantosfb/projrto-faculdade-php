<?php require_once ('app/view/cabecalho.php') ?>

</head>
<body>
  <form class="form-horizontal" method="post" action="/?controller=pages&action=cadastrarpf">
<fieldset>
<legend>Cadastro - Pessoa Física</legend>
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
        <input id="nome" name="rg" type="text" placeholder="RG" class="form-control input-md" >
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
        <input id="nome" name="org" type="text" placeholder="Org" class="form-control input-md" >
      </div>
</div>
<!-- Select Basic -->
<div class="form-group">
   <label class="col-md-4 control-label" for="uf">UF</label>
      <div class="col-md-1">
        <input id="uf" name="uf" type="text" placeholder="UF" class="form-control input-md" required="">
      </div>
</div>

<?php require_once ('app/view/home.php') ?>
