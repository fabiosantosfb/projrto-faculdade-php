<?php include_once ('app/view/partlals/header.php'); ?>
<form class="form-horizontal" method="post" action="/logar">
<fieldset>
  <legend>Login</legend>
<!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="email">Email</label>
    <div class="col-md-6">
      <input id="email" name="email" placeholder="Email" class="form-control input-md" required="" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
    </div>
    </div>
      <div class="form-group">
          <label class="col-md-4 control-label" for="senha">Senha</label>
        <div class="col-md-6">
            <input id="senha" name="senha" type="password" placeholder="Senha" class="form-control input-md" required="" value="<?php  if(isset($_POST['senha'])) echo htmlspecialchars($_POST['senha']); ?>">
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
  <?php
    //  $r = new Controller();
      //if($r->erro_form) echo "<script>alert('$r->erro')</script>";
   ?>
  <?php include_once 'app/view/partlals/footer.php' ?>
