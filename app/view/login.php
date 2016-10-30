<?php require_once 'app/view/cabecalho.php' ?>
</head>
<body>
<form class="form-horizontal" method="post" action="/?controller=pages&action=logar">
<fieldset>
  <legend>Login</legend>
<!-- Text input-->
    <div class="form-group">
    <label class="col-md-4 control-label" for="email">Email</label>
    <div class="col-md-6">
    <input id="email" name="email" placeholder="Email" class="form-control input-md" required="">
    </div>
    </div>
    <div class="form-group">
    <label class="col-md-4 control-label" for="pwd">Senha</label>
    <div class="col-md-6">
    <input id="pwd" name="pwd" type="password" placeholder="Senha" class="form-control input-md" required="">
    </div>
  </div>
    <!-- Button (Double) -->
    <div class="form-group">
    <label class="col-md-4 control-label" for="button1id"></label>
    <div class="col-md-6">
    <button id="button1id" class="btn btn-success" type="submit">Entrar</button>
    <button id="Cancelar" type="reset" name="Cancelar" class="btn btn-danger" onClick="history.go(-1)">Retornar</button>
    </div>
    </div>

  </fieldset>
  </form>
