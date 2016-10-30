  <legend>Telefone</legend>
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="tel">Telefone</label>
    <div class="col-md-6">
      <input id="tel" name="tel" type="text" placeholder="00 00000 0000" class="form-control input-md">
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
      <input id="pwd" name="pwd" type="password" placeholder="Senha" class="form-control input-md">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label" for="pwd">Confirmar Senha</label>
      <div class="col-md-6">
        <input id="pwdconf" name="pwdconf" type="password" placeholder="Confirma Senha" class="form-control input-md">
      </div>
  </div>
  <!-- Text input-->
  <legend>Cadastro Endreço</legend>
  <div class="form-group">
  <label class="col-md-4 control-label" for="cep">CEP</label>
  <div class="col-md-6">
  <input id="cep" name="cep" type="text" placeholder="CEP" class="form-control input-md" required="">
  </div>
  </div>

  <div class="form-group">
  <label class="col-md-4 control-label" for="uf">Cidade</label>
  <div class="col-md-6">
  <input id="uf" name="cidade" type="text" placeholder="Cidade" class="form-control input-md" required="">
  </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
  <label class="col-md-4 control-label" for="logradouro">Logradouro</label>
  <div class="col-md-6">
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
  <div class="col-md-2">
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

<?php require_once 'rodape.php' ?>
