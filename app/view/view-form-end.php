<!-- Text input-->
<p>&nbsp;</p>
<h1 class="title is-5">
    Endereço
</h1>
<h2 class="subtitle is-6">
    Informe seu endereço, bairro, número e complemento
</h2>
<label class="label">Logradouro</label>
<p class="control">
    <input class="input" id="rua" name="rua" type="text" placeholder="Av...Rua" required="" value="<?php  if(isset($_POST['rua'])) echo htmlspecialchars($_POST['rua']); ?>">
</p>
<label class="label">Número</label>
<p class="control">
    <input class="input-w-3" id="numero" name="numero" type="text" placeholder="Numero" value="<?php  if(isset($_POST['numero'])) echo htmlspecialchars($_POST['numero']); ?>">
</p>
<label class="label">Complemento</label>
<p class="control">
    <input class="input-w-4" id="complemento" name="complemento" type="text" placeholder="Complemento" value="<?php  if(isset($_POST['complemento'])) echo htmlspecialchars($_POST['complemento']); ?>">
</p>
<label class="label">Bairro</label>
<p class="control">
    <input class="input-w-4" id="bairro" name="bairro" type="text" placeholder="Bairro" required=""  value="<?php  if(isset($_POST['bairro'])) echo htmlspecialchars($_POST['bairro']); ?>">
</p>
<label class="label">Cidade</label>
<p class="control">
    <input class="input-w-4" id="cidade" name="cidade" type="text" placeholder="Cidade" required="" value="<?php  if(isset($_POST['cidade'])) echo htmlspecialchars($_POST['cidade']); ?>" >
</p>
<label class="label">CEP</label>
<p class="control">
    <input class="input-w-3" id="cep" name="cep" type="text" placeholder="CEP" class="form-control input-md" required="" value="<?php  if(isset($_POST['cep'])) echo htmlspecialchars($_POST['cep']); ?>" >
</p>
