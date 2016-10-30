<?php
include_once ('app/view/view-admin/admin-home.php'); ?>

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
