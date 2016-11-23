
<?php include_once 'app/view/partlals/header.php' ?>
<table class="table table-striped table-bordered btn-primary">
<legend>Dados - Pessoa Física</legend>
<thead>
  <tr>
    <th>
      <p>CPF</p>
    </th>
    <th>
    <th>
      <p>Nome</p>
    </th>
  </tr>
</thead>
<tbody>
    <tr style="color:#000">
        <td><?= $pessoa['cpf']?></td>
        <td></td>
        <td><?= $pessoa['nome'] ?></td>
    </tr>
</tbody>
</table>
<table class="table table-striped table-bordered btn-primary">
<thead>
  <tr>
    <th>
      <p>RG</p>
    </th>
    <th>
    <th>
      <p>ORGÃO EMISSOR</p>
    </th>
    <th>
    <th>
      <p>UF</p>
    </th>
    <th>
    <th>
      <p>DATA EXPEDIÇÃO</p>
    </th>
  </tr>
</thead>
<tbody>
    <tr style="color:#000">
        <td><?=$pessoa['rg'] ?></td>
        <td></td>
        <td><?=$pessoa['org'] ?></td>
        <td></td>
        <td><?=$pessoa['uf'] ?></td>
        <td></td>
        <td><?=$pessoa['data_expedicao'] ?></td>
    </tr>
</tbody>
</table>
<table class="table table-striped table-bordered btn-primary">
<!--<legend>Dados - Endereço</legend>-->
<thead>
  <tr>
    <th>
      <p>CEP</p>
    </th>
    <th>
    <th>
      <p>RUA</p>
    </th>
    <th>
    <th>
      <p>BAIRRO</p>
    </th>
    <th>
    <th>
      <p>CIDADE</p>
    </th>
    <th>
    <th>
      <p>NUMERO</p>
    </th>
    <th>
    <th>
      <p>COMPLEMENTO</p>
    </th>
  </tr>
</thead>
<tbody>
    <tr style="color:#000">
        <td><?=$endereco['cep'] ?></td>
        <td></td>
        <td><?=$endereco['rua'] ?></td>
        <td></td>
        <td><?=$endereco['bairro'] ?></td>
        <td></td>
        <td><?=$endereco['cidade'] ?></td>
        <td></td>
        <td><?=$endereco['numero'] ?></td>
        <td></td>
        <td><?=$endereco['complemento'] ?></td>
    </tr>
  </tbody>
</table>
<table class="table table-striped table-bordered btn-primary">
<!--<legend>Dados - Telefones Cadastrados para Bloqueio</legend>-->
<thead>
<tr>
  <th>
    <p>TELEFONE</p>
  </th>
  <th>
  <th>
    <p>DATA CADASTRO</p>
  </th>
  <th>
    <form method="post" action="?action=add">
        <input type="hidden" name="telefone_numero" value="<?//= $pesssoaFisica->getId();?>">
        <button id="button1id" name="button1id" class="btn btn-primary">Adicionar</button>
    </form>
  </th>
</tr>
</thead>
  <tbody>
    <tr style="color:#000">
      <td ><?=$telefone['telefone_numero'] ?></td>
      <td></td>
      <td><?=$telefone['data_cadastro'] ?></td>
      <td></td>
    </tr>
  </tbody>
</table>
<?php include_once ('app/view/partlals/footer.php') ?>
