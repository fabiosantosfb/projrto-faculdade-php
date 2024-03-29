<!-- Text input-->
<h1 class="title is-6">
    ENDEREÇO
</h1>
<h2 class="subtitle is-6">

</h2>
<hr>
<label class="label">Logradouro</label>
<p class="control">
    <input class="input" id="rua" name="rua" type="text" placeholder="Av...Rua" maxlength="100" required="" value="<?php  if(isset($_POST['rua'])) echo htmlspecialchars($_POST['rua']); ?>">
</p>
<label class="label">Número</label>
<p class="control">
    <input class="input-w-3" id="numero" name="numero" type="text" placeholder="Numero" maxlength="4" value="<?php  if(isset($_POST['numero'])) echo htmlspecialchars($_POST['numero']); ?>">
</p>
<label class="label">Complemento</label>
<p class="control">
    <input class="input-w-4" id="complemento" name="complemento" type="text" placeholder="Complemento" maxlength="45" value="<?php  if(isset($_POST['complemento'])) echo htmlspecialchars($_POST['complemento']); ?>">
</p>
<label class="label">Bairro</label>
<p class="control">
    <input class="input-w-4" id="bairro" name="bairro" type="text" placeholder="Bairro"   maxlength="45" required="" value="<?php  if(isset($_POST['bairro'])) echo htmlspecialchars($_POST['bairro']); ?>">
</p>
<label class="label">Cidade</label>
<p class="control">
    <input class="input-w-4" id="cidade" name="cidade" type="text" placeholder="Cidade"  maxlength="45" required="" value="<?php  if(isset($_POST['cidade'])) echo htmlspecialchars($_POST['cidade']); ?>" >
</p>
<label class="label">CEP</label>
<p class="control">
    <input <?php if(isset($_SESSION['erro-cep'])) echo 'class="input-w-3 is-danger"'; else echo 'class="input-w-3 is-sucess"'; ?> id="cep" name="cep" type="text" placeholder="CEP" onkeypress='cepFormat("cep")' onblur="cepValidadeExisting()"  maxlength="9" required="" value="<?php  if(isset($_POST['cep'])) echo htmlspecialchars($_POST['cep']); ?>" >
<div id="cep-erro"><?php if(isset($_SESSION['erro-cep'])) echo $erro_form->getErroFormulario("CEP"); else echo $erro_form->setErroFormulario(); ?></div>
</p>
<div id="cep-erro"></div>
