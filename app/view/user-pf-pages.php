<?php     $LOGIN = '<li><a href="/?controller=pages&action=logout">Sair</a></li>';
          $PESSOA = '';
          $HOME = '<a class="navbar-brand">Procon Paraiba</a>';
?>
<?php include 'app/view/cabecalho.php'; ?>

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
    <th>
    <th>
      <p>Email</p>
    </th>
  </tr>
</thead>
<tbody>
    <tr style="color:#000">
        <td><?= $pesssoaFisica->getCpf(); ?></td>
        <td></td>
        <td><?= $pesssoaFisica->getNome(); ?></td>
        <td></td>
        <td><?= $email->getEmail(); ?></td>
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
        <td><?= $pesssoaFisica->getRg(); ?></td>
        <td></td>
        <td><?= $pesssoaFisica->getOrgExpedidor(); ?></td>
        <td></td>
        <td><?= $pesssoaFisica->getUf(); ?></td>
        <td></td>
        <td><?= $pesssoaFisica->getDataExpedicao(); ?></td>
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
        <td><?= $pesssoaFisica->getCep(); ?></td>
        <td></td>
        <td><?= $pesssoaFisica->getRua(); ?></td>
        <td></td>
        <td><?= $pesssoaFisica->getBairro(); ?></td>
        <td></td>
        <td><?= $pesssoaFisica->getCidade();?></td>
        <td></td>
        <td><?= $pesssoaFisica->getNumero(); ?></td>
        <td></td>
        <td><?= $pesssoaFisica->getComplemento(); ?></td>
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

      <form method="post" action="/?controller=produtos&action=desativar">
        <input type="hidden" name="telefone_numero" value="<?= $pesssoaFisica->getId();?>">
        <button id="button1id" name="button1id" class="btn btn-primary">Adicionar</button>
      </form>

  </tr>
</thead>
<tbody>
    <tr style="color:#000">
      <td ><?= $pesssoaFisica->getTelefone(); ?></td>
      <td></td>
      <td><?= $pesssoaFisica->getDataCriacao(); ?></td>
        <td></td>
    </tr>
</tbody>
</table>
<?php include 'rodape.php'?>
