<?php //include 'conecta.php' ?>
<?php include 'cabecalho.php'; ?>

<form class="form-inline" method="post" action="/?controller=produtos&action=search">
  <div class="form-group">
    <input type="txt" class="form-control" id="empresa" name="param" placeholder="Empresa">
  </div>
  <button class="btn btn-primary">Buscar</button>
</form>

<table class="table table-striped table-bordered">
<thead>
  <tr>
    <th>
      <th>
        <p>NUMERO</p>
      </th>
      <th>
        <th>
          <p>STATUS</p>
        </th>
        <th>
          <th>
            <p>DATA CADASTRO</p>
          </th>
  </tr>
</thead>
<tbody>

<?php
    $t_empresa = listarEmpresa();
    foreach ($t_empresa as $empresa) {
?>
    <tr>
        <td><?= $empresa['cnpj'] ?></td>
        <td></td>
        <td><?= $empresa['telefone_numero'] ?></td>
        <td></td>
        <td><?= $empresa['status_bloqueio'] ?></td>
        <td></td>
        <td><?= $empresa['data_cadastro'] ?></td>
        <td></td>
        <td>
          <form method="post" action="<?php if($empresa['ativa']==0) echo '/?controller=produtos&action=ativar'; else echo '/?controller=produtos&action=desativar';?>">
            <input type="hidden" name="telefone_numero" value="<?=$empresa['telefone_numero']?>">
            <button class="<?php if($empresa['status_bloqueio']==0){ echo 'btn btn-danger btn-xs'; echo '">Ativar';}else {echo 'btn ativar btn-xs'; echo '">Desativar';}?></button>
          </form>
        </td>
    </tr>
<?php
}
?>
</tbody>
</table>
<?php include 'rodape.php'?>
