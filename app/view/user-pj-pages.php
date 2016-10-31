<?php
$LOGIN = '<li><a href="/?controller=pages&action=logout">Sair</a></li>';
$PESSOA = '';
$MARKETING = '<ul class="list-inline">
                <li><a href="/?controller=pages&action=listar">Lista de Bloqueio</a></li>
                <li><a href="/?controller=pages&action=logar">Meu Dados</a></li>
              </ul>';
$HOME = '<a class="navbar-brand">Procon Paraiba</a>';
 ?>
<?php include_once 'app/view/cabecalho.php'; ?>

<table class="table table-striped table-bordered btn-primary">
<legend>Dados - Pessoa Jurídica</legend>
<thead>
  <tr>
    <th>
      <p>CNPJ</p>
    </th>
    <th>
    <th>
      <p>RAZÃO SOCIAL</p>
    </th>
    <th>
    <th>
      <p>EMAIL</p>
    </th>
  </tr>
</thead>
<tbody>
<?php
  //  $email = Login::getInstanceLogin();
?>
    <tr style="color:#000">
        <td><?= $pesssoaJuridica->getCnpj(); ?></td>
        <td></td>
        <td><?= $pesssoaJuridica->getNome(); ?></td>
        <td></td>
        <td><?= $email->getEmail(); ?></td>
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
        <td><?= $pesssoaJuridica->getCep(); ?></td>
        <td></td>
        <td><?= $pesssoaJuridica->getRua(); ?></td>
        <td></td>
        <td><?= $pesssoaJuridica->getBairro(); ?></td>
        <td></td>
        <td><?= $pesssoaJuridica->getCidade();?></td>
        <td></td>
        <td><?= $pesssoaJuridica->getNumero(); ?></td>
        <td></td>
        <td><?= $pesssoaJuridica->getComplemento(); ?></td>
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
        <input type="hidden" name="telefone_numero" value="<?= $pesssoaJuridica->getId();?>">
        <button id="button1id" name="button1id" class="btn btn-primary">Adicionar</button>
      </form>

  </tr>
</thead>
<tbody>
    <tr style="color:#000">
      <td ><?= $pesssoaJuridica->getTelefone(); ?></td>
      <td></td>
      <td><?= $pesssoaJuridica->getDataCriacao(); ?></td>
      <td></td>
    </tr>
</tbody>
</table>
<?php include 'rodape.php'?>
