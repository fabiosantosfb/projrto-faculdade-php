
<form class="form-inline" method="post" action="/search">
  <div class="form-group">
    <input type="txt" class="form-control" id="empresa" name="param" placeholder="Buscar por Id">
  </div>
  <button class="btn btn-primary">Buscar</button>
</form>

  <?php if(count($listastl) > 0) {?>
  <table class="table table-striped table-bordered btn-primary">
    <legend>Telemarketing</legend>
    <thead>
      <tr>
        <th>
          <p>CNPJ</p>
        </th>
        <th>
        <th>
          <p>NOME</p>
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
      <?php foreach ($listastl as $key) { ?>
        <tr style="color:#000">
            <td><?=$key['cnpj'] ?></td>
            <td></td>
            <td><?=$key['nome'] ?></td>
            <td></td>
            <td><?=$key['data_cadastro'] ?></td>
            <td></td>
            <td> <input type="checkbox" name="<?=$key['usuario_id_usuario'] ?>" <?php if($key['status_ativo'] == 1) echo checked; ?> ></td>
        </tr>
      <?php } ?>
    </tbody>
    </table>
<?php } ?>
<?php include ('app/view/partlals/footer.php');?>
