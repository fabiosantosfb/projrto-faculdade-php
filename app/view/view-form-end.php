  <legend>Telefone</legend>
  <!-- Text input-->
  <script type="text/javascript">

  </script>
  <div class="form-group">
    <label class="col-md-4 control-label" for="tel">Telefone</label>
    <div class="col-md-6">
      <input id="telefone" name="telefone" type="text" placeholder="00 00000 0000" class="form-control input-md" required="" value="<?php  if(isset($_POST['telefone'])) echo htmlspecialchars($_POST['telefone']); ?>">
    </div>
  </div>
  <legend>Email Senha</legend>
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="email">Email</label>
    <div class="col-md-6">
      <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required="" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label" for="pwd">Senha</label>
    <div class="col-md-6">
      <input id="senha" name="senha" type="password" placeholder="Senha" class="form-control input-md" required="" value="<?php  if(isset($_POST['senha'])) echo htmlspecialchars($_POST['senha']); ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label" for="pwd">Confirmar Senha</label>
      <div class="col-md-6">
        <input id="repetir_senha" name="repetir_senha" type="password" placeholder="Confirma Senha" class="form-control input-md" required="" value="<?php  if(isset($_POST['repetir_senha'])) echo htmlspecialchars($_POST['repetir_senha']); ?>">
      </div>
  </div>
  <!-- Text input-->
  <legend>Cadastro Endreço</legend>
  <div class="form-group">
  <label class="col-md-4 control-label" for="cep">CEP</label>
  <div class="col-md-6">
  <input id="cep" name="cep" type="text" placeholder="CEP" class="form-control input-md" required="" value="<?php  if(isset($_POST['cep'])) echo htmlspecialchars($_POST['cep']); ?>" >
  </div>
  </div>

  <div class="form-group">
  <label class="col-md-4 control-label" for="uf">Cidade</label>
  <div class="col-md-6">
  <input id="cidade" name="cidade" type="text" placeholder="Cidade" class="form-control input-md" required="" value="<?php  if(isset($_POST['cidade'])) echo htmlspecialchars($_POST['cidade']); ?>" >
  </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
  <label class="col-md-4 control-label" for="logradouro">Logradouro</label>
  <div class="col-md-6">
  <input id="rua" name="rua" type="text" placeholder="Av...Rua" class="form-control input-md" required="" value="<?php  if(isset($_POST['rua'])) echo htmlspecialchars($_POST['rua']); ?>">
  </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
  <label class="col-md-4 control-label" for="bairro">Bairro</label>
  <div class="col-md-6">
  <input id="bairro" name="bairro" type="text" placeholder="Bairro" class="form-control input-md" required=""  value="<?php  if(isset($_POST['bairro'])) echo htmlspecialchars($_POST['bairro']); ?>">
  </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
  <label class="col-md-4 control-label" for="numero">Numero</label>
  <div class="col-md-2">
  <input id="numero" name="numero" type="text" placeholder="Numero" class="form-control input-md" value="<?php  if(isset($_POST['numero'])) echo htmlspecialchars($_POST['numero']); ?>">

  </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
  <label class="col-md-4 control-label" for="complemento">Complemento</label>
  <div class="col-md-6">
  <input id="complemento" name="complemento" type="text" placeholder="Complemento" class="form-control input-md" value="<?php  if(isset($_POST['complemento'])) echo htmlspecialchars($_POST['complemento']); ?>">
  </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-6">
  <button id="button1id" name="button1id" class="btn btn-success">Salvar</button>
  <button id="Cancelar" name="Cancelar" class="btn btn-danger" onClick="history.go(-1)">Cancelar</button>
  </div>
  </div>

  </fieldset>
  </form>
<!--  <?php //if($this->ERRO_FORM) echo "<script>alert('$this->erro')</script>";?>-->
  <?php include_once 'app/view/partlals/footer.php' ?>
