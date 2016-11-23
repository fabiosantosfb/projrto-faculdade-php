<?php include_once ('app/view/view-admin/admin-home.php');
 ?>
 <form class="form-inline" method="post" action="/?controller=produtos&action=search">
   <div class="form-group">
     <input type="txt" class="form-control" id="empresa" name="param" placeholder="cnpj">
   </div>
   <button class="btn btn-primary">Buscar</button>
 </form>
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
  <?php
      //$pesssoaJuridica = PessoaJuridica::getInstancePessoaJuridica();
      //var_dump($pessoa);

  //  while ($pessoa) {
  ?>
      <tr style="color:#000">
          <td><?= $pessoa->getCnpj(); ?></td>
          <td></td>
          <td><?= $pessoa->getNome(); ?></td>
          <td></td>
          <td><?= $pessoa->getDataCriacao(); ?></td>
          <td></td>
      </tr>
      <?php // } ?>
  </tbody>
  </table>
  <?php include ('app/view/rodape.php');?>
