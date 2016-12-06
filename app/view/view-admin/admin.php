<?php include_once ('app/view/partlals/header.php') ?>

<form class="form-inline" method="post" action="/?controller=produtos&action=search">
  <div class="form-group">
    <input type="txt" class="form-control" id="empresa" name="param" placeholder="Buscar por Id">
  </div>
  <button class="btn btn-primary">Buscar</button>
</form>

<?php if(count($listaspf) > 0) {?>
<table class="table table-striped table-bordered btn-primary">
  <legend>Dados - Pessoa Física</legend>
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
      <tr style="color:#000">
          <?php foreach ($listaspf as $key) { ?>
          <td><?=$key['cpf'] ?></td>
          <td></td>
          <td><?=$key['telefone_numero'] ?></td>
          <td></td>
          <td><?=$key['data_cadastro'].'<tr>' ?></td>
          <?php } ?>
      </tr>
  </tbody>
  </table>
  <?php } ?>
  <?php if(count($listaspj) > 0) {?>
  <table class="table table-striped table-bordered btn-primary">
    <legend>Dados - Pessoa Jurídica</legend>
    <thead>
      <tr>
        <th>
          <p>CNPJ</p>
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
        <tr style="color:#000">
            <?php foreach ($listaspj as $key) { ?>
            <td><?=$key['cnpj'] ?></td>
            <td></td>
            <td><?=$key['telefone_numero'] ?></td>
            <td></td>
            <td><?=$key['data_cadastro'].'<tr>' ?></td>
            <?php } ?>
        </tr>
    </tbody>
    </table>
<?php } ?>
<?php include ('app/view/partlals/footer.php');?>
