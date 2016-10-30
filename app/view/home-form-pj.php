<?php require_once ('app/view/cabecalho.php') ?>

</head>
<body>
  <form class="form-horizontal" method="post" action="/?controller=produtos&action=cadastrar-pj">
<fieldset>
<!-- Form Name -->
<legend>Cadastro - Pessoa Jurídica</legend>
<!-- Text input-->
 <div class="form-group">
  <label class="col-md-4 control-label" for="CNPJ">CNPJ</label>
      <div class="col-md-6">
        <input id="CNPJ" name="cnpj" type="text" placeholder="CNPJ" class="form-control input-md" >
      </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Razão Social</label>
      <div class="col-md-6">
          <input id="nome" name="nome" type="text" placeholder="Razao social" class="form-control input-md" >
        <label>
          <input type="checkbox" name="tipo_empresa"> Sou Telemarketing
        </label>
      </div>
</div>

<?php require_once ('app/view/home.php') ?>
