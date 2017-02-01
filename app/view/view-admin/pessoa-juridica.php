<?php include_once ('app/view/view-admin/admin-home.php'); ?>
 <form class="form-inline" method="post" action="/?controller=produtos&action=search">
   <div class="form-group">
     <input type="txt" class="form-control" id="empresa" name="param" placeholder="cnpj">
   </div>
   <button class="btn btn-primary">Buscar</button>
 </form>
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
    <?php foreach ($listaspj as $key) { ?>
      <tr style="color:#000">
          <td><?=$key['cnpj'] ?></td>
          <td></td>
          <td><?=$key['telefone_numero'] ?></td>
          <td></td>
          <td><?=$key['data_cadastro'] ?></td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
  <?php } ?>
  <?php include ('app/view/rodape.php');?>
