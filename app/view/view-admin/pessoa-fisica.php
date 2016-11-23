<?php include_once ('app/view/view-admin/admin-home.php');?>

<form class="form-inline" method="post" action="/?controller=produtos&action=search">
  <div class="form-group">
    <input type="txt" class="form-control" id="empresa" name="param" placeholder="Buscar por Id">
  </div>
  <button class="btn btn-primary">Buscar</button>
</form>

<table class="table table-striped table-bordered btn-primary">
  <legend>Dados - Pessoa Jurídica</legend>
  <thead>
    <tr>
      <th>
        <p>CPF</p>
      </th>
      <th>
      <th>
        <p>TELEFONE</p>
      </th>
      <th>
      <th>
        <p>DATA CADASTRO</p>
      </th>
      <th>
      <th>
        <p>STATUS</p>
      </th>
    </tr>
  </thead>
  <tbody>
  <?php
      $pesssoaJuridica = PessoaJuridica::getInstancePessoaJuridica();
      $email = Login::getInstanceLogin();
  ?>
      <tr style="color:#000">
          <td><?= $pesssoaJuridica->getCnpj(); ?></td>
          <td></td>
          <td><?= $pesssoaJuridica->getNome(); ?></td>
          <td></td>
          <td><?= $email->getEmail(); ?></td>
          <td></td>
          <td></td>
      </tr>
  </tbody>
  </table>
<?php include ('app/view/rodape.php');?>
