<?php include_once ('app/view/partlals/header.php') ?>
<form class="form-inline" method="post" action="/?controller=produtos&action=search">
  <div class="form-group">
    <input type="txt" class="form-control" id="empresa" name="param" placeholder="Buscar por Id">
  </div>
  <button class="btn btn-primary">Buscar</button>
</form>
  <?php if(count($listaspf) > 0) {?>
<table class="table table-striped table-bordered btn-primary">
  <legend>Dados - Pessoa Fisica</legend>
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
    </tr>
  </thead>
  <tbody>
    <?php foreach ($listaspf as $key) { ?>
      <tr style="color:#000">
          <td><?=$key['cpf'] ?></td>
          <td></td>
          <td><?=$key['telefone_numero'] ?></td>
          <td></td>
          <td><?=$key['data_cadastro'] ?></td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
<?php } ?>
<?php include_once ('app/view/partlals/footer.php') ?>
